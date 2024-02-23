<?php

    namespace panel\classes;

    use classes\Database;

    class ValidateOffice implements ValidationInterface{
        public function validate(array $param, Database $db = NULL): bool{
            $office = $param["office"];

            if(Office::getOffice($office)){
                return true;
            }

            return false;
        }
    }