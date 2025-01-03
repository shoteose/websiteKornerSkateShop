<!-- INICIO DO CONTEUDO -->

<div class="container">
  <div class="text-center m-2">
    <h1><?php echo $data['marcaa'][0]['nome'] ?></h1>
  </div>
  <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 g-3 pt-4">
    <?php foreach ($data['roupas'] as $peca) { ?>
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
                  <span>Genero</span><span><?php echo $peca['genero'] ?></span>
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

<!-- FIM DO CONTEUDO -->