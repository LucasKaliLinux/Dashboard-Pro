<?php

    namespace panel\classes;

    use classes\Database;
    use panel\classes\ValidationInterface;

    class ValidateLogin implements ValidationInterface{
        public function validate(array $param, Database $db = NULL): bool{
            $user = $param["user"];
            $pass = $param["pass"];

            $param = [
                ":user" => $user,
                ":pass" => $pass
            ];

            $results = $db->selectOne("SELECT * FROM `tb_admin_usuarios` WHERE user = :user AND pass = :pass", $param);
            $result  = $results["result"];
            $rows    = $results["rows"];
            
            if($rows > 0){
                $_SESSION["login"]  = true;
                $_SESSION["name"]   = htmlspecialchars($result["nome"]);
                $_SESSION["user"]   = htmlspecialchars($result["user"]);
                $_SESSION["pass"]   = htmlspecialchars($result["pass"]);
                $_SESSION["img"]    = $result["img"];
                $_SESSION["officeN"]= (int)$result["cargo"];
                $_SESSION["office"] = Office::getOffice($result["cargo"]);

                return true;
            }

            return false;
        }
    }