<!-- INICIO DO CONTEUDO -->

<div class="container">

  <div class="row">
    <div class="col-12">
      <h1 class="text-center mt-5">Adicionar Peça</h1>
    </div>
  </div>

  <div class="col-2">
    <a href="<?php echo $url_alias ?>/admin/peca" type="button" class="btn btn-outline-dark col-4 mt-4">Voltar</a>
  </div>

  <div class="row">
    <!-- Mensagem de erro -->
    <?php if (!empty($data['error'])) { ?>
      <div class="alert alert-danger text-center" role="alert">
        <?php echo $data['error']; ?>
      </div>
    <?php }; ?>
    <div class="col-12">
      <form action="<?php echo $url_alias; ?>/peca/add" method="post">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <label for="id_cor" class="form-label">Cor</label>
          <select class="form-select" id="id_cor" name="id_cor" required>
            <?php foreach ($data['cores'] as $cor) { ?>
              <option value="<?php echo $cor['id']; ?>"><?php echo $cor['descricao']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="id_marca" class="form-label">Marca</label>
          <select class="form-select" id="id_marca" name="id_marca" required>
            <?php foreach ($data['marcas'] as $marca) { ?>
              <option value="<?php echo $marca['id']; ?>"><?php echo $marca['nome']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="id_genero" class="form-label">Gênero</label>
          <select class="form-select" id="id_genero" name="id_genero" required>
            <?php foreach ($data['generos'] as $genero) { ?>
              <option value="<?php echo $genero['id']; ?>"><?php echo $genero['descricao']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="preco" class="form-label">Preço</label>
          <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
        </div>
        <div class="mb-3">
          <label for="taxa_iva" class="form-label">Taxa IVA 0-100</label>
          <input type="number" step="1" class="form-control" id="taxa_iva" name="taxa_iva" value="23" required>
        </div>
        <div class="mb-3">
          <label for="taxa_desconto" class="form-label">Taxa Desconto 0-100</label>
          <input type="number" step="1" class="form-control" id="taxa_desconto" name="taxa_desconto">
        </div>
        <input type="file" name="fotos[]" multiple required>
        <div class="mb-3">
          <label for="tridimensional" class="form-label">Tridimensional</label>
          <select class="form-select" id="tridimensional" name="tridimensional" onchange="mostrarCampoTextura()" required>
            <option value="0">Não</option>
            <option value="1">Sim</option>
          </select>
        </div>
        <div class="mb-3" id="campoTextura" style="display: none;">
          <label for="imagemTextura" class="form-label">Imagem Textura</label>
          <input type="file" class="form-control" id="imagemTextura" name="imagemTextura">
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
      </form>
    </div>
  </div>
</div>

<script>
  function mostrarCampoTextura() {
    const tridimensional = document.getElementById('tridimensional').value;
    const texturaField = document.getElementById('campoTextura');
    if (tridimensional === '1') {
      texturaField.style.display = 'block';
    } else {
      texturaField.style.display = 'none';
    }
  }
</script>

<!-- FIM DO CONTEUDO -->