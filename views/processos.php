<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processos - Gabinete Parlamentar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>
<?php include __DIR__.'/partials/header.php'; ?>
<div class="container mt-4">
    <h1 class="mb-4">Processos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Assunto</th>
                <th>Status</th>
                <th>Responsável</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>101</td><td>Requerimento de Informação</td><td><span class="badge badge-primary">Em Andamento</span></td><td>Maria Silva</td><td>10/06/2025</td></tr>
            <tr><td>102</td><td>Solicitação de Verba</td><td><span class="badge badge-success">Concluído</span></td><td>João Souza</td><td>08/06/2025</td></tr>
            <tr><td>103</td><td>Ofício Externo</td><td><span class="badge badge-warning text-dark">Pendente</span></td><td>Paula Lima</td><td>07/06/2025</td></tr>
        </tbody>
    </table>
</div>
<?php include __DIR__.'/partials/footer.php'; ?>
</body>
</html>
