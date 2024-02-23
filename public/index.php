<?php

    session_start();

    use classes\Factory;
    use models\UsersOnlineModels;

    require_once("../config.php");
    require_once("../autoload.php");

    $factory   = new Factory;
    $router    = new Router($factory);
    $userModel = new UsersOnlineModels;

    $userModel->conectUsersOnline();

    if(!isset($_COOKIE["visita"])){
        $userModel->createUserTotal();
        setcookie("visita", true, time() + (60*60*24*7));
    }

    if(!isset($_SESSION["online"])){
        $_SESSION["online"] = uniqid();
        $token = $_SESSION["online"];
        $userModel->createUserOnline($token);
    }else{
        $token = $_SESSION["online"];
        $userModel->updateUserOnline($token);
    }
    
    $router->build("main");