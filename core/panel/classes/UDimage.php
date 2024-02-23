<?php

    namespace panel\classes;

    class UDimage{
        public static function uploadFile($file){
            return (move_uploaded_file($file["tmp_name"], DIR_ASSETS_PAINEL.'/uploads/'.$file["name"]) ? $file["name"] : false);
        }

        public static function deleteFile($file){
            @unlink(DIR_ASSETS_PAINEL."/uploads/".$file["name"]);
        }
    }