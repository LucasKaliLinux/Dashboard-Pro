<?php

    namespace controllers;

    use classes\Email;
    use panel\classes\Redirect;
    use panel\classes\HandleValidation;
    use panel\classes\ValidateEmail;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidatePost;
    use panel\classes\ValidateTel;
    use models\EmailService;

    class SubmitContactController{
        public function index(){
            
            if($_SERVER["REQUEST_METHOD"] != "POST"){
                Redirect::redirectRouter("contact");
            }

            $handle          = new HandleValidation;
            $validationPost  = new ValidatePost;
            $validationTel   = new ValidateTel;
            $validationEmail = new ValidateEmail;
            $validationEmpty = new ValidateEmpty;
            $PHPMailer       = new Email(EMAIL_ADDRESS, "Lucas Santos", true);
            $emailService    = new EmailService($handle, $PHPMailer);

            $handle->AddValidation($validationPost, ["nome", "email", "telefone", "msg"]);

            if(!$handle->ValidationAll()){
                Redirect::redirectRouter("contact");
            }

            $name   = htmlspecialchars($_POST["nome"]);
            $email  = htmlspecialchars(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
            $tel    = htmlspecialchars($_POST["telefone"]);
            $msg    = htmlspecialchars(empty(trim($_POST["msg"])) ? "Nenhuma mensagem!" : $_POST["msg"]);
     
            $handle->AddValidation($validationTel, ["tel"    => $tel]);
            $handle->AddValidation($validationEmail, ["email"=> $email]);
            $handle->AddValidation($validationEmpty, ["name" => $name]);

            $emailService->setEmailService($email);

            if(!$emailService->validationEmailService()){
                $_SESSION["error"] = "informações invalidas!";
                Redirect::redirectRouter("contact");
            }

            $emailService->setEmailService(EMAIL_ADDRESS);

            $subjectEmail    = "Novo usuario!";
            $notifyUserBody  = "<h1>Nome do Usuario: $name</h1>";
            $notifyUserBody .= "<h2>Email: $email</h2><hr>";
            $notifyUserBody .= "<h2>Telefone: $tel</h2><hr><br><br>";
            $notifyUserBody .= "<p style=\"font-size: 18px;\">Mensagem: $msg</p>";

            $emailService->formatEmailService(EMAIL_ADDRESS, $subjectEmail, $notifyUserBody);
            $emailService->sendEmailService();

            $_SESSION["success"] = "Email Enviado com sucesso!";
            Redirect::redirectRouter("contact");
        }
    }