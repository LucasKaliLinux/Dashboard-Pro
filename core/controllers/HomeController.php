<?php

    namespace controllers;

    use classes\Database;
    use classes\Layout;
    use models\SiteConfig;

    class HomeController{
        public function index(){

            $database   = new Database;
            $siteConfig = new SiteConfig($database);

            $result = $siteConfig->getConfigSite("tb_site_config");
            $depoiments = $siteConfig->getContentSite("tb_site_depoimentos", 3);
            $services   = $siteConfig->getContentSite("tb_site_servicos", 8);

            $data = [
                "title"      => APP_NAME . " " . APP_VERSION,
                "result"     => $result,
                "depoiments" => $depoiments,
                "services"   => $services
            ];

            Layout::layout([
                DIR_VIEW_MAIN."templates/header",
                DIR_VIEW_MAIN."templates/mainHeader",
                DIR_VIEW_MAIN."home",
                DIR_VIEW_MAIN."templates/mainFooter",
                DIR_VIEW_MAIN."templates/footer"
            ], $data);
            
        }
    }