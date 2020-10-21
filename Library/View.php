<?php

class View {

    function __construct() {
    }

    public function render($path, $data = "") {
        require VIEWS . $path . '.php';
    }
}
