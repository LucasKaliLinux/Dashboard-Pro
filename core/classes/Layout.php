<?php

    namespace classes;

    class Layout{
        
        public static function layout(array $structs, array $data = null){

            if(!empty($data)){
                extract($data);
            }

            foreach($structs as $struct){
                include("$struct.php");
            }
        }
    }