<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Gabinete Parlamentar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .dashboard-card { min-height: 140px; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="/beta/projectZero/public/">Gabinete Parlamentar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/beta/projectZero/public/processos">Processos</a></li>
        <li class="nav-item"><a class="nav-link" href="/beta/projectZero/public/users">Usuários</a></li>
        <li class="nav-item"><a class="nav-link" href="/beta/projectZero/public/login">Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card dashboard-card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Usuários Ativos</h5>
                    <p class="display-6 fw-bold">42</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card dashboard-card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Processos em Andamento</h5>
                    <p class="display-6 fw-bold">15</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card dashboard-card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Arquivos Anexados</h5>
                    <p class="display-6 fw-bold">87</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Processos por Status</div>
                <div class="card-body">
                    <canvas id="processosStatusChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Usuários por Perfil</div>
                <div class="card-body">
                    <canvas id="usuariosPerfilChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Bem-vindo ao Gestor de Gabinete Parlamentar</h1>
            <p class="col-md-8 fs-4">Gerencie processos, documentos, tramitações e usuários de forma simples e eficiente.</p>
            <a href="/beta/projectZero/public/processos" class="btn btn-primary btn-lg">Ver Processos</a>
        </div>
    </div>
</div>
<footer class="bg-light text-center py-3 mt-5 border-top">
    <span class="text-muted">&copy; 2025 Gabinete Parlamentar. Todos os direitos reservados.</span>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Gráfico de Processos por Status
const ctx1 = document.getElementById('processosStatusChart').getContext('2d');
new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels: ['Em Andamento', 'Concluído', 'Pendente'],
        datasets: [{
            data: [8, 5, 2],
            backgroundColor: ['#0d6efd', '#198754', '#ffc107'],
        }]
    },
    options: { plugins: { legend: { position: 'bottom' } } }
});
// Gráfico de Usuários por Perfil
const ctx2 = document.getElementById('usuariosPerfilChart').getContext('2d');
new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['Administrador', 'Servidor', 'Estagiário'],
        datasets: [{
            label: 'Usuários',
            data: [5, 30, 7],
            backgroundColor: ['#0d6efd', '#6c757d', '#ffc107'],
        }]
    },
    options: { plugins: { legend: { display: false } } }
});
</script>
</body>
</html>
