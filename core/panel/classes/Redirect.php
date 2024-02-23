<?php

    namespace panel\classes;

    class Redirect{
        public static function redirect(string $url){
            header("Location: $url");
            die();
        }

        public static function redirectRouter(string $rout){
            header("Location: ?pag=$rout");
            die();
        }
    }