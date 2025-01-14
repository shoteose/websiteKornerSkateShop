<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $url_alias ?>/assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <title>Korner Skate Shop</title>

</head>

<body>

  <!-- INICIO DA NAVBAR -->
  <nav class="navbar navbar-expand-sm navbar-light bg-light rounded sticky-header header-clone icons-design-line color-scheme-dark act-scroll" aria-label="NavBar">
    <div class="container-fluid">
      <a href="<?php echo $url_alias; ?>/">
        <img class="navbar-brand img-fluid" src="<?php echo $url_alias; ?>/assets/logos/loja/logoLojasF.jpg" href="<?php echo $url_alias; ?>" style="width: 55px; height: auto;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown03" aria-expanded="false">Géneros</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <?php foreach ($data['generos'] as $genero) {
                echo '<li><a class="dropdown-item" href="' . $url_alias . '/genero/get/' . $genero['id'] . '">' . $genero['descricao'] . '</a></li>';
              } ?>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown04" aria-expanded="false">Categorias</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown04">
              <?php foreach ($data['categorias'] as $categoria) {
                echo '<li><a class="dropdown-item" href="' . $url_alias . '/categoria/get/' . $categoria['id'] . '">' . $categoria['descricao'] . '</a></li>';
              } ?>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown05" aria-expanded="false">Marcas</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown05">
              <?php foreach ($data['marcas'] as $marca) {
                echo '<li><a class="dropdown-item" href="' . $url_alias . '/marcas/get/' . $marca['id'] . '">' . $marca['nome'] . '</a></li>';
              } ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_alias; ?>/sales/">Descontos %</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_alias; ?>/loja/">Loja 3D</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_alias; ?>/media">Blog</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
          <?php if (!isset($_SESSION['user_id_acess'])) { ?>
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo $url_alias; ?>/contas">Conta
                <img src="<?php echo $url_alias; ?>/assets/logos/icons/login.svg" class="img-fluid">
              </a>
            </li>
          <?php } else if ($_SESSION['user_id_acess'] == 1) { ?>

            <li class="nav-item">
              <a class="nav-link" class="nav-link" href="<?php echo $url_alias; ?>/admin">Painel de Controlo
                <img src="<?php echo $url_alias; ?>/assets/logos/icons/admin.svg" class="img-fluid">
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo $url_alias; ?>/contas/perfil">Perfil
                <img src="<?php echo $url_alias; ?>/assets/logos/icons/account.svg" class="img-fluid">
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $url_alias; ?>/contas/logout" onclick="logout()">Sair da Conta
                <img src="<?php echo $url_alias; ?>/assets/logos/icons/logout.svg" class="img-fluid">
              </a>
            </li>

          <?php } else { ?>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo $url_alias; ?>/contas/perfil">Conta
                <img src="<?php echo $url_alias; ?>/assets/logos/icons/account.svg" class="img-fluid">
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $url_alias; ?>/contas/logout" onclick="logout()">Logout
                <img src="<?php echo $url_alias; ?>/assets/logos/icons/logout.svg" class="img-fluid">
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- FIM DA NAVBAR -->

  <div id="container" class="d-flex justify-content-center align-items-center">
    <div class="mt-3 mb-3">
      <canvas id="unity-canvas" width=960 height=600 tabindex="-1" style=" background: #231F20"></canvas>
    </div>
  </div>


  <!-- FOOTER -->
  <footer class="py-3">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-start text-center">

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
            <li class="nav-item mb-2"><a href="<?php echo $url_alias ?>/info/termoscondicoes" class="nav-link p-0 text-muted">Termos e Condições</a></li>
            <li class="nav-item mb-2"><a href="<?php echo $url_alias ?>/info/politica" class="nav-link p-0 text-muted">Política de Privacidade</a></li>
          </ul>
        </div>

        <div class="col-12 col-md-2 mb-3">
          <h5>REDES SOCIAIS</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="https://www.facebook.com/KornerSkateShop/" class="nav-link p-0 text-muted">Facebook</a></li>
            <li class="nav-item mb-2"><a href="https://www.instagram.com/kornerskateshop" class="nav-link p-0 text-muted">Instagram</a></li>
          </ul>
        </div>
      </div>
      <p class="text-center mt-4">© 2024 Korner Skate Shop, Todos Direitos Reservados.</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="<?php echo $url_alias ?>/assets/unity/Build/kornervirtualshop.loader.js"></script>

  <script>
    if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
      // Mobile device style: fill the whole browser client area with the game canvas:
      var meta = document.createElement('meta');
      meta.name = 'viewport';
      meta.content = 'width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, shrink-to-fit=yes';
      document.getElementsByTagName('head')[0].appendChild(meta);

      var canvas = document.querySelector("#unity-canvas");
      canvas.style.width = "100%";
      canvas.style.height = "100%";
      canvas.style.position = "fixed";

      document.body.style.textAlign = "left";
    }

    createUnityInstance(document.querySelector("#unity-canvas"), {
      arguments: [],
      dataUrl: "<?php echo $url_alias ?>/assets/unity/Build/kornervirtualshop.data",
      frameworkUrl: "<?php echo $url_alias ?>/assets/unity/Build/kornervirtualshop.framework.js",
      codeUrl: "<?php echo $url_alias ?>/assets/unity/Build/kornervirtualshop.wasm",
      streamingAssetsUrl: "StreamingAssets",
      companyName: "kornerskateshop",
      productName: "Korner Skate Shop Virtual Shop",
      productVersion: "1.0.0",
      // matchWebGLToCanvasSize: false, // Uncomment this to separately control WebGL canvas render size and DOM element size.
      devicePixelRatio: 1, // Uncomment this to override low DPI rendering on high DPI displays.
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="<?php echo $url_alias ?>/assets/js/script.js"></script>
</body>


</html>