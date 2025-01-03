<!-- INICIO DO CONTEUDO -->

<div class="container">

    <div class="row">
        <div class="col-12">
            <h1 class="text-center mt-5">Editar Stock</h1>
        </div>
    </div>

    <div class="col-2">
        <a href="<?php echo $url_alias ?>/admin/stock/<?php echo $data['stockInd'][0]['id'] ?>" type="button" class="btn btn-outline-dark col-4 mt-4">Voltar</a>
    </div>

    <div class="row">
        <!-- Mensagem de erro -->
        <?php if (!empty($data['error'])) { ?>
            <div class="alert alert-danger text-center" role="alert">
                <?php echo $data['error']; ?>
            </div>
        <?php }; ?>
        <div class="col-12">
            <form action="<?php echo $url_alias; ?>/stock/editar/<?php echo $data['stockInd'][0]['id'] ?>" method="post">
                <div class="mb-3">
                    <label for="quantidade" class="form-label">Quantidade de Stock</label>
                    <input type="text" class="form-control" id="quantidade" name="quantidade" value="<?php echo $data['stockInd'][0]['quantidade'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Alterações</button>
            </form>
        </div>
    </div>

</div>

<!-- FIM DO CONTEUDO -->