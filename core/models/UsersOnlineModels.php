<?php

    namespace models;

    use classes\Database;
    use classes\UsersOnline;

    class UsersOnlineModels{

        private $usersOnline;
        private $db;

        public function conectUsersOnline(){
            $this->db          = new Database();
            $this->usersOnline = new UsersOnline($this->db);
        }

        public function createUserTotal(){
            $this->usersOnline->insertUsersTotal();
        }

        public function createUserOnline($token){
            $this->usersOnline->insertUsersOnline($token);
        }

        public function updateUserOnline($token){
            $selectUser = $this->usersOnline->selectUserOnline($token);
            $result = $selectUser["result"];
            $rows = $selectUser["rows"];
            
            if($rows == 1){
                $this->usersOnline->updateUsersOnline($token);
            }else{
                $this->createUserOnline($token);
            }
        }
    }