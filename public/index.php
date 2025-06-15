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
        require_once __DIR__ . '/../app/Controllers/HomeController.php';
        (new HomeController())->index();
        break;
    case '/login':
        require_once __DIR__ . '/../app/Controllers/LoginController.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new LoginController())->auth();
        } else {
            (new LoginController())->index();
        }
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
