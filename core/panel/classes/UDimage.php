<?php

    namespace panel\classes;

    class UDimage{

        public static function generateImg(string $nameImg, string $extesion): string{
            $search = [".jpg", ".jpeg", ".png"];
            $subst  = ["$extesion.jpg", "$extesion.jpeg", "$extesion.png"];

            $nameImg = str_replace($search, $subst, $nameImg);
            return $nameImg;
        }

        public static function uploadFile(array $file){
            return (move_uploaded_file($file["tmp_name"], DIR_ASSETS_PAINEL.'/uploads/'.$file["name"]) ? $file["name"] : false);
        }

        public static function deleteFile($file){
            @unlink(DIR_ASSETS_PAINEL."/uploads/".$file["name"]);
        }
    }