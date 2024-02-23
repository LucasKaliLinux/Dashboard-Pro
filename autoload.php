<?php

    function autoload($class){
        
        $file = DIR_CLASS . "$class.php";
        $file = str_replace("\\", "/", $file);
        
        if(file_exists($file))
            include($file);
    }

    spl_autoload_register("autoload");