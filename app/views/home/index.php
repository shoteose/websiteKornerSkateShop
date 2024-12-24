<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $url_alias ?>/assets/css/style.css">
  <title>GamesList</title>

</head>

<body id="index">
  <div class="row mt-3" id="botoes">
    <div class="d-flex flex-column">

      <?php if (!isset($_SESSION['user_id_acess'])) {

        echo '<a href="' . $url_alias . '/contas" class="btn btn-md btn-custom mb-2">Login</a>';
      } else {

        echo '<a href="' . $url_alias . '/contas/logout" onclick="logout()" class="btn btn-md btn-custom mb-2">Logout</a>';
      } ?>

    </div>
  </div>

<?php foreach ($data['roupas'] as $peca) {

echo '<div class="col roupa-item">';
echo '<div class="card bg-dark shadow-sm h-100">';

echo '<div style="height: 225px; display: flex; align-items: center; justify-content: center; overflow: hidden;">';
echo '</div>';

echo '<div class="card-body d-flex flex-column">';
echo '<h5 class="card-title peca-nome mb-3">' . $peca['nome'] . '</h5>';

echo '<div class="mt-auto d-flex justify-content-between align-items-center">';
echo '<a href="' . $url_alias . '/peca/get/' . $peca['id'] . '" class="btn btn-sm mt-auto btn-outline-secondary">Ver detalhes</a>';
echo '<a href="' . $url_alias . '/peca/update/' . $peca['id'] . '" class="btn btn-sm mt-auto btn-outline-info">Editar peca</a>';
echo '<a class="btn btn-sm mt-auto btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-id="' . $peca['id'] . '">Apagar peca</a>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '</div>';
} ?>

  </div>


  <!-- Scripts -->
  <script src="<?php echo $url_alias ?>/assets/js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>


</html>