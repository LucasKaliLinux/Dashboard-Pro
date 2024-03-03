<?php

    namespace panel\controllers;

    use classes\Database;
    use classes\Layout;
    use panel\classes\HandleValidation;
    use panel\classes\UDimage;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidateId;
    use panel\classes\ValidatePost;
    use panel\classes\ValidateSlog;
use panel\classes\ValidateSlugAnd;
use panel\classes\ValidateUpload;
    use panel\models\InsertRegister;

    class RegisterNewsController{
        public function index(){
            
            $db = new Database;
            $tb = "tb_site_noticias";

            $sql = $db->select("SELECT * FROM `tb_site_categorias`");
            $result = $sql["result"];
            
            $data = [
                "categories"  => $result,
                "recoverPost" => [$this, "recoverPost"]
            ];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $this->post_news($db, $tb);
            }

            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."registerNews",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ],$data);
        }

        public function recoverPost(string $post): string{
            if(isset($_POST[$post])){
                return $_POST[$post];
            }

            return "";
        }

        private function post_news(Database $db, string $tb_name){
            
            $handle           = new HandleValidation($db);
            $insertValues     = new InsertRegister($db);
            $validationPost   = new ValidatePost();
            $validationEmpty  = new ValidateEmpty();
            $validationId     = new ValidateId();
            $validationUpload = new ValidateUpload();
            $validationSlug   = new ValidateSlugAnd();

            $handle->AddValidation($validationPost, ["categoria", "titulo", "conteudo", "enviar"]);

            if(!$handle->ValidationAll()){
                return;
            }

            $categorie_id = htmlspecialchars($_POST["categoria"]);
            $title        = htmlspecialchars($_POST["titulo"]);
            $content      = htmlspecialchars($_POST["conteudo"]);
            $slug         = $insertValues->generateSlog($title);
            $img          = $_FILES["imagem"];

            $handle->AddValidation($validationEmpty, [$categorie_id, $title, $content, $img["name"], $img["type"], $img["size"]]);
            $handle->AddValidation($validationId, ["id"=>$categorie_id, "tb_name"=>"tb_site_categorias"]);
            $handle->AddValidation($validationUpload, ["img"=>$img]);
            $handle->AddValidation($validationSlug, ["tb_name"=>$tb_name, "slog"=>$slug, "column"=>"categoria_id", "param"=>$categorie_id]);

            if(!$handle->ValidationAll()){
                return;
            }

            $img["name"] = UDimage::generateImg($img["name"], "_news");
            $img["name"] = htmlspecialchars($img["name"]);

            UDimage::uploadFile($img);

            $insertValues->insertRegister($tb_name, [$categorie_id, $title, $content, $img["name"], $slug]);
            $_SESSION["success"] = "Tudo certo irmão";
        }
    }