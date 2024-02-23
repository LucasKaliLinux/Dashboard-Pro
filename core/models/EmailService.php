<?php

    namespace models;

    use classes\Email;
    use panel\classes\HandleValidation;
    use panel\classes\ValidateEmail;

    class EmailService{

        private $handle;
        private $PHPMailer;
        private $email;

        function __construct(HandleValidation $handle, Email $PHPMailer){
            $this->handle = $handle;
            $this->PHPMailer = $PHPMailer;
        }

        public function setEmailService(string $email){
            $this->email = $email;
        }

        public function validationEmailService(): bool{
            $validationEmail = new ValidateEmail;
            
            $this->handle->AddValidation($validationEmail, ["email"=>$this->email]);

            if(!$this->handle->ValidationAll()){
                return false;
            }

            return true;
        }

        public function formatEmailService(string $addressName, string $subject, string $body): void{
            $this->PHPMailer->addAddress($this->email, $addressName);
            $this->PHPMailer->formatEmail([
                "assunto"   => $subject,
                "corpo"     => $body
            ]);
        }

        public function sendEmailService(): void{
            $this->PHPMailer->sendEmail();
        }
    }