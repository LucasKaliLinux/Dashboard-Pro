<?php

    namespace panel\controllers;

    use classes\Database;
    use panel\classes\HandleValidation;
    use panel\classes\Redirect;
    use panel\classes\UDimage;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidateOffice;
use panel\classes\ValidatePermission;
use panel\classes\ValidatePost;
    use panel\classes\ValidateUpload;
    use panel\models\CreateUser;

    class SubmitAddUserController{
        public function index(){

            $validationPermi  = new ValidatePermission;
            $validationImg    = new ValidateUpload;
            $validationEmpty  = new ValidateEmpty;
            $validationOffice = new ValidateOffice;
            $validationPost   = new ValidatePost;
            $database         = new Database;
            $handle           = new HandleValidation;
            $CreateUser       = new CreateUser($database);

            $handle->AddValidation($validationPost, ["nome", "login", "senha", "cargo"]);
            $handle->AddValidation($validationPermi, ["permission"=>OFFICE_ADMIN]);

            if(!$handle->ValidationAll()){
                $_SESSION['error'] = "teste";
                Redirect::redirectRouter("addUser");
            }

            $name   = $_POST["nome"];
            $login  = $_POST["login"];
            $pass   = $_POST["senha"];
            $office = $_POST["cargo"];
            $imagem = $_FILES["imagem"];

            $paramEmpty = [
                $name,
                $login,
                $pass,
                $imagem["name"],
                $imagem["type"],
                $imagem["size"]
            ];

            $handle->AddValidation($validationEmpty, $paramEmpty);
            $handle->AddValidation($validationOffice, ["office"=>$office]);

            if(!$handle->ValidationAll()){
                $_SESSION["error"] = "Porfavor preenchar os dados corretamente!";
                Redirect::redirectRouter("addUser");
            }

            $handle->AddValidation($validationImg, ["img"=>$imagem]);

            if(!$handle->ValidationAll()){
                Redirect::redirectRouter("addUser");
            }

            UDimage::uploadFile($imagem);

            $CreateUser->createUser($name, $login, $pass, $office, $imagem["name"]);

            $_SESSION["success"] = "Usuario cadastrado com sucesso!";
            Redirect::redirectRouter("addUser");
        }
    }