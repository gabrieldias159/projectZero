<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processos - Gabinete Parlamentar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .fade-in { animation: fadeIn 0.7s; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
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
<div class="container mb-5 fade-in">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Lista de Processos</h1>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNovoProcesso"><i class="bi bi-plus-circle"></i> Novo Processo</button>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Processos por Status</div>
                <div class="card-body">
                    <canvas id="processosStatusChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar processo..." id="buscaProcesso">
                <button class="btn btn-outline-primary" type="button" id="btnBuscar"><i class="bi bi-search"></i></button>
                <button class="btn btn-outline-secondary" type="button" id="btnExportar"><i class="bi bi-download"></i> Exportar</button>
            </div>
        </div>
    </div>
                    <tr><td>102</td><td>Solicitação de Verba</td><td><span class="badge bg-success">Concluído</span></td><td>João Souza</td><td>08/06/2025</td></tr>
                    <tr><td>103</td><td>Ofício Externo</td><td><span class="badge bg-warning text-dark">Pendente</span></td><td>Paula Lima</td><td>07/06/2025</td></tr>
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
const ctx = document.getElementById('processosStatusChart').getContext('2d');
new Chart(ctx, {
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
</script>
</body>
</html>
