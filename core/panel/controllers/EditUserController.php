<?php

    namespace panel\controllers;

    use classes\Layout;
    use panel\classes\Office;

    class EditUserController{
        public function index(){

            if(!Office::getPermission(OFFICE_ADMIN)){
                Office::permissionInvalid();
            }

            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."editUser",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ]);
        }
    }