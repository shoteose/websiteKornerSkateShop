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
                    <button type="submit" class="btn">Adicionar</button>

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
                        $caminho = trim($caminho) ?>

                        <tr>
                            <td><img src="<?php echo $url_alias; ?>/assets/logos/roupas/<?php echo $caminho; ?>" alt="Foto" style="width: 100px;"></td>
                            <td>
                                <form action="<?php echo $url_alias; ?>/pecas/fotos/<?php echo $data['peca'][0]['id']; ?>" method="post" class="d-inline">
                                    <input type="hidden" name="caminho" value="<?php echo $counter; $counter++; ?>">
                                    <button type="submit" class="btn btn-danger">Remover</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>