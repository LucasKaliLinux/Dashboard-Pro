<?php

    namespace panel\classes;

    use classes\Database;

    class ValidatePermission implements ValidationInterface{
        public function validate(array $param, Database $db = NULL): bool{
            $permission = $param["permission"];

            if(Office::getPermission($permission)){
                return true;
            }

            return false;
        }
    }