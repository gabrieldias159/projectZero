<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Gabinete Parlamentar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>
<?php include __DIR__.'/partials/header.php'; ?>
<div class="container mt-4">
    <h1 class="mb-4">Usuários</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>1</td><td>Maria Silva</td><td>maria@exemplo.com</td><td>Administrador</td><td><span class="badge badge-success">Ativo</span></td></tr>
            <tr><td>2</td><td>João Souza</td><td>joao@exemplo.com</td><td>Servidor</td><td><span class="badge badge-success">Ativo</span></td></tr>
            <tr><td>3</td><td>Paula Lima</td><td>paula@exemplo.com</td><td>Estagiário</td><td><span class="badge badge-warning text-dark">Pendente</span></td></tr>
        </tbody>
    </table>
</div>
<?php include __DIR__.'/partials/footer.php'; ?>
</body>
</html>
