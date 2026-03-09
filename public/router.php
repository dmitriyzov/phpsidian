<?php
declare(strict_types=1);

// URL parts
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$urlParts = explode('/', rtrim($requestPath, '/'));

$controllerName = ucfirst(($urlParts[1]) ?? 'notes') . 'Controller';
$methodName = $urlParts[2] ?? 'list';
$controllerClass = "App\\Controller\\$controllerName";

if (!class_exists($controllerClass)) {
    http_response_code(404);
    exit("Unknown route.");
}

$controller = new $controllerClass();

if (!method_exists($controller, $methodName)) {
    http_response_code(404);
    exit("Unknown action.");
}

$controller->$methodName();
