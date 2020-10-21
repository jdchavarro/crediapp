<?php

class QueryManager {

    private $link;

    function __construct($host, $user, $password, $dbname) {

        $this->link = new mysqli($host, $user, $pass, $dbname);

        if ($this->link->connect_errno) {
            echo "Error de Conexion: " . $this->link->connect_error;
        }
    }
}
