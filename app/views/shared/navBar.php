<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
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
                        <a class="nav-link" href="<?php echo $url_alias; ?>/sales/">Sales %</a>
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
                            <a class="nav-link" href="<?php echo $url_alias; ?>/contas">Login
                                <img src="<?php echo $url_alias; ?>/assets/logos/icons/login.svg" class="img-fluid">
                            </a>
                        </li>
                    <?php } else if ($_SESSION['user_id_acess'] == 1) { ?>

                        <li class="nav-item">
                            <a class="nav-link" class="nav-link" href="<?php echo $url_alias; ?>/admin">Dashboard
                                <img src="<?php echo $url_alias; ?>/assets/logos/icons/admin.svg" class="img-fluid">
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_alias; ?>/contas/perfil">Conta
                                <img src="<?php echo $url_alias; ?>/assets/logos/icons/account.svg" class="img-fluid">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_alias; ?>/contas/logout" onclick="logout()">logout
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