<?php
declare(strict_types=1);

// URL parts
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$urlParts = explode('/', rtrim($requestPath, '/'));

$controllerName = ucfirst(($urlParts[1]) ?? 'notes') . 'Controller';
$repositoryName = substr(ucfirst(($urlParts[1]) ?? 'notes'), 0, -1) . 'Repository';
$controllerClass = "App\\Controller\\$controllerName";
$repositoryClass = "App\\Repository\\$repositoryName";
$methodName = $urlParts[2] ?? 'list';

if (!class_exists($controllerClass)) {
    http_response_code(404);
    exit("Unknown route.");
}

$pdo = new PDO('sqlite:' . __DIR__ . '/../notes.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$repository = new $repositoryClass($pdo);
$controller = new $controllerClass($repository);

if (!method_exists($controller, $methodName) || !isset($controllerClass::ALLOWED_ACTIONS[$methodName])) {
    http_response_code(404);
    exit("Unknown action.");
}

$controller->$methodName();
