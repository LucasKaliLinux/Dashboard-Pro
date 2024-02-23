<?php

    namespace panel\controllers;

    use classes\Database;
    use classes\Layout;
    use panel\classes\HandleValidation;
    use panel\classes\Redirect;
use panel\classes\UDimage;
use panel\classes\ValidateDate;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidatePost;
use panel\classes\ValidateUpload;

    class EditSlideController{
        public function index(){

            if(!isset($_GET["id"])){
                Redirect::redirectRouter("listSlide");
            }

            if(!is_numeric($_GET["id"])){
                $_SESSION["error"] = "formato de ID invalido";
                Redirect::redirectRouter("listSlide");
            }

            $db      = new Database;
            $tb_name = "tb_site_slides";
            $id      = $_GET["id"];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $this->postEdit($db, $tb_name, $id);
            }

            $select = $db->selectOne("SELECT * FROM `$tb_name` WHERE id = ?", [$id]);
            $result = $select["result"];
            $rows   = $select["rows"];

            if($rows == 0){
                $_SESSION["error"] = "Nenhum depoimento foi encontrado com esse ID";
                Redirect::redirectRouter("listSlide");
            }

            $data = [
                "value"=>$result
            ];

            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."editSlide",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ], $data);
        }

        private function postEdit(Database $db, string $tb_name, string $id){
            
            $validationPost  = new ValidatePost;
            $validationEmpty = new ValidateEmpty;
            $validationFile  = new ValidateUpload;
            $handle = new HandleValidation();

            $handle->AddValidation($validationPost, ["nome", "editar"]);

            if(!$handle->ValidationAll()){
                return;
            }

            $name = $_POST["nome"];
            $imagem = $_FILES["imagem"];
            
            $search = [".jpg", ".jpeg", ".png"];
            $subst = ["_slide.jpg", "_slide.jpeg", "_slide.png"];
            $slideSelect = $db->selectOne("SELECT * FROM `$tb_name` WHERE id = ?", [$id]);
            $slideResult = $slideSelect["result"];

            $handle->AddValidation($validationEmpty, [$name]);
            
            if(!$handle->ValidationAll()){
                $_SESSION["error"] = "Porfavor preenchar os campos corretamente";
                return;
            }

            $handle->AddValidation($validationEmpty, [$imagem["name"], $imagem["size"], $imagem["type"]]);

            if(!$handle->ValidationAll()){
                $db->update("UPDATE `$tb_name` SET `nome` = ? WHERE id = ?", [$name, $id]);
                $_SESSION["success"] = "Slide Atualizado com sucesso!";
                return;
            }

            $handle->AddValidation($validationFile, ["img"=>$imagem]);

            if(!$handle->ValidationAll()){
                $_SESSION["error"] = "Formato da imagem tem que ser jpg/jpeg ou png com no minimo 600KB!";
                return;
            }

            $imagem["name"] = str_replace($search, $subst, $imagem["name"]);

            UDimage::deleteFile(["name"=>$slideResult["slide"]]);
            UDimage::uploadFile($imagem);

            $db->update("UPDATE `$tb_name` SET `nome` = ?, `slide` = ? WHERE id = ?", [$name, $imagem["name"], $id]);
            $_SESSION["success"] = "Slide Atualizado com sucesso!";
        }
    }