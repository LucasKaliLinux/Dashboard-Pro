<?php

    namespace panel\controllers;

    use classes\Database;
    use panel\classes\HandleValidation;
    use panel\classes\Redirect;
    use panel\classes\UDimage;
    use panel\classes\ValidateEmpty;
use panel\classes\ValidatePermission;
use panel\classes\ValidatePost;
    use panel\classes\ValidateUpload;
    use panel\models\UpdateUser;

    class SubmitEditUserController{
        public function index(){
            
            if($_SERVER["REQUEST_METHOD"] != "POST"){
                Redirect::redirectRouter("editUser");
            }

            $validationPermi = new ValidatePermission;
            $database        = new Database;
            $validationPost  = new ValidatePost; 
            $validationEmpty = new ValidateEmpty;
            $validationFile  = new ValidateUpload;
            $updateUser      = new UpdateUser($database);
            $handle          = new HandleValidation;

            $handle->AddValidation($validationPost, ["nome", "senha"]);
            $handle->AddValidation($validationPermi, ["permission"=>OFFICE_ADMIN]);

            if(!$handle->ValidationAll()){
                Redirect::redirectRouter("editUser");
            }

            $name = $_POST["nome"];
            $pass = $_POST["senha"];
            $img  = $_FILES["imagem"];

            $handle->AddValidation($validationEmpty, [$name, $pass]);

            if(!$handle->ValidationAll()){
                $_SESSION["error"] = "Campos vazios não são permitidos!";
                Redirect::redirectRouter("editUser");
            }

            $handle->AddValidation($validationEmpty, [$img["name"], $img["type"], $img["size"]]);

            if(!$handle->ValidationAll()){
                $updateUser->updateUser($name, $pass, $_SESSION["img"]);
                $_SESSION["success"] = "Usuario Atualizado com sucesso!";
                Redirect::redirectRouter("editUser");
            }

            $handle->AddValidation($validationFile, ["img"=>$img]);

            if(!$handle->ValidationAll()){
                Redirect::redirectRouter("editUser");
            }

            UDimage::uploadFile($img);

            $updateUser->updateUser($name, $pass, $img["name"]);

            $_SESSION["success"] = "Usuario Atualizado com sucesso!";
            Redirect::redirectRouter("editUser");
        }
    }