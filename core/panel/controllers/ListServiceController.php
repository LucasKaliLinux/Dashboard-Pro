<?php

    namespace panel\controllers;

    use classes\Database;
    use classes\Layout;
    use panel\models\TB_list;

    class ListServiceController{
        public function index(){

            $byPag   = 5;
            $tb_name = "tb_site_servicos";

            $db   = new Database();
            $list = new TB_list($db, $byPag);

            $list->ordersId($tb_name);
            $list->deleteId($tb_name);

            $numberPagesShow = $list->getNumberPagesShow($tb_name);
            $currentPage     = $list->filterGetPag();
            $services        = $list->getResultsList($tb_name);

            $data = [
                "services"  =>$services,
                "numberPags"=>$numberPagesShow,
                "currentPag"=>$currentPage
            ];

            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."listService",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ], $data);
        }
    }