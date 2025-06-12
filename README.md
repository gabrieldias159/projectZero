# Gestor de Gabinete Parlamentar

## Descrição
Sistema para gestão de processos, documentos e tramitação interna de um gabinete parlamentar, com autenticação e perfis de acesso.

## Estrutura de Diretórios

- `public/` — Ponto de entrada (index.php), arquivos públicos
- `controllers/` — Lógica de controle (UserController, ProcessController, etc.)
- `models/` — Modelos de dados (User, Process, Comment, etc.)
- `views/` — Templates e páginas HTML/PHP
- `config/` — Configurações gerais
- `storage/` — Arquivos enviados e anexos
- `storage/uploads/` — Uploads de processos e comentários

## Instalação

1. Clone o repositório
2. Instale as dependências com Composer (se houver)
3. Configure o banco de dados em `config/config.php`
4. Execute as migrations SQL fornecidas
5. Acesse via navegador: http://localhost/public

## Migrations (Exemplo SQL)

```sql
-- Usuários
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('vereador','chefe','assessor') NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Processos
CREATE TABLE processes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  opened_at DATE NOT NULL,
  due_at DATE,
  status ENUM('aberto','em_tramitacao','concluido') DEFAULT 'aberto',
  created_by INT,
  FOREIGN KEY (created_by) REFERENCES users(id)
);

-- Comentários
CREATE TABLE comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  process_id INT,
  user_id INT,
  comment TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (process_id) REFERENCES processes(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Anexos
CREATE TABLE attachments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  comment_id INT,
  process_id INT,
  file_path VARCHAR(255),
  uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (comment_id) REFERENCES comments(id),
  FOREIGN KEY (process_id) REFERENCES processes(id)
);

-- Arquivo/Acervo
CREATE TABLE archives (
  id INT AUTO_INCREMENT PRIMARY KEY,
  process_id INT,
  type ENUM('enviado','recebido','aguardando_resposta'),
  document_title VARCHAR(255),
  file_path VARCHAR(255),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (process_id) REFERENCES processes(id)
);
```

## Rotas RESTful (Exemplo)

- `POST /login` — Login de usuário
- `POST /logout` — Logout
- `GET /users` — Listar usuários
- `POST /users` — Criar usuário
- `GET /users/{id}` — Detalhar usuário
- `PUT /users/{id}` — Atualizar usuário
- `DELETE /users/{id}` — Remover usuário
- `GET /processes` — Listar processos
- `POST /processes` — Criar processo
- `GET /processes/{id}` — Detalhar processo
- `PUT /processes/{id}` — Atualizar processo
- `DELETE /processes/{id}` — Remover processo
- `POST /processes/{id}/comments` — Adicionar comentário
- `POST /processes/{id}/attachments` — Anexar arquivo

## Autenticação e Autorização
- Login com email/senha
- Middleware para proteger rotas e checar permissões por perfil

## Observações
- Estrutura pronta para expansão com frameworks leves (Slim, Lumen) se desejado.
- Código inicial em PHP puro para fácil validação.
