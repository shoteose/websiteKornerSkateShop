<!-- INICIO DO CONTEUDO -->
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="container" style="max-width: 600px;">

    <form action="<?php echo $url_alias; ?>/contas/index" method="POST" enctype="multipart/form-data">
      <h2 class="text-center mb-4">Login</h2>

      <!-- Mensagem de erro -->
      <?php if (!empty($data['error'])) { ?>
        <div class="alert alert-danger text-center" role="alert">
          <?php echo $data['error']; ?>
        </div>
      <?php }; ?>


      <!-- Email -->
      <div class="form-outline mb-4">
        <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" />
        <label class="form-label" for="email">Endereço Email</label>
      </div>

      <!-- Password -->
      <div class="form-outline mb-3">
        <input type="password" id="password" class="form-control form-control-lg" placeholder="Insira a password" name="password" />
        <label class="form-label" for="password">Password</label>
      </div>

      <!-- Botão de Login -->
      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg">Login</button>
      </div>

      <p class="text-center small fw-bold mt-4">
        Nao tens Conta? <a href="<?php echo $url_alias; ?>/contas/registo" class="link-danger">Cria</a>
      </p>
    </form>

  </div>
</div>

<!-- FIM DO CONTEUDO -->