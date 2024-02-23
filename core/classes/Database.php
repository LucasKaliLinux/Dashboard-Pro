<?php

    namespace classes;

    use PDO;
    use PDOException;
    use Exception;

    class Database{
        
        private $conect;
        
        private function on(){
            $this->conect = new PDO(
                "mysql:".
                "host=".MYSQL_SERVER.";".
                "dbname=".MYSQL_DATABASE.";".
                "charset=".MYSQL_CHARSET,
                MYSQL_USER,
                MYSQL_PASS,
                [
                    PDO::ATTR_PERSISTENT         => true,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ]
            );
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        
        private function off(){
            $this->conect = null;
        }

        public function selectOne($sql, $param = null){

            if(!preg_match("/^SELECT/i", trim($sql))){
                throw new Exception("DATABASE - Not a SELECT statement");
            }

            $this->on();

            $results = [];

            try{

                $exec = $this->conect->prepare($sql);
                (!empty($param)) ? $exec->execute($param) : $exec->execute();
                $results["result"] = $exec->fetch();
                $results["rows"]   = $exec->rowCount();

            }catch(PDOException $e){
                return false;
            }

            $this->off();

            return $results;
        }

        public function select($sql, $param = null){

            if(!preg_match("/^SELECT/i", trim($sql))){
                throw new Exception("DATABASE - Not a SELECT statement");
            }

            $this->on();

            $results = [];

            try{

                $exec = $this->conect->prepare($sql);
                (!empty($param)) ? $exec->execute($param) : $exec->execute();
                $results["result"] = $exec->fetchAll();
                $results["rows"]   = $exec->rowCount();

            }catch(PDOException $e){
                return false;
            }

            $this->off();

            return $results;
        }

        public function insert($sql, $param = null){

            if(!preg_match("/INSERT/i", trim($sql))){
                throw new Exception("DATABASE - Not a INSERT statement");
            }

            $this->on();

            try{

                $exec = $this->conect->prepare($sql);
                (!empty($param)) ? $exec->execute($param) : $exec->execute();
                
            }catch(PDOException $e){
                return false;
            }

            $this->off();
        }

        public function update($sql, $param = null){

            if(!preg_match("/UPDATE/i", trim($sql))){
                throw new Exception("DATABASE - Not a UPDATE statement");
            }

            $this->on();

            try{

                $exec = $this->conect->prepare($sql);
                (!empty($param)) ? $exec->execute($param) : $exec->execute();

            }catch(PDOException $e){
                return false;
            }

            $this->off();
        }

        public function delete($sql, $param = null){

            if(!preg_match("/DELETE/i", trim($sql))){
                throw new Exception("DATABASE - Not a DELETE statement");
            }

            $this->on();

            try{

                $exec = $this->conect->prepare($sql);
                (!empty($param)) ? $exec->execute($param) : $exec->execute();

            }catch(PDOException $e){
                return false;
            }

            $this->off();
        }

        public function lastId(){
            $this->on();

            return $this->conect->lastInsertId();

            $this->off();
        }
    }

/**
     * CRUD
     * 
     * Create - INSERT
     * Read   - SELECT
     * Update - UDDATE
     * Delete - DELETE
     */
    /**
     * define("MYSQL_SERVER",      "localhost");
        define("MYSQL_DATABASE",    "projeto_01");
        define("MYSQL_USER",        "root");
        define("MYSQL_PASS",        "");
        define("MYSQL_CHARSET",     "utf8");
     */