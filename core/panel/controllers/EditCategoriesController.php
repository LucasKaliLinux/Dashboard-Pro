<?php

    namespace panel\controllers;

    use classes\Database;
    use classes\Layout;
    use panel\classes\HandleValidation;
    use panel\classes\Redirect;
    use panel\classes\ValidateDate;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidatePost;
use panel\classes\ValidateSlog;
use panel\models\InsertRegister;

    class EditCategoriesController{
        public function index(){

            if(!isset($_GET["id"])){
                Redirect::redirectRouter("manageCategories");
            }

            if(!is_numeric($_GET["id"])){
                $_SESSION["error"] = "formato de ID invalido";
                Redirect::redirectRouter("manageCategories");
            }

            $db      = new Database;
            $tb_name = "tb_site_categorias";
            $id      = $_GET["id"];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $this->postEdit($db, $tb_name, $id);
            }

            $select = $db->selectOne("SELECT * FROM `$tb_name` WHERE id = ?", [$id]);
            $result = $select["result"];
            $rows   = $select["rows"];

            if($rows == 0){
                $_SESSION["error"] = "Nenhum depoimento foi encontrado com esse ID";
                Redirect::redirectRouter("manageCategories");
            }

            $data = [
                "value"=>$result
            ];

            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."editCategories",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ], $data);
        }

        private function postEdit(Database $db, string $tb_name, string $id){
            
            $validationPost  = new ValidatePost;
            $validationEmpty = new ValidateEmpty;
            $validationSlog  = new ValidateSlog;
            $Slog            = new InsertRegister($db);
            $handle          = new HandleValidation($db);

            $handle->AddValidation($validationPost, ["categorie","editar"]);

            if(!$handle->ValidationAll()){
                return;
            }

            $name_categorie = $_POST["categorie"];
            $name_slog      = $Slog->generateSlog($name_categorie);

            $handle->AddValidation($validationEmpty, [$name_categorie]);
            $handle->AddValidation($validationSlog, ["tb_name"=>$tb_name, "slog"=>$name_slog]);

            if(!$handle->ValidationAll()){
                return;
            }

            $db->update("UPDATE `$tb_name` SET `nome` = ?, `slog` = ? WHERE id = ?", [$name_categorie, $name_slog, $id]);
            $_SESSION["success"] = "Categoria Atualizado com sucesso!";
        }
    }