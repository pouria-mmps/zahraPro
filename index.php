<?php
define('test', true);

require_once('./system/main.php');

$uri = getRequestUri();
$uri = str_replace('/MainProject/', '/', $uri);
$parts = explode('/', $uri);
$controller = $parts[1];

if (strlen($controller) == 0) {
    $controller = 'page';
}

if (count($parts) > 2) {
    $method = $parts[2];
} else {
    $method = 'home';
}

$params = array();
for ($i = 3; $i < count($parts); $i++) {
    $params[] = $parts[$i];
}

$controllerClassname = ucfirst($controller) . "Controller";
$controllerInstance = new $controllerClassname();
call_user_func_array(array($controllerInstance, $method), $params);