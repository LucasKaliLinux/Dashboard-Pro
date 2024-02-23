<?php

    namespace panel\controllers;

    use classes\Database;
    use panel\classes\HandleValidation;
    use panel\classes\Redirect;
    use panel\classes\ValidateDate;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidatePost;
    use panel\models\InsertRegister;

    class SubmitServiceController{
        public function index(){

            if($_SERVER["REQUEST_METHOD"] != "POST"){
                Redirect::redirectRouter("registerService");
            }

            $database        = new Database;
            $register        = new InsertRegister($database);

            $validationEmpty = new ValidateEmpty;
            $validationPost  = new ValidatePost;
            $handle          = new HandleValidation;

            $handle->AddValidation($validationPost, ["servico"]);

            if(!$handle->ValidationAll()){
                Redirect::redirectRouter("registerService");
            }

            $service = htmlspecialchars($_POST["servico"]);

            $handle->AddValidation($validationEmpty, [$service]);

            if(!$handle->ValidationAll()){
                $_SESSION["error"] = "Por favor preenchar os campos corretamente!";
                Redirect::redirectRouter("registerService");
            }

            $register->insertRegister("tb_site_servicos", [$service]);

            $_SESSION["success"] = "Novo servico cadastrado";
            Redirect::redirectRouter("registerService");
        }
    }