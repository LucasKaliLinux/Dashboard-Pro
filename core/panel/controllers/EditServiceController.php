<?php

    namespace panel\controllers;

    use classes\Database;
    use classes\Layout;
    use panel\classes\HandleValidation;
    use panel\classes\Redirect;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidatePost;

    class EditServiceController{
        public function index(){

            if(!isset($_GET["id"])){
                Redirect::redirectRouter("listService");
            }

            if(!is_numeric($_GET["id"])){
                $_SESSION["error"] = "formato de ID invalido";
                Redirect::redirectRouter("listService");
            }

            $db      = new Database;
            $tb_name = "tb_site_servicos";
            $id      = $_GET["id"];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $this->postEdit($db, $tb_name, $id);
            }

            $select = $db->selectOne("SELECT * FROM `$tb_name` WHERE id = ?", [$id]);
            $result = $select["result"];
            $rows   = $select["rows"];

            if($rows == 0){
                $_SESSION["error"] = "Nenhum depoimento foi encontrado com esse ID";
                Redirect::redirectRouter("listService");
            }

            $data = [
                "value"=>$result
            ];

            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."editService",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ], $data);
        }

        private function postEdit(Database $db, string $tb_name, string $id){
            
            $validationPost  = new ValidatePost;
            $validationEmpty = new ValidateEmpty;
            $handle = new HandleValidation();

            $handle->AddValidation($validationPost, ["servico", "editar"]);

            if(!$handle->ValidationAll()){
                return;
            }

            $service = $_POST["servico"];

            $handle->AddValidation($validationEmpty, [$service]);
            
            if(!$handle->ValidationAll()){
                $_SESSION["error"] = "Porfavor preenchar os campos corretamente";
                return;
            }

            $db->update("UPDATE `$tb_name` SET `servico` = ? WHERE id = ?", [$service, $id]);
            $_SESSION["success"] = "Serviços Atualizado com sucesso!";
        }
    }