<?php

    namespace controllers;

    use classes\Email;
    use models\EmailService;
    use panel\classes\Redirect;
    use panel\classes\ValidatePost;
    use panel\classes\HandleValidation;

    class SubmitHomeController{
        public function index(){
            
            if($_SERVER["REQUEST_METHOD"] != "POST"){
                Redirect::redirectRouter("home");
            }
            
            $handle         = new HandleValidation;
            $validationPost = new ValidatePost;
            $PHPMailer      = new Email(EMAIL_ADDRESS, "Lucas Santos", true);
            $emailService   = new EmailService($handle, $PHPMailer);

            $handle->AddValidation($validationPost, ["email"]);

            if(!$handle->validationAll()){
                Redirect::redirectRouter("home");
            }

            $postEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            $subject = "O que somos?";
            $body = "<p>Somos uma <b>empresa</b> que contamos com a segurança e afinidades da era <a href='#'>digital</a>, podemos fazer grandes evoluções ao seu lado!</p>";

            $emailService->setEmailService($postEmail);

            if(!$emailService->validationEmailService()){
                $_SESSION["error"] = "Email não é valido!";
                Redirect::redirectRouter("home");
            }

            $emailService->formatEmailService($postEmail, $subject, $body);
            $emailService->sendEmailService();

            $_SESSION["success"] = "Email cadastrado com sucesso!";
            Redirect::redirectRouter("home");
        }
    }