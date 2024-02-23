<?php

    namespace models;

    use classes\Database;

    class SiteConfig{

        private Database $db;

        public function __construct(Database $db){
            $this->db = $db;
        }

        public function getConfigSite(string $tb_name){
            $select = $this->db->selectOne("SELECT * FROM `$tb_name` LIMIT 1");
            return $select["result"];
        }

        public function getContentSite(string $tb_name, $limit){
            $select = $this->db->select("SELECT * FROM `$tb_name` LIMIT $limit");
            return $select["result"];
        }
    }