<?php
class UserController {
    private $file;
    public function __construct() {
        $this->file = __DIR__ . '/../../storage/users.json';
        if (!file_exists($this->file)) file_put_contents($this->file, '[]');
    }
    public function list() {
        header('Content-Type: application/json');
        $users = json_decode(file_get_contents($this->file), true);
        foreach ($users as &$u) { unset($u['senha']); } // nunca retorna senha
        echo json_encode($users);
    }
    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);
        $users = json_decode(file_get_contents($this->file), true);
        // Validação
        if (empty($data['nome']) || empty($data['email']) || empty($data['perfil']) || empty($data['status']) || empty($data['senha'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Todos os campos são obrigatórios']);
            return;
        }
        foreach ($users as $u) {
            if ($u['email'] === $data['email']) {
                http_response_code(400);
                echo json_encode(['error' => 'E-mail já cadastrado']);
                return;
            }
        }
        $id = count($users) ? max(array_column($users, 'id')) + 1 : 1;
        $user = [
            'id' => $id,
            'nome' => $data['nome'],
            'email' => $data['email'],
            'perfil' => $data['perfil'],
            'status' => $data['status'],
            'senha' => password_hash($data['senha'], PASSWORD_DEFAULT)
        ];
        $users[] = $user;
        file_put_contents($this->file, json_encode($users));
        unset($user['senha']);
        header('Content-Type: application/json');
        echo json_encode($user);
    }
    public function update($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        $users = json_decode(file_get_contents($this->file), true);
        foreach ($users as &$user) {
            if ($user['id'] == $id) {
                $user['nome'] = $data['nome'];
                $user['email'] = $data['email'];
                $user['perfil'] = $data['perfil'];
                $user['status'] = $data['status'];
                if (!empty($data['senha'])) {
                    $user['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);
                }
            }
        }
        file_put_contents($this->file, json_encode($users));
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
    }
    public function delete($id) {
        $users = json_decode(file_get_contents($this->file), true);
        $users = array_filter($users, fn($u) => $u['id'] != $id);
        file_put_contents($this->file, json_encode(array_values($users)));
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
    }
    public function get($id) {
        $users = json_decode(file_get_contents($this->file), true);
        foreach ($users as $user) {
            if ($user['id'] == $id) {
                unset($user['senha']);
                header('Content-Type: application/json');
                echo json_encode($user);
                return;
            }
        }
        http_response_code(404);
        echo json_encode(['error' => 'Usuário não encontrado']);
    }
}
