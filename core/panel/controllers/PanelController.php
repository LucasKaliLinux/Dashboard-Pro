<?php

    namespace panel\controllers;

    use classes\Database;
    use classes\Layout;
    use panel\classes\HandleValidation;
use panel\classes\Redirect;
use panel\classes\ValidateEmpty;
    use panel\classes\ValidateLogin;

    class PanelController{
        public function index(){
            
            if(isset($_COOKIE["remember"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){
                $database        = new Database;
                $validationEmpty = new ValidateEmpty;
                $validationLogin = new ValidateLogin;
                $handle          = new HandleValidation($database);

                $param = [
                    "user" => $_COOKIE["user"],
                    "pass" => $_COOKIE["pass"]
                ];

                $handle->AddValidation($validationEmpty, $param);
                $handle->AddValidation($validationLogin, $param);

                if($handle->ValidationAll()){
                    Redirect::redirectRouter("home");
                }
            }

            Layout::layout([
                DIR_VIEW_PANEL."login"
            ]);
        }
    }