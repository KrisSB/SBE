<?php

class Database extends PDO {

    function __construct() {
        try {
            parent::__construct(DB_MS . ":host=" . DB_HOST . ";dbname=" . DB_NAME,DB_USER,DB_PASS);
        } catch(Exception $e) {
            Echo 'Error with Database';
        }
    }

}