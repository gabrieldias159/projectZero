<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Gabinete Parlamentar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
</head>
<body>
<?php include __DIR__.'/partials/header.php'; ?>
<div class="container mt-4">
    <h1 class="mb-4">Usuários</h1>
    <a href="#" class="btn btn-success mb-3"><i class="bi bi-person-plus"></i> Novo Usuário</a>
    <table class="table table-striped" id="tabelaUsuarios">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>1</td><td>Maria Silva</td><td>maria@exemplo.com</td><td>Administrador</td><td><span class="badge badge-success">Ativo</span></td><td><a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Ver</a></td></tr>
            <tr><td>2</td><td>João Souza</td><td>joao@exemplo.com</td><td>Servidor</td><td><span class="badge badge-success">Ativo</span></td><td><a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Ver</a></td></tr>
            <tr><td>3</td><td>Paula Lima</td><td>paula@exemplo.com</td><td>Estagiário</td><td><span class="badge badge-warning text-dark">Pendente</span></td><td><a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Ver</a></td></tr>
        </tbody>
    </table>
</div>
<?php include __DIR__.'/partials/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#tabelaUsuarios').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json'
        }
    });
});
</script>
</body>
</html>
