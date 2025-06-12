<?php
// Ponto de entrada da aplicação
require_once __DIR__ . '/../src/app.php';

// Ponto de entrada: roteamento básico
session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../controllers/ProcessController.php';

$base = '/beta/projectZero/public'; // ajuste conforme o subdiretório do seu servidor
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Remove o base path para facilitar o roteamento
if (strpos($uri, $base) === 0) {
    $uri = substr($uri, strlen($base));
    if ($uri === '') $uri = '/';
}

switch (true) {
    case $uri === '/' && $method === 'GET':
        require __DIR__ . '/../views/home.php';
        break;
    case $uri === '/login' && $method === 'GET':
        require __DIR__ . '/../views/login.php';
        break;
    case $uri === '/login' && $method === 'POST':
        (new AuthController)->login();
        break;
    case $uri === '/logout' && $method === 'POST':
        (new AuthController)->logout();
        break;
    case $uri === '/users' && $method === 'GET':
        (new UserController)->index();
        break;
    case $uri === '/processos' && $method === 'GET':
        (new ProcessController)->index();
        break;
    // ...adicione mais rotas conforme necessário...
    default:
        require __DIR__ . '/../views/404.php';
}
