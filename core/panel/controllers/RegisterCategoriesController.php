<?php

    namespace panel\controllers;

    use classes\Database;
    use classes\Layout;
    use panel\classes\HandleValidation;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidatePost;
    use panel\classes\ValidateSlog;
    use panel\models\InsertRegister;

    class registerCategoriesController{
        public function index(){
            
            $db = new Database;
            $tb = "tb_site_categorias";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $this->post_categories($db, $tb);
            }

            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."registerCategories",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ]);
        }

        private function post_categories(Database $db, string $tb_name){
            
            $insertValue     = new InsertRegister($db);
            $handle          = new HandleValidation($db);
            $validationEmpty = new ValidateEmpty();
            $validationPost  = new ValidatePost();
            $validationSlog  = new ValidateSlog();

            $handle->AddValidation($validationPost, ["categorie"]);

            if(!$handle->ValidationAll()){
                return;
            }

            $name = $_POST["categorie"];
            $name_slog = $insertValue->generateSlog($name);

            $handle->AddValidation($validationEmpty, [$name]);
            $handle->AddValidation($validationSlog, ["tb_name"=>$tb_name, "slog"=>$name_slog]);

            if(!$handle->ValidationAll()){
                return;
            }

            $insertValue->insertRegister($tb_name, [$name, $name_slog]);
            $_SESSION["success"] = "Cadastro realizado com sucesso!";
        }
    }