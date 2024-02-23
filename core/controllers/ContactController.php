<?php

    namespace controllers;

    use classes\Layout;

    class ContactController{

        public function index(){
            
            $data = [
                "title"  => APP_NAME . " " . APP_VERSION
            ];

            Layout::layout([
                DIR_VIEW_MAIN."templates/header",
                DIR_VIEW_MAIN."contact",
                DIR_VIEW_MAIN."templates/footer"
            ], $data);
        }
    }