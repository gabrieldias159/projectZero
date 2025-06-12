<?php
// Middleware de autenticação e autorização
function requireAuth() {
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo 'Não autenticado.';
        exit;
    }
}

function requireRole($role) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== $role) {
        http_response_code(403);
        echo 'Acesso negado.';
        exit;
    }
}
