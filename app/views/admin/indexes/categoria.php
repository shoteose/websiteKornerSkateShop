<!-- INICIO DO CONTEUDO -->
<div class="container">

  <div class="d-flex flex-row mt-2 align-content-center">

    <div class="col-2">
      <a href="<?php echo $url_alias ?>/admin" type="button" class="btn btn-outline-dark col-4 mt-4">Voltar</a>
    </div>

    <div class="col-8">
      <h1 class="text-center m-4">Categorias</h1>
    </div>

    <div class="col-3">
      <a href="<?php echo $url_alias ?>/categoria/add" type="button" class="btn btn-outline-dark col-4 mt-4">Adicionar</a>
    </div>

  </div>

  <table class="table table-striped align-middle">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Categoria</th>
        <th scope="col">Editar Nome</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>

      <?php
      foreach ($data['categorias'] as $categoria) {

        echo '<tr>';
        echo '<th class="align-middle">' . $categoria['id'] . '</th>';
        echo '<td class="align-middle">' . $categoria['descricao'] . '</td>';
        echo '<td class="align-middle"><a type="button" class="btn btn-primary btn-outline-light" href="' . $url_alias . '/categoria/editar/' . $categoria['id'] . '" >Editar Categoria</a></td>';
        echo '<td class="align-middle"><a class="btn btn-danger btn-outline-light"  data-bs-toggle="modal" data-bs-target="#modalEliminar" data-id="categoria:' . $categoria['id'] . '">Eliminar</a></td>';
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>
</div>

<!-- Modal de Eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEliminarLabel">Confirmar Eliminação</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja eliminar esta Categoria?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" onclick="deleteItem()">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<!-- FIM DO CONTEUDO -->