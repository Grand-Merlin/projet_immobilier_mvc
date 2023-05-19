<?php

require_once 'config/config.php';

$url = $_GET['url'] ?? 'login/index';

$url = rtrim($url, '/');
$url = explode('/', $url);

$controllerName = ucfirst($url[0]) . 'Controller';
$methodName = isset($url[1]) ? $url[1] : 'index';

require_once 'controllers/' . $controllerName . '.php';

$controller = new $controllerName;

if (method_exists($controller, $methodName)) {
    $controller->{$methodName}();
} else {
    throw new Exception("Method $methodName not found in controller $controllerName.");
}
