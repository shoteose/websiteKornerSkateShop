<!-- INICIO DO CONTEUDO -->

<div class="container">

  <div class="row">
    <div class="col-12">
      <h1 class="text-center mt-5">Adicionar Media</h1>
    </div>
  </div>

  <div class="col-2">
    <a href="<?php echo $url_alias ?>/admin/media" type="button" class="btn btn-outline-dark col-4 mt-4">Voltar</a>
  </div>

  <div class="row">
    <!-- Mensagem de erro -->
    <?php if (!empty($data['error'])) { ?>
      <div class="alert alert-danger text-center" role="alert">
        <?php echo $data['error']; ?>
      </div>
    <?php }; ?>
    <div class="col-12">
      <form action="<?php echo $url_alias; ?>/media/add" method="post">
      <div class="mb-3">
          <label for="titulo" class="form-label">Titulo</label>
          <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <input type="text" class="form-control" id="descricao" name="descricao" required>
        </div>
        <div class="mb-3">
          <label for="url" class="form-label">Youtube/Instagram URL </label>
          <input type="text" class="form-control" id="url" name="url">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
      </form>
    </div>
  </div>

</div>

<!-- FIM DO CONTEUDO -->