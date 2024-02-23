<?php

    namespace panel\classes;

    use classes\Database;

    class ValidateEmpty implements ValidationInterface{
        public function validate(array $param, Database $db = NULL): bool{
            
            foreach($param as $key => $value){
                if(empty(trim($value))){
                    return false;
                }
            }

            return true;
        }
    }