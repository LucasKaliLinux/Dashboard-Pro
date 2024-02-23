<?php

    namespace panel\classes;

    use classes\Database;

    class ValidateDate implements ValidationInterface{
        public function validate(array $param, Database $db = NULL): bool{
            
            $date = $param["date"];
            $vali = preg_match("/^(\d){2}\/(\d){2}\/(\d){4}\$/u", $date);

            if($vali)
                return true;

            return false;
        }
    }