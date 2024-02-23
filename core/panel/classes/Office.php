<?php

    namespace panel\classes;

use classes\Layout;

    class Office{
        public static function getOffice($office){
            $officeArr = [
                OFFICE_COLLABORATOR => "Colaborador",
                OFFICE_SUBADMIN     => "Sub Administrador",
                OFFICE_ADMIN        => "Administrador"
            ];
            
            return $officeArr[$office] ?? null;
        }

        public static function getPermission(int $permission): bool{
            $office = $_SESSION["officeN"];

            if($office < $permission){
                return false;
            }

            return true;
        }

        public static function permissionInvalid(){
            $_SESSION["error"] = "Você não tem permissão para acessar essa funcionalidade!";
            Layout::layout([
                DIR_VIEW_PANEL."templates/header",
                DIR_VIEW_PANEL."templates/sidebar",
                DIR_VIEW_PANEL."templates/mainHeader",
                DIR_VIEW_PANEL."templates/mainFooter",
                DIR_VIEW_PANEL."templates/footer",
            ]);
            die();
        }

    }