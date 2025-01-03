<!-- INICIO DO CONTEUDO -->
<?php $peca = $data['peca'][0] ?>

<div class="container">

  <div class="row">
    <div class="col-12">
      <h1 class="text-center mt-5">Editar Peça</h1>
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
      <form action="<?php echo $url_alias . "/pecas/editar/" . $peca['id']; ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $peca['nome'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?php echo $peca['descricao'] ?></textarea>
        </div>
        <div class="row">

          <div class="mb-3 col-3">
            <label for="id_cor" class="form-label">Cor</label>
            <select class="form-select" id="id_cor" name="id_cor" required>
              <?php foreach ($data['cores'] as $cor) { ?>
                <?php if ($cor['id'] == $peca['id_cor']) {
                  echo '<option value="' . $cor['id'] . '" selected >' . $cor['descricao'] . ' </option>';
                } else { ?>
                  <option value="<?php echo $cor['id']; ?>"><?php echo $cor['descricao']; ?></option>
              <?php }
              } ?>
            </select>
          </div>

          <div class="mb-3 col-3">
            <label for="id_categoria" class="form-label">Categoria</label>
            <select class="form-select" id="id_categoria" name="id_categoria" required>
              <?php foreach ($data['categorias'] as $categoria) { ?>
                <?php if ($categoria['id'] == $peca['id_categoria']) {
                  echo '<option value="' . $categoria['id'] . '" selected >' . $categoria['descricao'] . ' </option>';
                } else { ?>
                  <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['descricao']; ?></option>
              <?php }
              } ?>
            </select>
          </div>

          <div class="mb-3 col-3">
            <label for="id_marca" class="form-label">Marca</label>
            <select class="form-select" id="id_marca" name="id_marca" required>
              <?php foreach ($data['marcas'] as $marca) { ?>
                <?php if ($marca['id'] == $peca['id_marca']) {
                  echo '<option value="' . $marca['id'] . '" selected  >' . $marca['nome'] . ' </option>';
                } else { ?>
                  <option value="<?php echo $marca['id']; ?>"><?php echo $marca['nome']; ?></option>
              <?php }
              } ?>
            </select>
          </div>
          <div class="mb-3 col-3">
            <label for="id_genero" class="form-label">Gênero</label>
            <select class="form-select" id="id_genero" name="id_genero" required>
              <?php foreach ($data['generos'] as $genero) { ?>
                <?php if ($genero['id'] == $peca['id_genero']) {
                  echo '<option value="' . $genero['id'] . '" selected >' . $genero['descricao'] . ' </option>';
                } else { ?>
                  <option value="<?php echo $genero['id']; ?>"><?php echo $genero['descricao']; ?></option>
              <?php }
              } ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-4">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?php echo $peca['preco'] ?>" required>
          </div>
          <div class="mb-3 col-4">
            <label for="taxa_iva" class="form-label">Taxa IVA 0-100</label>
            <input type="number" step="1" class="form-control" id="taxa_iva" name="taxa_iva" value="23" value="<?php echo $peca['taxa_iva'] ?>" required>
          </div>
          <div class="mb-3 col-4">
            <label for="taxa_desconto" class="form-label">Taxa Desconto 0-100</label>
            <input type="number" step="1" class="form-control" id="taxa_desconto" name="taxa_desconto" value="<?php echo $peca['taxa_desconto'] ?>">
          </div>
        </div>
        <div class="mb-3">
          <label for="tridimensional" class="form-label">Tridimensional</label>
          <select class="form-select" id="tridimensional" name="tridimensional" onchange="mostrarCampoTextura()" required>

            <?php if ($peca['tridimensional']  == 0) {

              echo '<option value="0" selected >Não</option>';
              echo '<option value="1">Sim</option>';
            } else {
              echo '<option value="0"  >Não</option>';
              echo '<option value="1" selected >Sim</option>';
            }
            ?>
          </select>
        </div>

        <?php if ($peca['tridimensional']  == 1 && $peca['imagemTextura'] != null) {

          $binaryData = pack('C*', ...$peca['imagemTextura']['data']);
          $base64Image = base64_encode($binaryData);
          echo '<div><label>Textura Atual</label></div><div><img src="data:image/png;base64,' . $base64Image . '" alt="Textura" style="max-width:75px;"></div>';
        }
        ?>

        <div class="mb-3" id="campoTextura">
          <label for="imagemTextura" class="form-label"> Escolha uma nova para mudar a Textura</label>
          <input type="file" class="form-control" id="imagemTextura" name="imagemTextura">
        </div>

        <button type="submit" class="btn btn-primary">Guardar alterações</button>
    </div>

    </form>
  </div>
</div>
</div>


</div>

<script>
  const tridimensional = document.getElementById('tridimensional').value;
  const texturaField = document.getElementById('campoTextura');
  if (tridimensional === '1') {
    texturaField.style.display = 'block';
  } else {
    texturaField.style.display = 'none';
  }

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