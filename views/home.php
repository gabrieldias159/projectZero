<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Gabinete Parlamentar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>
<?php include __DIR__.'/partials/header.php'; ?>
<div class="container mt-4">
    <h1 class="mb-4">Bem-vindo ao Gestor de Gabinete Parlamentar</h1>
    <div class="mb-3">
        <a href="users" class="btn btn-primary mr-2"><i class="bi bi-people"></i> Gerenciar Usuários</a>
        <a href="processos" class="btn btn-success mr-2"><i class="bi bi-folder2-open"></i> Gerenciar Processos</a>
        <a href="#" class="btn btn-info"><i class="bi bi-bar-chart"></i> Dashboard</a>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Usuários Ativos</h5>
                    <p class="display-4">42</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Processos em Andamento</h5>
                    <p class="display-4">15</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Arquivos Anexados</h5>
                    <p class="display-4">87</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__.'/partials/footer.php'; ?>
</body>
</html>
