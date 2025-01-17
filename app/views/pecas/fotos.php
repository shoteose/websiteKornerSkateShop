<div class="container">
    <div class="col-2">
        <a href="<?php echo $url_alias ?>/admin/peca/" type="button" class="btn btn-outline-dark col-4 mt-4">Voltar</a>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <form action="<?php echo $url_alias; ?>/pecas/fotos/<?php echo $data['peca'][0]['id']; ?>" method="post" enctype="multipart/form-data" class="d-inline">

                <h3>Fotos Existentes</h3>
                <div>
                    <label>Adicionar Fotos</label>
                    <input type="file" name="fotos[]" id="fotos" class="form-control" multiple required>
                    <button type="submit" class="btn btn-success mt-2 mb-4">Adicionar</button>

                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $caminhos = explode(',', $data['peca'][0]['caminhos_fotos']);
                    $counter = 0;
                    foreach ($caminhos as $caminho) {
                        $caminho = trim($caminho);
                    ?>
                        <tr>
                            <td><img src="<?php echo $url_alias; ?>/assets/logos/roupas/<?php echo $caminho; ?>" alt="Foto" style="width: 100px;"></td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalEliminar" data-id="<?php echo $counter; ?>" class="btn btn-danger">Remover</button>
                            </td>
                        </tr>
                    <?php $counter++;
                    } ?>
                </tbody>

            </table>
        </div>
    </div>

    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarLabel">Confirmar Eliminação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja eliminar esta foto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" method="post" action="<?php echo $url_alias; ?>/pecas/fotos/<?php echo $data['peca'][0]['id']; ?>" class="d-inline">
                        <input type="hidden" name="caminho" id="idFoto" value="">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fotoIdInput = document.getElementById('idFoto'); 
        const botoesEliminar = document.querySelectorAll('.btn-danger[data-id]'); 

        botoesEliminar.forEach(button => {
            button.addEventListener('click', function() {
                const idFoto = this.getAttribute('data-id'); 
                fotoIdInput.value = idFoto; 
            });
        });
    });
</script>