<?php

    namespace controllers;

use classes\Database;
use classes\Layout;
use panel\models\TB_list;

    class NewsController{
        public function index(){

            $db = new Database;
            $tb_name = "tb_site_noticias";

            $categorie = $this->getCategorie($db);
            $sql       = $db->select("SELECT * FROM `tb_site_categorias` ORDER BY order_id ASC");
            $result    = $sql["result"];

            $list = new TB_list($db, 3);

            $numberPagesShow = $list->getNumberPagesShow($tb_name);
            $currentPage     = $list->filterGetPag();
            $resultNews      = $list->getResultsList($tb_name);

            if($categorie){
                $resultNews = $list->getResultsWhereCategoria($tb_name, $categorie["id"]);
            }

            $data = [
                "categories" => $result,
                "categorie"  => $categorie,
                "news"       => $resultNews,
                "numberPags" => $numberPagesShow,
                "currentPag" => $currentPage
            ];

            Layout::layout([
                DIR_VIEW_MAIN."templates/header",
                DIR_VIEW_MAIN."templates/mainHeader",
                DIR_VIEW_MAIN."news",
                DIR_VIEW_MAIN."templates/mainFooter",
                DIR_VIEW_MAIN."templates/footer"
            ], $data);
            
        }

        public function getCategorie(Database $db){
            if(isset($_GET["categoria"])){
                $sql    = $db->selectOne("SELECT * FROM `tb_site_categorias` WHERE id = ?", [$_GET["categoria"]]);
                $result = $sql["result"];
                $rows   = $sql["rows"];
                if($rows != 0){
                    return $result;
                }
            }

            return false;
        }
    }