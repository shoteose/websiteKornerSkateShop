<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $url_alias ?>/assets/css/style.css">
    <title>Korner Skate Shop</title>

</head>

<body>

  <!-- INICIO DA NAVBAR -->
  <nav class="navbar navbar-expand-sm navbar-light bg-light rounded sticky-header header-clone icons-design-line color-scheme-dark act-scroll " aria-label="NavBar">
    <div class="container-fluid">
      <a href="<?php echo $url_alias; ?>/">
        <img class="navbar-brand img-fluid" src="<?php echo $url_alias; ?>/assets/logos/loja/logoLoja.jpg" href="<?php echo $url_alias; ?>" style="width: 55px; height: auto;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Generos</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <?php foreach ($data['generos'] as $genero) {
                echo '<li><a class="dropdown-item" href="' . $url_alias . '/categoria/get/' . $genero['id'] . '">' . $genero['descricao'] . '</a></li>';
              } ?>

            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <?php foreach ($data['categorias'] as $categoria) {
                echo '<li><a class="dropdown-item" href="' . $url_alias . '/categoria/get/' . $categoria['id'] . '">' . $categoria['descricao'] . '</a></li>';
              } ?>

            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Marcas</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <?php foreach ($data['marcas'] as $marca) {
                echo '<li><a class="dropdown-item" href="' . $url_alias . '/marcas/get/' . $marca['id'] . '">' . $marca['nome'] . '</a></li>';
              } ?>

            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_alias; ?>/sales/">Sales %</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Loja 3D</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <?php if (!isset($_SESSION['user_id_acess'])) { ?>
              <a href="<?php echo $url_alias; ?>/contas">
                <img src="<?php echo $url_alias; ?>/assets/logos/icons/login.svg" class="img-fluid">
              </a>
            <?php } else { ?>
              <a href="<?php echo $url_alias; ?>/contas/logout" onclick="logout()">
                <img src="<?php echo $url_alias; ?>/assets/logos/icons/account.svg" class="img-fluid">
                <img src="<?php echo $url_alias; ?>/assets/logos/icons/logout.svg" class="img-fluid">
              </a>
            <?php } ?>
          </li>


        </ul>
      </div>
    </div>
  </nav>

  <!-- FIM DA NAVBAR -->
    <!-- INICIO DO CONTEUDO -->

    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 pt-4">
            <?php foreach ($data['roupas'] as $peca) { ?>
                <div class="col">
                    <a href="<?php echo $url_alias ?>/pecas/detalhes/<?php echo $peca['id']?>" class="text-decoration-none text-reset">
                        <div class="card text-black h-100">
                            <img src="<?php echo $url_alias ?>/assets/logos/roupas/<?php echo $peca['nome'] ?>_0.png"
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
                                            <span>Preco</span><span><?php echo number_format(($peca['preco'] * (1 - $peca['taxa_iva'])), 2, ",", "") ?> €</span>
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
  <!-- FOOTER -->

  <footer class="py-5">
    <div>
      <div class="row d-flex justify-content-center align-items-center text-center">
        <div class="col-4 col-md-2 mb-3">
          <h5>SOBRE NÓS</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Korner Skate Shop</a></li>
            <li class="nav-item mb-2"><a href="https://www.livroreclamacoes.pt/Pedido/Reclamacao" class="nav-link p-0 text-muted">Livro de Reclamações</a></li>
            <li class="nav-item mb-2"><a href="https://www.livroreclamacoes.pt/Pedido/ElogioSugestao" class="nav-link p-0 text-muted">Livro de Elogios</a></li>
          </ul>
        </div>

        <div class="col-4 col-md-2 mb-3">
          <h5>INFORMAÇÃO</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Termos e Condições</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Política de Privacidade</a></li>
          </ul>
        </div>

        <div class="col-64 col-md-2 mb-3">
          <h5>REDES SOCIAIS</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="https://www.facebook.com/KornerSkateShop/" class="nav-link p-0 text-muted">Facebook</a></li>
            <li class="nav-item mb-2"><a href="https://www.instagram.com/kornerskateshop" class="nav-link p-0 text-muted">Instagram</a></li>
          </ul>
        </div>
      </div>
      <p>© 2024 Korner Skate Shop, Todos Direitos Reservados.</p>
    </div>
  </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>


</html>