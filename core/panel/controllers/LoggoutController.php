<?php

    namespace panel\controllers;

    use panel\classes\Redirect;

    class LoggoutController{
        public function index(){
            session_destroy();
            $this->cookie_destroy();
            
            Redirect::redirectRouter("panel");
        }

        private function cookie_destroy(){
            setcookie("remember", null, -1, "/");
            setcookie("user", null, -1, "/");
            setcookie("pass", null, -1, "/");
        }
    }