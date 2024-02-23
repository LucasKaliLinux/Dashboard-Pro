<?php

    namespace panel\controllers;

    use classes\Layout;

    class RegisterSlideController{
        public function index(){
            Layout::layout([
                
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."registerSlide",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ]);
        }
    }