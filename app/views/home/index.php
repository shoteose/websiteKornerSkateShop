<div style="background: #a51319; color: white; text-align: center; padding: 6px; text-transform: uppercase; font-weight: bold; font-size: 14px;">
  <svg class="svg-inline--fa fa-exclamation-circle fa-w-16" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="width: 20px; height: 20px; vertical-align: middle; margin-right: 6px;">
    <path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path>
  </svg>
  <a href="<?php echo $url_alias; ?>/loja" style="color: white; text-decoration: none;">Visite a Loja 3D!! Melhor Imersão!!</a>
</div>


<!-- INICIO DO CONTEUDO -->

<div class="container mt-4">

  <div class="row mb-4 p-4">
    <div class="col-md-9 position-relative">
      <a href="<?php echo $url_alias ?>/categoria/get/10" class="d-block">
        <img src="assets/logos/loja/sapatos2.png" class="img-fluid" alt="Categoria Sapatos">
        <span class="position-absolute top-50 start-50 translate-middle text-center text-white bg-dark bg-opacity-50 p-2 rounded">
          <span style="font-size: 0.7rem;">Ver</span><br>
          <strong>Sapatos</strong>
        </span>
      </a>
    </div>

    <div class="col-md-3">
      <div class="row">

        <div class="col-12 mb-3 position-relative">
          <a href="<?php echo $url_alias ?>/categoria/get/1" class="d-block">
            <img src="assets/logos/loja/tshirt.png" class="img-fluid mx-auto d-block" alt="Categoria Tshirt">
            <span class="position-absolute top-50 start-50 translate-middle text-center text-white bg-dark bg-opacity-50 p-2 rounded">
              <span style="font-size: 0.7rem;">Ver</span><br>
              <strong>Tshirts</strong>
            </span>
          </a>
        </div>

        <div class="col-12 position-relative">
          <a href="<?php echo $url_alias ?>/categoria/get/11" class="d-block">
            <img src="assets/logos/loja/calcas.png" class="img-fluid mx-auto d-block" alt="Categoria Calças">
            <span class="position-absolute top-50 start-50 translate-middle text-center text-white bg-dark bg-opacity-50 p-2 rounded">
              <span style="font-size: 0.7rem;">Ver</span><br>
              <strong>Calças</strong>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="row text-center justify-content-center position-relative" style="height:75px;">
    <a href="<?php echo $url_alias ?>/sales" class="w-100 h-100">
      <img src="assets/logos/loja/sales.jpg" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Descontos">
      <span class="position-absolute top-50 start-50 translate-middle text-center text-white bg-dark bg-opacity-50 p-2 rounded">
        <strong>Veja os nossos descontos</strong>
      </span>
    </a>
  </div>


  <div id="carouselDescontos" class="carousel slide carousel-dark" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
      $roupasPorSlide = 4; // Número de roupas por slide
      $totalRoupas = count($data['roupas']);
      $totalSlides = ceil($totalRoupas / $roupasPorSlide);

      for ($i = 0; $i < $totalSlides; $i++) { ?>
        <div class="carousel-item <?php echo $i === 0 ? 'active' : '' ?>">
          <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 g-3 pt-4">
            <?php
            $startIndex = $i * $roupasPorSlide;
            $endIndex = min($startIndex + $roupasPorSlide, $totalRoupas);

            for ($j = $startIndex; $j < $endIndex; $j++) {
              $peca = $data['roupas'][$j]; ?>
              <div class="col">
                <a href="<?php echo $url_alias ?>/pecas/detalhes/<?php echo $peca['id'] ?>" class="text-decoration-none text-reset">
                  <div class="card text-black h-100">
                    <img src="<?php echo $url_alias ?>/assets/logos/roupas/<?php echo $peca['nome_arquivo'] ?>"
                      class="card-img-top" alt="Peca <?php echo $peca['nome'] ?>" />
                    <div class="card-body d-flex flex-column">
                      <div class="text-center">
                        <h5 class="card-title"><?php echo $peca['nome'] ?></h5>
                        <p class="text-muted mb-4"><?php echo $peca['marca'] ?></p>
                      </div>
                      <div>
                        <div class="d-flex justify-content-between">
                          <span>Marca</span><span><?php echo $peca['marca'] ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                          <span>Categoria</span><span><?php echo $peca['categoria'] ?></span>
                        </div>
                        <?php if ($peca['taxa_desconto'] > 0) { ?>
                          <div class="d-flex justify-content-between">
                            <span>Preco Original</span>
                            <span><?php echo number_format(($peca['preco'] * (1 - ($peca['taxa_iva'] / 100))), 2, ",", "") ?> €</span>
                          </div>
                          <div class="d-flex justify-content-between">
                            <span>Preco com o desconto</span>
                            <span><?php echo number_format(($peca['preco'] * (1 - ($peca['taxa_iva'] / 100))) * (1 - ($peca['taxa_desconto'] / 100)), 2, ",", "") ?> €</span>
                          </div>
                        <?php } else { ?>
                          <div class="d-flex justify-content-between">
                            <span>Preço</span><span><?php echo number_format(($peca['preco'] * (1 - ($peca['taxa_iva'] / 100))), 2, ",", "") ?> €</span>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>



      <!-- Controles do carrossel -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselDescontos" data-bs-slide="prev" style="background-color:(0, 0, 0, 0.9);">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselDescontos" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
      </button>
    </div>
  </div>


  <!-- FIM DO CONTEUDO -->

</div>