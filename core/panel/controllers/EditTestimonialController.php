<?php

    namespace panel\controllers;

    use classes\Database;
    use classes\Layout;
    use panel\classes\HandleValidation;
    use panel\classes\Redirect;
    use panel\classes\ValidateDate;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidatePost;

    class EditTestimonialController{
        public function index(){

            if(!isset($_GET["id"])){
                Redirect::redirectRouter("listTestimonial");
            }

            if(!is_numeric($_GET["id"])){
                $_SESSION["error"] = "formato de ID invalido";
                Redirect::redirectRouter("listTestimonial");
            }

            $db      = new Database;
            $tb_name = "tb_site_depoimentos";
            $id      = $_GET["id"];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $this->postEdit($db, $tb_name, $id);
            }

            $select = $db->selectOne("SELECT * FROM `$tb_name` WHERE id = ?", [$id]);
            $result = $select["result"];
            $rows   = $select["rows"];

            if($rows == 0){
                $_SESSION["error"] = "Nenhum depoimento foi encontrado com esse ID";
                Redirect::redirectRouter("listTestimonial");
            }

            $data = [
                "value"=>$result
            ];

            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."editTestimonial",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ], $data);
        }

        private function postEdit(Database $db, string $tb_name, string $id){
            
            $validationPost  = new ValidatePost;
            $validationEmpty = new ValidateEmpty;
            $validationDate  = new ValidateDate;
            $handle = new HandleValidation();

            $handle->AddValidation($validationPost, ["nome","depoimento","data","editar"]);

            if(!$handle->ValidationAll()){
                return;
            }

            $name = $_POST["nome"];
            $depoiment = $_POST["depoimento"];
            $date = $_POST["data"];

            $handle->AddValidation($validationEmpty, [$name, $depoiment, $date]);
            $handle->AddValidation($validationDate, ["date"=>$date]);
            
            if(!$handle->ValidationAll()){
                $_SESSION["error"] = "Porfavor preenchar os campos corretamente";
                return;
            }

            $db->update("UPDATE `$tb_name` SET `nome` = ?, `depoimento` = ?, `data` = ? WHERE id = ?", [$name, $depoiment, $date, $id]);
            $_SESSION["success"] = "Depoimento Atualizado com sucesso!";
        }
    }