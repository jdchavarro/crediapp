<?php

class View {

    function __construct() {
    }

    public function render($path, $data = "") {
        extract($data);
        require VIEWS . $path . '.php';
    }
}