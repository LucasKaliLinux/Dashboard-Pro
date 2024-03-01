<?php

    namespace panel\classes;

    use classes\Database;

    class ValidateSlog implements ValidationInterface{
        public function validate(array $param, Database $db = NULL): bool{
            $tb = $param["tb_name"];
            $slog = $param["slog"];

            $sql = $db->selectOne("SELECT * FROM `$tb` WHERE slog = ?", [$slog]);
            $rows = $sql["rows"];

            if($rows != 0){
                $_SESSION["error"] = "Nome repetidos não são permitidos!";
                return false;
            }

            return true;
        }
    }