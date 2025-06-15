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
    <div id="notificacao" style="display:none;" class="alert"></div>
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalNovoUsuario"><i class="bi bi-person-plus"></i> Novo Usuário</button>
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
        <tbody></tbody>
    </table>
</div>
<!-- Modais (Novo, Editar, Ver, Excluir) -->
<div class="modal fade" id="modalNovoUsuario" tabindex="-1" aria-labelledby="modalNovoUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNovoUsuarioLabel">Novo Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form id="formNovoUsuario">
          <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" required>
          </div>
          <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Perfil</label>
            <select class="form-select" name="perfil">
              <option>Administrador</option>
              <option>Servidor</option>
              <option>Estagiário</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" name="status">
              <option>Ativo</option>
              <option>Pendente</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha" required>
          </div>
          <button type="submit" class="btn btn-success">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body" id="editarUsuarioBody"></div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalVerUsuario" tabindex="-1" aria-labelledby="modalVerUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalVerUsuarioLabel">Detalhes do Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body" id="verUsuarioBody"></div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalConfirmarExclusao" tabindex="-1" aria-labelledby="modalConfirmarExclusaoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalConfirmarExclusaoLabel">Confirmar Exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">Tem certeza que deseja excluir este usuário?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btnExcluirUsuario">Excluir</button>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__.'/partials/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<script>
let usuarioAtual = null;
function carregarUsuarios() {
    $.get('api/users', function(data) {
        let tbody = '';
        data.forEach(u => {
            tbody += `<tr>
                <td>${u.id}</td><td>${u.nome}</td><td>${u.email}</td><td>${u.perfil}</td><td><span class="badge badge-${u.status==='Ativo'?'success':'warning text-dark'}">${u.status}</span></td>
                <td>
                    <button class="btn btn-sm btn-info" onclick="verUsuario(${u.id})"><i class="bi bi-eye"></i></button>
                    <button class="btn btn-sm btn-warning" onclick="editarUsuario(${u.id})"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-danger" onclick="confirmarExclusao(${u.id})"><i class="bi bi-trash"></i></button>
                </td>
            </tr>`;
        });
        $('#tabelaUsuarios tbody').html(tbody);
        if (!$.fn.DataTable.isDataTable('#tabelaUsuarios')) {
            $('#tabelaUsuarios').DataTable({language:{url:'//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json'}});
        }
    });
}
$(document).ready(function() {
    carregarUsuarios();
});
$('#formNovoUsuario').on('submit', function(e) {
    e.preventDefault();
    let dados = {
        nome: this.nome.value,
        email: this.email.value,
        perfil: this.perfil.value,
        status: this.status.value,
        senha: this.senha.value
    };
    $.ajax({url:'api/users',type:'POST',data:JSON.stringify(dados),contentType:'application/json',success:function(){
        $('#modalNovoUsuario').modal('hide');
        mostrarNotificacao('Usuário cadastrado com sucesso!','success');
        carregarUsuarios();
    },error:function(xhr){
        mostrarNotificacao(JSON.parse(xhr.responseText).error,'danger');
    }});
});
function verUsuario(id) {
    $.get('api/users/'+id, function(u) {
        let html = `<b>Nome:</b> ${u.nome}<br><b>E-mail:</b> ${u.email}<br><b>Perfil:</b> ${u.perfil}<br><b>Status:</b> ${u.status}`;
        $('#verUsuarioBody').html(html);
        $('#modalVerUsuario').modal('show');
    });
}
function editarUsuario(id) {
    $.get('api/users/'+id, function(u) {
        usuarioAtual = u.id;
        let html = `<form id='formEditarUsuario'>
            <div class='mb-3'><label class='form-label'>Nome</label><input type='text' class='form-control' name='nome' value='${u.nome}' required></div>
            <div class='mb-3'><label class='form-label'>E-mail</label><input type='email' class='form-control' name='email' value='${u.email}' required></div>
            <div class='mb-3'><label class='form-label'>Perfil</label><select class='form-select' name='perfil'><option${u.perfil==='Administrador'?' selected':''}>Administrador</option><option${u.perfil==='Servidor'?' selected':''}>Servidor</option><option${u.perfil==='Estagiário'?' selected':''}>Estagiário</option></select></div>
            <div class='mb-3'><label class='form-label'>Status</label><select class='form-select' name='status'><option${u.status==='Ativo'?' selected':''}>Ativo</option><option${u.status==='Pendente'?' selected':''}>Pendente</option></select></div>
            <div class='mb-3'><label class='form-label'>Senha (deixe em branco para não alterar)</label><input type='password' class='form-control' name='senha'></div>
            <button type='submit' class='btn btn-success'>Salvar</button>
        </form>`;
        $('#editarUsuarioBody').html(html);
        $('#modalEditarUsuario').modal('show');
    });
}
$(document).on('submit', '#formEditarUsuario', function(e) {
    e.preventDefault();
    let dados = {
        nome: this.nome.value,
        email: this.email.value,
        perfil: this.perfil.value,
        status: this.status.value,
        senha: this.senha.value
    };
    $.ajax({url:'api/users/'+usuarioAtual,type:'PUT',data:JSON.stringify(dados),contentType:'application/json',success:function(){
        $('#modalEditarUsuario').modal('hide');
        mostrarNotificacao('Usuário editado com sucesso!','success');
        carregarUsuarios();
    },error:function(xhr){
        mostrarNotificacao(JSON.parse(xhr.responseText).error,'danger');
    }});
});
function confirmarExclusao(id) {
    $('#modalConfirmarExclusao').modal('show');
    $('#btnExcluirUsuario').off('click').on('click', function() {
        $.ajax({url:'api/users/'+id,type:'DELETE',success:function(){
            $('#modalConfirmarExclusao').modal('hide');
            mostrarNotificacao('Usuário excluído com sucesso!','success');
            carregarUsuarios();
        }});
    });
}
function mostrarNotificacao(msg, tipo) {
    let n = $('#notificacao');
    n.removeClass().addClass('alert alert-' + tipo).text(msg).fadeIn();
    setTimeout(()=>n.fadeOut(), 2500);
}
</script>
</body>
</html>
