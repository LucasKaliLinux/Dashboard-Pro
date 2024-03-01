<?php

    namespace panel\controllers;

    use classes\Database;
    use classes\Layout;
    use panel\models\TB_list;

    class ManageNewsController{
        public function index(){

            $byPag   = 5;
            $tb_name = "tb_site_noticias";

            $db   = new Database();
            $list = new TB_list($db, $byPag);

            $list->ordersId($tb_name);
            $list->deleteId($tb_name);

            $numberPagesShow = $list->getNumberPagesShow($tb_name);
            $currentPage     = $list->filterGetPag();
            $news            = $list->getResultsList($tb_name);

            $data = [
                "news"=>$news,
                "numberPags"=>$numberPagesShow,
                "currentPag"=>$currentPage,
                "db"=>$db,
                "getCategorie"=>[$this, "getCategorie"]
            ];

            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."manageNews",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ], $data);
        }

        public function getCategorie($id, Database $db){
            $sql = $db->selectOne("SELECT * FROM `tb_site_categorias` WHERE id = ?", [$id]);
            $result = $sql["result"];
            return $result["nome"];
        }
    }