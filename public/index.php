<?php
// Ponto de entrada da aplicação
require_once __DIR__ . '/../src/app.php';
session_start();
require_once __DIR__ . '/../config/config.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = '/beta/projectZero/public';
$route = substr($uri, strlen($base));

switch ($route) {
    case '/':
    case '':
        require_once __DIR__ . '/../views/home.php';
        break;
    case '/login':
        require_once __DIR__ . '/../views/login.php';
        break;
    case '/users':
        require_once __DIR__ . '/../views/users.php';
        break;
    case '/processos':
        require_once __DIR__ . '/../views/processos.php';
        break;
    default:
        http_response_code(404);
        require_once __DIR__ . '/../views/404.php';
}
