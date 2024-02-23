<?php

    namespace panel\controllers;

    use classes\Database;
    use panel\classes\HandleValidation;
    use panel\classes\Redirect;
    use panel\classes\ValidateDate;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidatePost;
    use panel\models\InsertRegister;

    class SubmitRegisterController{
        public function index(){

            if($_SERVER["REQUEST_METHOD"] != "POST"){
                Redirect::redirectRouter("registerTestimonial");
            }

            $database        = new Database;
            $register        = new InsertRegister($database);

            $validationEmpty = new ValidateEmpty;
            $validationDate  = new ValidateDate;
            $validationPost  = new ValidatePost;
            $handle          = new HandleValidation;

            $handle->AddValidation($validationPost, ["nome", "depoimento", "data"]);

            if(!$handle->ValidationAll()){
                Redirect::redirectRouter("registerTestimonial");
            }

            $name      = htmlspecialchars($_POST["nome"]);
            $depoiment = htmlspecialchars($_POST["depoimento"]);
            $date      = $_POST["data"];

            $handle->AddValidation($validationEmpty, [$name, $depoiment, $date]);
            $handle->AddValidation($validationDate, ["date"=>$date]);

            if(!$handle->ValidationAll()){
                $_SESSION["error"] = "Por favor preenchar os campos corretamente!";
                Redirect::redirectRouter("registerTestimonial");
            }

            $register->insertRegister("tb_site_depoimentos", [$name, $depoiment, $date]);

            $_SESSION["success"] = "Novo depoimento cadastrado";
            Redirect::redirectRouter("registerTestimonial");
        }
    }