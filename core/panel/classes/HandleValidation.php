<?php

    namespace panel\classes;

    use classes\Database;

    class HandleValidation{
        private $db;
        private $val = [];

        public function __construct(Database $db = NULL){
            $this->db = $db;
        }

        public function AddValidation(ValidationInterface $typeValidation, array $param){
            $this->val[] = ["validation" => $typeValidation, "param" => $param];
        }

        public function debugLog(){
            echo("<pre>");
            print_r($this->val);
            echo("</pre>");
        }

        public function ValidationAll(): bool{
            foreach($this->val as $val){
                $isVal = $val["validation"]->validate($val["param"], $this->db);
                if(!$isVal){
                    return false;
                }
            }

            unset($this->val);
            return true;
        }
    }