<?php

    namespace panel\controllers;

    use classes\Database;
    use classes\Layout;
    use panel\classes\HandleValidation;
    use panel\classes\Redirect;
    use panel\classes\UDimage;
    use panel\classes\ValidateEmpty;
use panel\classes\ValidateId;
use panel\classes\ValidatePost;
use panel\classes\ValidateSlog;
use panel\classes\ValidateUpload;
use panel\models\InsertRegister;

    class EditNewsController{
        public function index(){

            if(!isset($_GET["id"])){
                Redirect::redirectRouter("manageNews");
            }

            if(!is_numeric($_GET["id"])){
                $_SESSION["error"] = "formato de ID invalido";
                Redirect::redirectRouter("manageNews");
            }

            $db      = new Database;
            $tb_name = "tb_site_noticias";
            $id      = $_GET["id"];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $this->postEdit($db, $tb_name, $id);
            }

            $select = $db->selectOne("SELECT * FROM `$tb_name` WHERE id = ?", [$id]);
            $selectCategories = $db->select("SELECT * FROM `tb_site_categorias`");

            $categories = $selectCategories["result"];
            $result = $select["result"];
            $rows   = $select["rows"];

            if($rows == 0){
                $_SESSION["error"] = "Nenhum depoimento foi encontrado com esse ID";
                Redirect::redirectRouter("manageNews");
            }

            $data = [
                "value"=>$result,
                "categories"=>$categories
            ];

            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."editNews",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ], $data);
        }

        private function postEdit(Database $db, string $tb_name, string $id){
            
            $validationPost  = new ValidatePost;
            $validationEmpty = new ValidateEmpty;
            $validationFile  = new ValidateUpload;
            $validationSlug  = new ValidateSlog;
            $validationId    = new ValidateId();
            $insertValues    = new InsertRegister($db);
            $handle          = new HandleValidation($db);

            $handle->AddValidation($validationPost, ["categoria", "titulo", "conteudo", "enviar"]);

            if(!$handle->ValidationAll()){
                return;
            }

            $categorie_id = htmlspecialchars($_POST["categoria"]);
            $title        = htmlspecialchars($_POST["titulo"]);
            $content      = htmlspecialchars($_POST["conteudo"]);
            $slug         = $insertValues->generateSlog($title);
            $imagem       = $_FILES["imagem"];
            
            $select = $db->selectOne("SELECT * FROM `$tb_name` WHERE id = ?", [$id]);
            $result = $select["result"];

            $handle->AddValidation($validationEmpty, [$categorie_id, $title, $content]);
            $handle->AddValidation($validationId, ["id"=>$categorie_id, "tb_name"=>"tb_site_categorias"]);

            if($result["slog"] != $slug){
                $handle->AddValidation($validationSlug, ["tb_name"=>$tb_name, "slog"=>$slug]);
            }

            if(!$handle->ValidationAll()){
                return;
            }

            $handle->AddValidation($validationEmpty, [$imagem["name"], $imagem["size"], $imagem["type"]]);

            if(!$handle->ValidationAll()){
                $db->update("UPDATE `$tb_name` SET `titulo` = ?, `conteudo` = ?, `slog` = ?, `categoria_id` = ? WHERE id = ?", [$title, $content, $slug, $categorie_id, $id]);
                unset($_SESSION["error"]);
                $_SESSION["success"] = "Noticia Atualizado com sucesso!";
                return;
            }

            $handle->AddValidation($validationFile, ["img"=>$imagem]);

            if(!$handle->ValidationAll()){
                return;
            }

            $imagem["name"] = UDimage::generateImg($imagem["name"], "_news");
            $imagem["name"] = htmlspecialchars($imagem["name"]);

            UDimage::deleteFile(["name"=>$result["capa"]]);
            UDimage::uploadFile($imagem);

            $db->update("UPDATE `$tb_name` SET `titulo` = ?, `conteudo` = ?, `slog` = ?, `categoria_id` = ?, `capa` = ? WHERE id = ?", [$title, $content, $slug, $categorie_id, $imagem["name"], $id]);
            $_SESSION["success"] = "Noticia Atualizado com sucesso!";
        }
    }