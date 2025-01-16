<!-- INICIO DO CONTEUDO -->
<div class="container">

  <div class="d-flex flex-row mt-2 align-content-center">

    <div class="col-2">
      <a href="<?php echo $url_alias ?>/admin" type="button" class="btn btn-outline-dark col-4 mt-4">Voltar</a>
    </div>

    <div class="col-8">
      <h1 class="text-center m-4">Peças de Roupa</h1>
    </div>

    <div class="col-3">
      <a href="<?php echo $url_alias ?>/pecas/add" type="button" class="btn btn-outline-dark col-4 mt-4">Adicionar</a>
    </div>

  </div>

  <table class="table table-striped align-middle">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Cor</th>
        <th scope="col">Marca</th>
        <th scope="col">Categoria</th>
        <th scope="col">Género</th>
        <th scope="col">Preço</th>
        <th scope="col">Iva</th>
        <th scope="col">Desconto</th>
        <th scope="col">Tridimencional</th>
        <th scope="col">Textura</th>
        <th scope="col">Fotos</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>

      <?php
      foreach ($data['roupas'] as $peca) {

        echo '<tr>';
        echo '<th class="align-middle">' . $peca['id'] . '</th>';
        echo '<td class="align-middle">' . $peca['nome'] . '</td>';
        echo '<td class="align-middle">' . $peca['descricao'] . '</td>';
        echo '<td class="align-middle">' . $peca['cor'] . '</td>';
        echo '<td class="align-middle">' . $peca['marca'] . '</td>';
        echo '<td class="align-middle">' . $peca['categoria'] . '</td>';
        echo '<td class="align-middle">' . $peca['genero'] . '</td>';
        echo '<td class="align-middle">' . $peca['preco'] . '</td>';
        echo '<td class="align-middle">' . $peca['taxa_iva'] . '</td>';
        echo '<td class="align-middle">' . $peca['taxa_desconto'] . '</td>';

        if ($peca['tridimensional'] == 0) {
          echo '<td class="align-middle"> Não </td>';
        } else {
          echo '<td class="align-middle"> Sim </td>';
        }

        if (!empty($peca['imagemTextura']['data'])) {
          $dadosBinario = pack('C*', ...$peca['imagemTextura']['data']);
          // Converte a string binária para Base64
          $base64Imagem = base64_encode($dadosBinario);
          echo '<td class="align-middle"><img src="data:image/png;base64,' . $base64Imagem  . '" alt="Textura" style="max-width:75px;"></td>';
        } else {
          echo '<td class="align-middle">Sem textura</td>';
        }
        echo '<td class="align-middle"><a type="button" class="btn btn-primary btn-outline-light" href="' . $url_alias . '/pecas/fotos/' . $peca['id'] . '" >Editar fotos</a></td>';
        echo '<td class="align-middle"><a type="button" class="btn btn-primary btn-outline-light" href="' . $url_alias . '/pecas/editar/' . $peca['id'] . '" >Editar Peça</a></td>';
        echo '<td class="align-middle"><a class="btn btn-danger btn-outline-light"  data-bs-toggle="modal" data-bs-target="#modalEliminar" data-id="peca:' . $peca['id'] . '">Eliminar</a></td>';
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
        Tem certeza que deseja eliminar esta Peca?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" onclick="deleteItem()">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<!-- FIM DO CONTEUDO -->