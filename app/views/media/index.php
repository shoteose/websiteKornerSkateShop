<!-- INICIO DO CONTEUDO -->
<div class="container mt-5">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center" style="font-size: 50px;">Blog</h1>
    </div>
  </div>

  <div class="row mt-4 d-flex justify-content-center">
    <?php foreach ($data['medias'] as $media) {
      if (isset($media['url'])) {
    ?>
        <div class="col-12 mb-4 text-center border-bottom">
          <h3 class="fw-bold pb-3"><?php echo $media['titulo']; ?></h3>
          <p class="pb-2"><?php echo $media['descricao']; ?></p>
          <div class="d-flex justify-content-center"><?php echo $media['url']; ?></div>
        </div>
      <?php
      } else {
      ?>
        <div class="col-12 mb-4 border-bottom">
          <h3 class="fw-bold pb-3"><?php echo $media['titulo']; ?></h3>
          <p><?php echo $media['descricao']; ?></p>
        </div>
    <?php
      }
    } ?>
  </div>
</div>
<!-- FIM DO CONTEUDO -->