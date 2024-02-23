<?php

    namespace panel\classes;

    use classes\Database;

    class ValidateTel implements ValidationInterface{
        public function validate(array $param, Database $db = NULL): bool{
            
            $tel = $param["tel"];
            $vali = preg_match("/^(\d){2} (\d){5}-(\d){4}\$/u", $tel);

            if($vali)
                return true;

            return false;
        }
    }