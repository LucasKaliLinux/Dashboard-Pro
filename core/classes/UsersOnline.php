<?php

    namespace classes;

    class UsersOnline{
        
        private Database $db;
        private string $ip;
        private string $day;
        private array $param;

        public function __construct(Database $db){
            $this->db = $db;
            $this->ip  = $this->getIp();
            $this->day = $this->getDay();
            $this->param = [":ip"=>$this->ip, ":dayCurrent"=>$this->day];
        }

        public function selectUserOnline($token){
            $results = $this->db->selectOne("SELECT * FROM `online_tb` WHERE token = :token", [":token"=>$token]);
            return $results;
        }

        public function updateUsersOnline($token){
            $this->db->update("UPDATE `online_tb` SET last_action = :dayCurrent WHERE token = :token", [":dayCurrent"=>$this->day, ":token"=>$token]);
        }

        public function insertUsersOnline($token){
            $this->param[":token"] = $token;
            $this->db->insert("INSERT INTO `online_tb` VALUES (NULL, :ip, :dayCurrent, :token)", $this->param);
        }

        public function insertUsersTotal(){
            $this->db->insert("INSERT INTO `tb_admin_visitas` VALUES (NULL, :ip, :dayCurrent)", $this->param);
        }

        private function getDay(): string{
            $currentDay = date("Y-m-d H:i:s");
            return $currentDay;
        }

        private function getIp(): string{
            $ipaddress = '';

            switch(true){
                case isset($_SERVER['HTTP_CLIENT_IP']):
                    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
                    break;
                case isset($_SERVER['HTTP_X_FORWARDED_FOR']):
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    break;
                case isset($_SERVER['HTTP_X_FORWARDED']):
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                    break;
                case isset($_SERVER['HTTP_FORWARDED_FOR']):
                    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                    break;
                case isset($_SERVER['HTTP_FORWARDED']):
                    $ipaddress = $_SERVER['HTTP_FORWARDED'];
                    break;
                case isset($_SERVER['REMOTE_ADDR']):
                    $ipaddress = $_SERVER['REMOTE_ADDR'];
                    break;
                default:
                    $ipaddress = 'UNKNOWN';
                    break;
            }

            return htmlspecialchars($ipaddress);
        }
    }