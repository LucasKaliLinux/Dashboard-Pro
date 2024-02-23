<?php

    namespace classes;

    interface FactoryInterface{
        public function make($classname, ...$param);
    }