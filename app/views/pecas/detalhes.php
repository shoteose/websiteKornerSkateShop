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
        <div class="row p-4">
            <div class="col">
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
            <div class="col">
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
                                            <?php echo number_format(($data['roupas'][0]['preco'] * (1 - ($data['roupas'][0]['taxa_iva'] / 100))), 2, ",", "") ?> €
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <p class="preco-novo">
                                            <?php echo number_format(($data['roupas'][0]['preco'] * (1 - ($data['roupas'][0]['taxa_iva'] / 100))) * (1 - ($data['roupas'][0]['taxa_desconto'] / 100)), 2, ",", "") ?> €
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
                                    <p class="preco-antigo">
                                        <?php echo number_format(($data['roupas'][0]['preco'] * (1 - ($data['roupas'][0]['taxa_iva'] / 100))), 2, ",", "") ?> €
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