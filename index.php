<?php
require 'config.php';

$url = isset($_GET['url']) ? $_GET['url'] : "Index/index";

$url = explode("/", $url);

$controller = "";
$method = "";
$params = "";

if (isset($url[0])) {
    $controller = $url[0] . "Controller";
}

if (isset($url[1])) {
    if ($url[1] != '') {
        $method = $url[1];
    }
}

if (isset($url[2]) && $url[2] != "") {
    $params = $url[2];
}

spl_autoload_register(function ($class) {
    if (file_exists(LBY . $class . ".php")) {
        require LBY . $class . ".php";
    }
});

$controllerPath = "Controllers/" . $controller . ".php";

if (file_exists($controllerPath)) {
    require $controllerPath;

    $controller = new $controller();
    if (method_exists($controller, $method)) {
        if ($params != "") {
            $controller->{$method}($params);
        } else {
            $controller->{$method}();
        }
    } else {
        echo "ERROR 404";
    }
} else {
    echo "ERROR 404";
}
