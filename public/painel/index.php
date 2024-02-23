<?php

    use classes\Factory;

    session_start();

    require_once("../../config.php");
    require_once("../../autoload.php");

    $factory = new Factory;

    $router = new Router($factory);
    $router->build("panel");