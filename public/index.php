<?php
// Ponto de entrada da aplicação
require_once __DIR__ . '/../src/app.php';

// Ponto de entrada: roteamento básico
session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../controllers/ProcessController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Exemplo de roteamento simples
switch (true) {
    case $uri === '/login' && $method === 'POST':
        (new AuthController)->login();
        break;
    case $uri === '/logout' && $method === 'POST':
        (new AuthController)->logout();
        break;
    case $uri === '/users' && $method === 'GET':
        (new UserController)->index();
        break;
    // ...outras rotas RESTful...
    default:
        http_response_code(404);
        echo 'Rota não encontrada.';
}
