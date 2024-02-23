<?php

    namespace panel\controllers;

    use classes\Database;
    use panel\classes\IsSession;
    use panel\classes\Redirect;
    use panel\classes\ValidateEmpty;
    use panel\classes\ValidateLogin;
    use panel\classes\ValidatePost;
    use panel\classes\HandleValidation;

    class LoginController{
        
        public function index(){
            
            if(IsSession::isSession("login")){
                Redirect::redirectRouter("home");
            }

            if($_SERVER["REQUEST_METHOD"] != "POST"){
                Redirect::redirectRouter("panel");
            }

            $db = new Database;

            $validationPost  = new ValidatePost;
            $validationLogin = new ValidateLogin;
            $validationEmpty = new ValidateEmpty;
            
            $handle = new HandleValidation($db);
            $handle->AddValidation($validationPost, ["user", "pass"]);

            if(!$handle->ValidationAll()){
                Redirect::redirectRouter("panel");
            }
            
            $user = $_POST["user"];
            $pass = $_POST["pass"];
            $param = ["user"=>$user, "pass"=>$pass];
            
            $handle->AddValidation($validationEmpty, [$user]);
            $handle->AddValidation($validationLogin, $param);

            if(!$handle->ValidationAll()){
                $_SESSION["error"] = "Credenciais Invalida!";
                Redirect::redirectRouter("panel");
            }

            if(isset($_POST["remember"])){
                setcookie("remember", true, time() + (60*60*24*3), "/");
                setcookie("user", $user, time() + (60*60*24*3), "/");
                setcookie("pass", $pass, time() + (60*60*24*3), "/");
            }

            Redirect::redirectRouter("home");
        }
    }

