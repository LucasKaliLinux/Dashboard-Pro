<?php

    namespace panel\models;

    use classes\Database;

    class CreateUser{

        private Database $db;

        public function __construct(Database $db){
            $this->db = $db;
        }

        public function createUser($name, $login, $pass, $office, $imagem){
            $arr = [
                ":nome"  => $name,
                ":user"  => $login,
                ":pass"  => $pass,
                ":office"=> $office,
                ":img"   => $imagem
            ];
            $this->db->insert("INSERT INTO `tb_admin_usuarios` VALUES (NULL, :user, :pass, :nome, :office, :img)", $arr);
        }
    }