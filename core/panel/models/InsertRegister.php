<?php

    namespace panel\models;

    use classes\Database;

    class InsertRegister{
        private Database $db;

        public function __construct(Database $db){
            $this->db = $db;    
        }

        public function insertRegister(string $tb_name, array $param): void{
            
            $param[] = 0;
            $query = "INSERT INTO `$tb_name` VALUES (NULL";
            
            foreach($param as $key => $value){
                $query .= ",?";
            }

            $query .= ")";
            
            $this->db->insert($query, $param);

            $lastId = $this->db->lastId();

            $this->db->update("UPDATE `$tb_name` SET order_id = $lastId WHERE id = $lastId");
        }

        public function generateSlog(string $str): string{
            $str = mb_strtolower($str);
            $str = preg_replace("/(ã|á|â|à)/", "a", $str);
            $str = preg_replace("/(é|è|ê)/", "e", $str);
            $str = preg_replace("/(Ì,Í,î)/", "i", $str);
            $str = preg_replace("/(ú)/", "u", $str);
            $str = preg_replace("/(ó,ò,õ,ô)/", "o", $str);
            $str = preg_replace("/(ç)/", "c", $str);
            $str = preg_replace("/(_|\/|!|\?|#)/", "", $str);
            $str = preg_replace("/( )/", "-", $str);
            $str = preg_replace("/(-[-]{1,})/", "-", $str);
            $str = preg_replace("/(,)/", "-", $str);
            $str = strtolower($str);
            return $str;
        }
    }