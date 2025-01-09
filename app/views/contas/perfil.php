<!-- INICIO DO CONTEUDO -->
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="container" style="max-width: 600px;">
    <h2 class="text-center mb-3">Editar Perfil</h2>
    <form action="<?php echo $url_alias; ?>/contas/perfil" method="POST" enctype="multipart/form-data">

      <!-- Mensagem de erro -->
      <?php if (!empty($data['error'])) { ?>
        <div class="alert alert-danger text-center" role="alert">
          <?php echo $data['error']; ?>
        </div>
      <?php }; ?>

      <!-- Nome -->
      <div class="form-outline mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" id="nome" name="nome" class="form-control form-control-lg" placeholder="<?php echo $data['conta']['nome']; ?>" value="<?php echo $data['conta']['nome']; ?>" required>
      </div>

      <!-- Apelido -->
      <div class="form-outline mb-3">
        <label for="apelido" class="form-label">Apelido</label>
        <input type="text" id="apelido" name="apelido" class="form-control form-control-lg" placeholder="<?php echo $data['conta']['apelido']; ?>" value="<?php echo $data['conta']['apelido']; ?>" required>
      </div>


      <!-- Nova Pass -->
      <div class="form-outline mb-3">
        <label for="password" class="form-label">Nova Password</label>
        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Nova Password">
      </div>

      <!-- Botão de Salvar -->
      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
      </div>
    </form>
  </div>
</div>
<!-- FIM DO CONTEUDO -->