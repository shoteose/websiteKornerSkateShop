<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo $url_alias; ?>/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

  <!-- INICIO DA NAVBAR -->
  <nav class="navbar navbar-expand-sm navbar-light bg-light rounded sticky-header header-clone icons-design-line color-scheme-dark act-scroll " aria-label="NavBar">
    <div class="container-fluid">
      <a href="<?php echo $url_alias; ?>/">
      <img class="navbar-brand img-fluid" src="<?php echo $url_alias; ?>/assets/logos/loja/logoLoja.jpg" href="<?php echo $url_alias;?>" style="width: 75px; height: auto;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Homem</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Mulher</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <?php foreach ($data['categorias'] as $categoria) {
                echo '<li><a class="dropdown-item" href="' . $url_alias . '/categoria/get/' . $categoria['id'] . '">' . $categoria['descricao'] . '</a></li>';
              } ?>

            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sales %</a>
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

        <form action="<?php echo $url_alias; ?>/contas/index" method="POST" enctype="multipart/form-data">
            <h2 class="text-center mb-4">Login</h2>

            <!-- Mensagem de erro -->
            <?php  if (!empty($data['error'])){ ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo $data['error']; ?>
                </div>
            <?php }; ?>


            <!-- Email -->
            <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" />
                <label class="form-label" for="email">Endereço Email</label>
            </div>

            <!-- Password -->
            <div class="form-outline mb-3">
                <input type="password" id="password" class="form-control form-control-lg" placeholder="Insira a password" name="password" />
                <label class="form-label" for="password">Password</label>
            </div>

            <!-- Botão de Login -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </div>

            <p class="text-center small fw-bold mt-4">
                Don't have an account? <a href="#!" class="link-danger">Register</a>
            </p>
        </form>

    </div>


    <!-- FIM DO CONTEUDO -->
    <!-- FOOTER -->

    <footer class="py-5">
        <div>
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-6 col-md-2 mb-3">
                    <h5>SOBRE NÓS</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Korner Skate Shop</a></li>
                        <li class="nav-item mb-2"><a href="https://www.livroreclamacoes.pt/Pedido/Reclamacao" class="nav-link p-0 text-muted">Livro de Reclamações</a></li>
                        <li class="nav-item mb-2"><a href="https://www.livroreclamacoes.pt/Pedido/ElogioSugestao" class="nav-link p-0 text-muted">Livro de Elogios</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>INFORMAÇÃO</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Termos e Condições</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Política de Privacidade</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
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


</body>

</html>