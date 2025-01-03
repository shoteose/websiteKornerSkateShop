<!-- INICIO DO CONTEUDO -->

<div class="container">

  <a href="javascript: history.go(-1)" class="m-2">Voltar</a>

  <div class="row p-4 gy-4">
    <div class="col-md-6 col-12">
      <div id="carouselDetalhesRoupa" class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <?php
          $caminhos = explode(',', $data['roupas'][0]['caminhos_fotos']);
          foreach ($caminhos as $index => $caminho) { ?>
            <button type="button" data-bs-target="#carouselDetalhesRoupa" data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>" aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $index + 1; ?>"></button>
          <?php } ?>
        </div>
        <div class="carousel-inner rounded-5 shadow-4-strong">
          <?php
          foreach ($caminhos as $index => $caminho) {
            $caminho = trim($caminho); //remove os espacos branscos
          ?>
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
              <img src="<?php echo $url_alias; ?>/assets/logos/roupas/<?php echo $caminho; ?>" class="d-block w-100" alt="Imagem <?php echo $index + 1; ?>">
            </div>
          <?php } ?>
        </div>
        <button class="carousel-control-prev carroselLateral" type="button" data-bs-target="#carouselDetalhesRoupa" data-bs-slide="prev">
          <p class="carousel-control-prev-icon" aria-hidden="true"></p>
          <p class="visually-hidden">Anterior</p>
        </button>
        <button class="carousel-control-next carroselLateral" type="button" data-bs-target="#carouselDetalhesRoupa" data-bs-slide="next">
          <p class="carousel-control-next-icon" aria-hidden="true"></p>
          <p class="visually-hidden">Proximo</p>
        </button>
      </div>

    </div>
    <div class="col-md-6 col-12">
      <div class="card-body d-flex flex-column">
        <div class="text-center">
          <h1><b> <?php echo $data['roupas'][0]['nome'] ?> </b></h1>
          <a class="text-decoration-none" href="<?php echo $url_alias; ?>/marcas/get/<?php echo $data['roupas'][0]['id_marca'] ?>">
            <h2 class="text-muted mb-4"><?php echo $data['roupas'][0]['marca'] ?></h2>
          </a>
        </div>
        <div>
          <div class="d-flex justify-content-between">
            <h3 class="mostradorGet">Categoria</h3><a class="text-decoration-none" href="<?php echo $url_alias; ?>/categoria/get/<?php echo $data['roupas'][0]['id_categoria'] ?>"><?php echo $data['roupas'][0]['categoria'] ?></a>
          </div>
          <div class="d-flex justify-content-between">
            <h3 class="mostradorGet">Genero</h3><a class="text-decoration-none" href="<?php echo $url_alias; ?>/genero/get/<?php echo $data['roupas'][0]['id_genero'] ?>"><?php echo $data['roupas'][0]['genero'] ?></a>
          </div>
          <div class="d-flex justify-content-between">
            <h3 class="mostradorGet">Cor</h3>
            <p><?php echo $data['roupas'][0]['cor'] ?></p>
          </div>
          <?php if ($data['roupas'][0]['taxa_desconto'] > 0) { ?>
            <div class="pt-4 pb-4">
              <div class="row">
                <div class="col-6">
                  <h1 class="pb-2">Preço</h1>
                </div>
                <div class="col-3">
                  <p class="preco-antigo">
                    <span> <?php echo number_format(($data['roupas'][0]['preco'] * (1 - ($data['roupas'][0]['taxa_iva'] / 100))), 2, ",", "") ?>€</span>
                  </p>
                </div>
                <div class="col-3">
                  <p class="preco-novo">
                    <span><?php echo number_format(($data['roupas'][0]['preco'] * (1 - ($data['roupas'][0]['taxa_iva'] / 100))) * (1 - ($data['roupas'][0]['taxa_desconto'] / 100)), 2, ",", "") ?>€</span>
                  </p>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <div class="row d-flex justify-content-between">
              <div class="col-6">
                <h1 class="pb-2">Preço</h1>
              </div>
              <div class="col-6">
                <p class="preco-novo">
                  <span><?php echo number_format(($data['roupas'][0]['preco'] * (1 - ($data['roupas'][0]['taxa_iva'] / 100))), 2, ",", "") ?>€</span>
                </p>
              </div>
            </div>
          <?php } ?>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col" class="mostradorGet">Tamanho</th>
                <th scope="col" class="mostradorGet">Stock</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data['roupas'] as $tamanho) {
                echo '<tr>';
                echo '<td>' . $tamanho['tamanho'] . '</td>';
                echo '<td>' . $tamanho['quantidade_total_stock'] . '</td>';
                echo '</tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Linha da Descrição -->
  <div class="row p-4">
    <div class="col-12">
      <div>
        <h4><b>Descrição:</b></h4>
        <p><?php echo $data['roupas'][0]['descricao']; ?></p>
      </div>
    </div>
  </div>
</div>



<!-- FIM DO CONTEUDO -->