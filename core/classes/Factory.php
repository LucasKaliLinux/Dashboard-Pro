<?php

    namespace classes;

    use ReflectionClass;

    class Factory implements FactoryInterface{
        public function make($classname, ...$param){
            $reflectClass = new ReflectionClass($classname);
            return $reflectClass->newInstanceArgs($param);
        }
    }