<?php

    namespace panel\controllers;

    use classes\Layout;
    use panel\models\TB_metrics;

    class HomeController{
        public function index(){
        
            $tbMetrics      = new TB_metrics(date("Y-m-d H:i:s"));
            
            $totalVisits    = $tbMetrics->totalVisits();
            $onlineVisits   = $tbMetrics->onlineVisits();
            $currentVisits  = $tbMetrics->currentVisits();
            $totalUsersPanel= $tbMetrics->totalUsersPanel();

            $data = [
                "totalVisits"       =>$totalVisits,
                "currentVisits"     =>$currentVisits,
                "onlineVisits"      =>$onlineVisits["rows"],
                "onlineVisitsResult"=>$onlineVisits["result"],
                "totalUsersPanel"   =>$totalUsersPanel
            ];

            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."home",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ], $data);
        }
    }