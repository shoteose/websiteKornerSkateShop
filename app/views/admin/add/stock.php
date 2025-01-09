<!-- INICIO DO CONTEUDO -->

<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center mt-5">Adicionar Stock</h1>
    </div>
  </div>

  <div class="col-2">
    <a href="<?php echo $url_alias ?>/admin/stock" type="button" class="btn btn-outline-dark col-4 mt-4">Voltar</a>
  </div>

  <div class="row">
    <?php if (!empty($data['error'])) { ?>
      <div class="alert alert-danger text-center" role="alert">
        <?php echo $data['error']; ?>
      </div>
    <?php }; ?>
    <div class="col-12">
      <form action="<?php echo $url_alias; ?>/stock/add" method="post" id="stock-form">
        <div class="mb-3">
          <label for="id_peca" class="form-label">Peça</label>
          <select class="form-select" id="id_peca" name="id_peca" required>
            <?php foreach ($data['pecas'] as $peca) { ?>
              <option value="<?php echo $peca['id']; ?>"><?php echo $peca['nome']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div id="tamanho-quantidade-container">
          <div class="row mb-3">
            <div class="col-6">
              <label for="id_tamanho" class="form-label">Tamanho</label>
              <select class="form-select" name="tamanhos[0][id_tamanho]" required>
                <?php foreach ($data['tamanhos'] as $tamanho) { ?>
                  <option value="<?php echo $tamanho['id']; ?>"><?php echo $tamanho['descricao']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-6">
              <label for="quantidade" class="form-label">Quantidade</label>
              <input type="number" step="1" class="form-control" name="tamanhos[0][quantidade]" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-1"></div>
          <button type="button" class="btn btn-secondary mt-3 col-4" id="add-tamanho-btn">Adicionar Outro Tamanho</button>
          <div class="col-2"></div>
          <button type="submit" class="btn btn-primary mt-3 col-4">Adicionar Tudo</button>
          <div class="col-1"></div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.getElementById('add-tamanho-btn').addEventListener('click', function() {
    const container = document.getElementById('tamanho-quantidade-container');
    const index = container.querySelectorAll('.row').length;

    const newRow = `
      <div class="row mb-3">
        <div class="col-6">
          <label for="id_tamanho" class="form-label">Tamanho</label>
          <select class="form-select" name="tamanhos[${index}][id_tamanho]" required>
            <?php foreach ($data['tamanhos'] as $tamanho) { ?>
              <option value="<?php echo $tamanho['id']; ?>"><?php echo $tamanho['descricao']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-6">
          <label for="quantidade" class="form-label">Quantidade</label>
          <input type="number" step="1" class="form-control" name="tamanhos[${index}][quantidade]" required>
        </div>
      </div>
    `;
    container.insertAdjacentHTML('beforeend', newRow);
  });
</script>

<!-- FIM DO CONTEUDO -->