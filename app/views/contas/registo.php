<!-- INICIO DO CONTEUDO -->

<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="container" style="max-width: 600px;">

    <form action="<?php echo $url_alias; ?>/contas/registo" method="POST" enctype="multipart/form-data">
      <h2 class="text-center mb-4">Registo</h2>

      <!-- Mensagem de erro -->
      <?php if (!empty($data['error'])) { ?>
        <div class="alert alert-danger text-center" role="alert">
          <?php echo $data['error']; ?>
        </div>
      <?php }; ?>

      <!-- Nome -->
      <div class="form-outline mb-4">
        <input type="text" id="nome" name="nome" class="form-control form-control-lg" placeholder="Primeiro Nome" required />
        <label class="form-label" for="email">Primeiro Nome</label>
      </div>

      <!-- Apelido -->
      <div class="form-outline mb-4">
        <input type="text" id="apelido" name="apelido" class="form-control form-control-lg" placeholder="Ultimo Nome" required />
        <label class="form-label" for="email">Ultimo Nome</label>
      </div>

      <!-- Email -->
      <div class="form-outline mb-4">
        <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" required />
        <label class="form-label" for="email">Endereço Email</label>
      </div>

      <!-- Password -->
      <div class="form-outline mb-3">
        <input type="password" id="password" class="form-control form-control-lg" placeholder="Insira a password" name="password" required />
        <label class="form-label" for="password">Password</label>
      </div>

      <!-- Botão de Criar Conta -->
      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg">Criar Conta</button>
      </div>

    </form>

  </div>
</div>


<!-- FIM DO CONTEUDO -->