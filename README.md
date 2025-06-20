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
3. Configure o banco de dados Firebird em `config/config.php`
4. Execute as migrations SQL fornecidas para Firebird
5. Acesse via navegador: http://localhost/public

## Configuração do Banco Firebird

- Host: localhost
- Caminho: /var/lib/firebird/2.5/data/gabinete.gdb
- Usuário: SYSDBA
- Senha: interpay

## Migrations (Exemplo SQL Firebird)

```sql
CREATE TABLE users (
  id INTEGER GENERATED BY DEFAULT AS IDENTITY PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(20) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE processes (
  id INTEGER GENERATED BY DEFAULT AS IDENTITY PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description BLOB SUB_TYPE TEXT,
  opened_at DATE NOT NULL,
  due_at DATE,
  status VARCHAR(20) DEFAULT 'aberto',
  created_by INTEGER,
  FOREIGN KEY (created_by) REFERENCES users(id)
);

CREATE TABLE comments (
  id INTEGER GENERATED BY DEFAULT AS IDENTITY PRIMARY KEY,
  process_id INTEGER,
  user_id INTEGER,
  comment BLOB SUB_TYPE TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (process_id) REFERENCES processes(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE attachments (
  id INTEGER GENERATED BY DEFAULT AS IDENTITY PRIMARY KEY,
  comment_id INTEGER,
  process_id INTEGER,
  file_path VARCHAR(255),
  uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (comment_id) REFERENCES comments(id),
  FOREIGN KEY (process_id) REFERENCES processes(id)
);

CREATE TABLE archives (
  id INTEGER GENERATED BY DEFAULT AS IDENTITY PRIMARY KEY,
  process_id INTEGER,
  type VARCHAR(30),
  document_title VARCHAR(255),
  file_path VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (process_id) REFERENCES processes(id)
);
```

## Exemplo de conexão PHP com Firebird

```php
$dbh = ibase_connect(
    'localhost:/var/lib/firebird/2.5/data/gabinete.gdb',
    'SYSDBA',
    'interpay'
);
if (!$dbh) {
    die('Erro ao conectar ao Firebird: ' . ibase_errmsg());
}
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
