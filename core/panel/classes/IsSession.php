<?php

    namespace panel\classes;

    class IsSession {
        public static function isSession(string $session) {
            return isset($_SESSION[$session]);
        }
    }