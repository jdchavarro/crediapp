<?php

class Conexion {

    public $db;

    function __construct() {
        $this->db = new QueryManager("localhost", "root", "toor", "crediapp");
    }
}
