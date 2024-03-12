<?php

    namespace controllers;

use classes\Database;
use classes\Layout;
    use panel\classes\Redirect;

    class NewsSingleController{
        public function index(){

            if(!isset($_GET["news"]) || !isset($_GET["categoria_id"])){
                Redirect::redirectRouter("news");
            }

            $db   = new Database;
            $news = $_GET["news"];
            $categorie_id = $_GET["categoria_id"];
            
            $sql = $db->selectOne("SELECT * FROM `tb_site_noticias` WHERE slog = ? AND categoria_id = ?", [$news, $categorie_id]);
            $result = $sql["result"];

            $data = [
                "news" => $result
            ];

            Layout::layout([
                DIR_VIEW_MAIN."templates/header",
                DIR_VIEW_MAIN."templates/mainHeader",
                DIR_VIEW_MAIN."newsSingle",
                DIR_VIEW_MAIN."templates/mainFooter",
                DIR_VIEW_MAIN."templates/footer"
            ], $data);
            
        }
    }