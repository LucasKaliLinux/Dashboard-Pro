<?php

    namespace panel\controllers;

    use classes\Database;
    use panel\classes\HandleValidation;
    use panel\classes\Redirect;
use panel\classes\UDimage;
use panel\classes\ValidateDate;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidatePost;
use panel\classes\ValidateUpload;
use panel\models\InsertRegister;

    class SubmitSlideController{
        public function index(){

            if($_SERVER["REQUEST_METHOD"] != "POST"){
                Redirect::redirectRouter("registerSlide");
            }

            $database        = new Database;
            $register        = new InsertRegister($database);

            $validationEmpty = new ValidateEmpty;
            $validationImg   = new ValidateUpload;
            $validationPost  = new ValidatePost;
            $handle          = new HandleValidation;

            $handle->AddValidation($validationPost, ["nome"]);

            if(!$handle->ValidationAll()){
                Redirect::redirectRouter("registerSlide");
            }

            $name   = htmlspecialchars($_POST["nome"]);
            $img    = $_FILES["imagem"];

            $handle->AddValidation($validationEmpty, [$name, $img["name"], $img["type"], $img["size"]]);
            $handle->AddValidation($validationImg, ["img"=>$img]);

            if(!$handle->ValidationAll()){
                Redirect::redirectRouter("registerSlide");
            }

            $img["name"] = UDimage::generateImg($img["name"], "_slide");

            UDimage::uploadFile($img);

            $register->insertRegister("tb_site_slides", [$name, $img["name"]]);

            $_SESSION["success"] = "Novo servico cadastrado";
            Redirect::redirectRouter("registerSlide");
        }
    }