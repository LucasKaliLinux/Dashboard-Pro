<?php

    namespace controllers;

    use classes\Layout;

    class NewsController{
        public function index(){

            Layout::layout([
                DIR_VIEW_MAIN."templates/header",
                DIR_VIEW_MAIN."templates/mainHeader",
                DIR_VIEW_MAIN."news",
                DIR_VIEW_MAIN."templates/mainFooter",
                DIR_VIEW_MAIN."templates/footer"
            ]);
            
        }
    }