<?php

    namespace panel\models;

    use classes\Database;

    class UpdateUser{

        private Database $db;

        public function __construct(Database $db){
            $this->db = $db;
        }

        public function updateUser($name, $pass, $imagem){
            $arr = [
                ":nome"  => $name,
                ":user"  => $_SESSION["user"],
                ":pass"  => $pass,
                ":img"  => $imagem
            ];
            $_SESSION["name"] = $arr[":nome"];
            $_SESSION["pass"] = $arr[":pass"];
            $_SESSION["img"]  = $arr[":img"];
            $this->db->update("UPDATE `tb_admin_usuarios` SET nome = :nome, pass = :pass, img = :img WHERE user = :user", $arr);
        }
    }