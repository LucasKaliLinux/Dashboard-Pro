<?php

    namespace panel\classes;

    use classes\Database;

    class ValidateId implements ValidationInterface{
        public function validate(array $param, Database $db = NULL): bool{
            $id = $param["id"];
            $tb_name = $param["tb_name"];

            $sql = $db->selectOne("SELECT * FROM `$tb_name` WHERE id = ?", [$id]);
            $rows = $sql["rows"];

            if($rows != 0){
                return true;
            }

            $_SESSION["error"] = "Por favor bote uma opção valida!";
            return false;
        }
    }