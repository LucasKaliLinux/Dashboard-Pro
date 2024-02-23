<?php

    namespace panel\models;

    use classes\Database;

    class TB_metrics{

        private Database $db;
        private string $date;

        public function __construct($date){
            $this->db   = new Database;
            $this->date = $date;
        }

        public function totalUsersPanel(){
            $results = $this->db->select("SELECT * FROM `tb_admin_usuarios`");
            return $results["result"];
        }

        public function totalVisits(){
            $results = $this->db->select("SELECT * FROM `tb_admin_visitas`");
            return $results["rows"];
        }

        public function currentVisits(){
            $results = $this->db->select("SELECT * FROM `tb_admin_visitas` WHERE `day` = ?", [date("Y-m-d")]);
            return $results["rows"];
        }

        public function onlineVisits(){
            $this->flushTableOnlineVisits();
            $results = $this->db->select("SELECT * FROM `online_tb`");
            return $results;
        }

        private function flushTableOnlineVisits(){
            $this->db->delete("DELETE FROM `online_tb` WHERE last_action < '$this->date' - INTERVAL 1 MINUTE");
        }
    }