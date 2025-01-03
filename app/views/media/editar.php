<!-- INICIO DO CONTEUDO -->

<div class="container">

    <div class="row">
        <div class="col-12">
            <h1 class="text-center mt-5">Editar Media</h1>
        </div>
    </div>

    <div class="col-2">
        <a href="<?php echo $url_alias ?>/admin/media/<?php echo $data['mediaInd'][0]['id'] ?>" type="button" class="btn btn-outline-dark col-4 mt-4">Voltar</a>
    </div>

    <div class="row">
        <!-- Mensagem de erro -->
        <?php if (!empty($data['error'])) { ?>
            <div class="alert alert-danger text-center" role="alert">
                <?php echo $data['error']; ?>
            </div>
        <?php }; ?>
        <div class="col-12">
            <form action="<?php echo $url_alias; ?>/media/editar/<?php echo $data['mediaInd'][0]['id'] ?>" method="post">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $data['mediaInd'][0]['titulo'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?php echo $data['mediaInd'][0]['descricao'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">Descricão</label>
                    <input type="text" class="form-control" id="url" name="url" value="<?php echo $data['mediaInd'][0]['url'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Alterações</button>
            </form>
        </div>
    </div>

</div>

<!-- FIM DO CONTEUDO -->