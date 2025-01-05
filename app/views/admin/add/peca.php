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
    <div class="col-12 mb-4 mt-2">
      <form action="<?php echo $url_alias; ?>/pecas/add" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
        </div>
        <div class="row">
          <div class="mb-3 col-3">
            <label for="id_cor" class="form-label">Cor</label>
            <select class="form-select" id="id_cor" name="id_cor" required>
              <?php foreach ($data['cores'] as $cor) { ?>
                <option value="<?php echo $cor['id']; ?>"><?php echo $cor['descricao']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="mb-3 col-3">
            <label for="id_categoria" class="form-label">Categoria</label>
            <select class="form-select" id="id_categoria" name="id_categoria" required onchange="mostrarTemplateCategoria()">
              <?php foreach ($data['categorias'] as $categoria) { ?>
                <option value=" <?php echo $categoria['id']; ?>"><?php echo $categoria['descricao']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="mb-3 col-3">
            <label for="id_marca" class="form-label">Marca</label>
            <select class="form-select" id="id_marca" name="id_marca" required>
              <?php foreach ($data['marcas'] as $marca) { ?>
                <option value="<?php echo $marca['id']; ?>"><?php echo $marca['nome']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3 col-3">
            <label for="id_genero" class="form-label">Gênero</label>
            <select class="form-select" id="id_genero" name="id_genero" required>
              <?php foreach ($data['generos'] as $genero) { ?>
                <option value="<?php echo $genero['id']; ?>"><?php echo $genero['descricao']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-4">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
          </div>
          <div class="mb-3 col-4">
            <label for="taxa_iva" class="form-label">Taxa IVA 0-100</label>
            <input type="number" step="1" class="form-control" id="taxa_iva" name="taxa_iva" value="23" required>
          </div>
          <div class="mb-3 col-4">
            <label for="taxa_desconto" class="form-label">Taxa Desconto 0-100</label>
            <input type="number" step="1" class="form-control" id="taxa_desconto" name="taxa_desconto" value="0" required>
          </div>
        </div>
        <div>
          <label>Fotos</label>
          <input type="file" name="fotos[]" id="fotos" class="form-control" multiple required>
        </div>
        <div class="mb-3">
          <label for="tridimensional" class="form-label">Tridimensional</label>
          <select class="form-select" id="tridimensional" name="tridimensional" onchange="mostrarCampoTextura()" required>
            <option value="0">Não</option>
            <option value="1">Sim</option>
          </select>
        </div>
        <div class="mb-3" id="campoTextura" style="display: none;">
          <label for="imagemTextura" class="form-label">Imagem Textura</label>
          <div id="templateContainer" style="display: none;">
            <label>Textura Template</label>
            <div id="templateImage">
            </div>
          </div>

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

  function mostrarTemplateCategoria() {
    const categoriaSelect = document.getElementById('id_categoria');
    const templateContainer = document.getElementById('templateContainer');
    const templateImage = document.getElementById('templateImage');
    const categoria = categoriaSelect.options[categoriaSelect.selectedIndex].text; // Nome da categoria selecionada

    // Limpa o conteúdo atual
    templateImage.innerHTML = '';

    // Exibe o template correspondente à categoria
    switch (categoria) {
      case 'Tshirt':
        templateImage.innerHTML = `
        <img src="<?php echo $url_alias ; ?>/assets/logos/loja/template_tshirt.png" alt="Template Tshirt"  class="mb-2" style="max-width: 150px;">`;
        templateContainer.style.display = 'block';
        break;

      default:
        templateContainer.style.display = 'none';
        break;
    }
  }
</script>

<!-- FIM DO CONTEUDO -->