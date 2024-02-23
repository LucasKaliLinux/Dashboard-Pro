<?php

    namespace panel\classes;

    use classes\Database;

    class ValidatePost implements ValidationInterface{
        public function validate(array $param, Database $db = NULL): bool{
            
            foreach($param as $key => $value){
                if(!isset($_POST[$value])){
                    return false;
                }
            }

            return true;
        }
    }