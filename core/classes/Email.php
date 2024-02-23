<?php

    namespace classes;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require __DIR__.'\..\PHPMailer\src\Exception.php';
    require __DIR__.'\..\PHPMailer/src/PHPMailer.php';
    require __DIR__.'\..\PHPMailer/src/SMTP.php';

    class Email{

        private $mail;

        function __construct($email, $name, $html){

            $this->mail = new PHPMailer();

            try{
                $this->mail->isSMTP();
                $this->mail->Host       = 'smtp.gmail.com';
                $this->mail->SMTPAuth   = true;
                $this->mail->Username   = $email;
                $this->mail->Password   = EMAIL_PASS;

                $this->mail->CharSet    = "UTF-8";

                $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $this->mail->Port       = 587;

                $this->mail->isHTML($html);

                $this->mail->setFrom($email, $name);
            }catch(Exception $e){
                echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} ";
            }
        }

        public function addAddress(string $email, string $nome){
            $this->mail->addAddress($email, $nome);
        }

        public function formatEmail(array $info){
            $this->mail->Subject = $info['assunto'];
            $this->mail->Body    = $info['corpo'];
            $this->mail->AltBody = strip_tags($info['corpo']);
        }

        public function sendEmail(){
            $this->mail->send();
        }
    }
?>