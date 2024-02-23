<?php

    namespace panel\models;

    use classes\Database;

    class InsertRegister{
        private Database $db;

        public function __construct(Database $db){
            $this->db = $db;    
        }

        public function insertRegister(string $tb_name, array $param){
            
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
    }