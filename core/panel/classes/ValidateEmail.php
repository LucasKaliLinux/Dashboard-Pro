<?php

    namespace panel\classes;

    use classes\Database;

    class ValidateEmail implements ValidationInterface{
        public function validate(array $param, Database $db = NULL): bool{
            $email = $param["email"];
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                return true;
            }
            
            return false;
        }
    }