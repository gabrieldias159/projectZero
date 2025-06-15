<?php
// Ponto de entrada da aplicação
require_once __DIR__ . '/../src/app.php';
session_start();
require_once __DIR__ . '/../config/config.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = '/beta/projectZero/public';
$route = substr($uri, strlen($base));

switch (true) {
    case ($route === '/' || $route === ''):
        require_once __DIR__ . '/../app/Controllers/HomeController.php';
        (new HomeController())->index();
        break;
    case ($route === '/login'):
        require_once __DIR__ . '/../app/Controllers/LoginController.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new LoginController())->auth();
        } else {
            (new LoginController())->index();
        }
        break;
    case ($route === '/users'):
        require_once __DIR__ . '/../views/users.php';
        break;
    case ($route === '/processos'):
        require_once __DIR__ . '/../views/processos.php';
        break;
    case (preg_match('#^/api/users$#', $route) && $_SERVER['REQUEST_METHOD'] === 'GET'):
        require_once __DIR__ . '/../app/Controllers/UserController.php';
        (new UserController())->list();
        break;
    case (preg_match('#^/api/users$#', $route) && $_SERVER['REQUEST_METHOD'] === 'POST'):
        require_once __DIR__ . '/../app/Controllers/UserController.php';
        (new UserController())->create();
        break;
    case (preg_match('#^/api/users/(\d+)$#', $route, $m) && $_SERVER['REQUEST_METHOD'] === 'GET'):
        require_once __DIR__ . '/../app/Controllers/UserController.php';
        (new UserController())->get($m[1]);
        break;
    case (preg_match('#^/api/users/(\d+)$#', $route, $m) && $_SERVER['REQUEST_METHOD'] === 'PUT'):
        require_once __DIR__ . '/../app/Controllers/UserController.php';
        (new UserController())->update($m[1]);
        break;
    case (preg_match('#^/api/users/(\d+)$#', $route, $m) && $_SERVER['REQUEST_METHOD'] === 'DELETE'):
        require_once __DIR__ . '/../app/Controllers/UserController.php';
        (new UserController())->delete($m[1]);
        break;
    default:
        http_response_code(404);
        require_once __DIR__ . '/../views/404.php';
}
