<?php

class Controller {

    public $model;
    public $view;

    function __construct() {
        Session::start();
        $this->view = new View();
        $this->loadClassModels();
    }

    public function loadClassModels() {
        $clase = substr(get_class($this), 0, -10);
        $model = $clase . "Model";
        $path = MODELS . $model . ".php";
        if (file_exists($path)) {
            require $path;
            $this->model = new $model();
        }
    }
}
