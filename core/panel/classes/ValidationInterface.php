<?php

    namespace panel\classes;

    use classes\Database;

    interface ValidationInterface{
        public function validate(array $param, Database $db = NULL): bool;
    }