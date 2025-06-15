<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Gabinete Parlamentar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="/beta/projectZero/public/">Gabinete Parlamentar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
<div class="container mb-5">
    <h1 class="mb-4">Usuários</h1>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Usuários por Perfil</div>
                <div class="card-body">
                    <canvas id="usuariosPerfilChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-sm">
        <div class="card-header bg-light">Lista de Usuários</div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
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
                    <tr><td>1</td><td>Maria Silva</td><td>maria@exemplo.com</td><td>Administrador</td><td><span class="badge bg-success">Ativo</span></td></tr>
                    <tr><td>2</td><td>João Souza</td><td>joao@exemplo.com</td><td>Servidor</td><td><span class="badge bg-success">Ativo</span></td></tr>
                    <tr><td>3</td><td>Paula Lima</td><td>paula@exemplo.com</td><td>Estagiário</td><td><span class="badge bg-warning text-dark">Pendente</span></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<footer class="bg-light text-center py-3 mt-5 border-top">
    <span class="text-muted">&copy; 2025 Gabinete Parlamentar. Todos os direitos reservados.</span>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const ctx = document.getElementById('usuariosPerfilChart').getContext('2d');
new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Administrador', 'Servidor', 'Estagiário'],
        datasets: [{
            data: [5, 30, 7],
            backgroundColor: ['#0d6efd', '#6c757d', '#ffc107'],
        }]
    },
    options: { plugins: { legend: { position: 'bottom' } } }
});
</script>
</body>
</html>
