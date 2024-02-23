<?php

    namespace panel\controllers;

    use classes\Database;
    use classes\Layout;
    use panel\classes\HandleValidation;
    use panel\classes\Office;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidatePost;

    class EditGeneralController{
        public function index(){

            if(!Office::getPermission(OFFICE_SUBADMIN)){
                Office::permissionInvalid();
            }

            $db = new Database;

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $this->postEdit($db, "tb_site_config");
            }

            $select = $db->selectOne("SELECT * FROM `tb_site_config` LIMIT 1");
            $result = $select["result"];
            
            $data = ["result"=>$result];
            
            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."editGeneral",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ], $data);
        }

        private function postEdit(Database $db, string $tb_name){
            
            $validationEmpty = new ValidateEmpty;
            $validationPost  = new ValidatePost;
            $handle = new HandleValidation();

            $post = [
                "editar", 
                "titulo", 
                "nome_autor",
                "descricao",
                "icone1",
                "icone_descricao1",
                "icone2",
                "icone_descricao2",
                "icone3",
                "icone_descricao3"
            ];

            $handle->AddValidation($validationPost, $post);

            if(!$handle->ValidationAll()){
                return;
            }

            $arr = [
                $_POST["titulo"],
                $_POST["nome_autor"],
                $_POST["descricao"],
                $_POST["icone1"],
                $_POST["icone_descricao1"],
                $_POST["icone2"],
                $_POST["icone_descricao2"],
                $_POST["icone3"],
                $_POST["icone_descricao3"]
            ];

            $handle->AddValidation($validationEmpty, $arr);

            if(!$handle->ValidationAll()){
                $_SESSION["error"] = "Preencha os campos corretamente!";
                return;
            }

            $db->update("UPDATE `$tb_name` SET 
            `titulo` = ?,
            `nome_autor` = ?,
            `descricao` = ?,
            `icone1` = ?,
            `icone_descricao1` = ?,
            `icone2` = ?,
            `icone_descricao2` = ?,
            `icone3` = ?,
            `icone_descricao3` = ?", $arr);
            $_SESSION["success"] = "Configurações do site foram alteradas!";
        }
    }