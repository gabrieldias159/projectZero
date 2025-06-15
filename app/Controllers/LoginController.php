<?php
class LoginController {
    public function index() {
        require_once __DIR__ . '/../Views/login.php';
    }
    public function auth() {
        // Aqui você pode implementar a autenticação
        // Exemplo: validar usuário e senha
    }
}
