<?php

use app\core\Controller;

class Contas extends Controller
{
  /**
   * Invocação da view index.php
   */
  public function index()
  {
    $contas = $this->model('Contas');
    $categorias = $this->model('Categoria');
    $marcas = $this->model('Marca');
    $marca = $marcas->getMarcas();
    $categoria = $categorias->getCategorias();
    $generos = $this->model('Genero');
    $genero = $generos->getGeneros();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $user = [
        'email' => $_POST['email'],
        'pass' => $_POST['password']
      ];

      $email = $_POST['email'];
      $pass = $_POST['password'];

      $conta = $contas->login($user);


      if ($conta && empty($conta['error']) && password_verify($pass, $conta['pass'])) {
        // Login feito
        $_SESSION['login'] = true;
        $_SESSION['user_id_acess'] = $conta['id_tipoUser'];
        $_SESSION['user_ID'] = $conta['id'];

        echo 'Login feito' . $_SESSION['user_id_acess'];

        header("Location: /websiteKornerSkateShop/");
        exit();
      } else {

        $error = 'Email ou password errados';
        $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        $this->view('contas/index', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'error' => $error]);
        $this->view('shared/footer');
      }
    } else {
      // view nromal
      $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
      $this->view('contas/index', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
      $this->view('shared/footer');
    }
  }

  public function perfil()
  {

    $contas = $this->model('Contas');
    $categorias = $this->model('Categoria');
    $marcas = $this->model('Marca');
    $marca = $marcas->getMarcas();
    $categoria = $categorias->getCategorias();
    $generos = $this->model('Genero');
    $genero = $generos->getGeneros();
    $conta = $contas->getContaById($_SESSION['user_ID']);

    $erro = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $user = [
        'email' => $conta[0]['email'],
        'nome' => $_POST['nome'],
        'apelido' => $_POST['apelido'],
        'pass' => password_hash($_POST['password'], PASSWORD_BCRYPT) ?: $conta[0]['pass']
      ];

      if ($user['email'] == '' || $user['nome'] == '' || $user['apelido'] == '') {
        $erro = 'O campo não pode estar vazio';
      }

      if ($user['pass'] == '' || strlen($user['pass']) < 8) {
        $erro = 'A passe precisa de 8 caracteres';
      }

      if ($erro == '') {
        $contaNova = $contas->updateConta($user, $conta[0]['id']);
      }

      if ($contaNova) {
        //print_r( $contaNova);
        //print_r($user);
        $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        $this->view('contas/perfil', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'conta' => $contaNova]);
        $this->view('shared/footer');
      } else {

        //var_dump($conta);
        $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        $this->view('contas/perfil', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'conta' => $conta, 'error' => $erro]);
        $this->view('shared/footer');
      }
    } else {
      // $conta = $constas->get();
      $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
      $this->view('contas/perfil', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'conta' => $conta[0]]);
      $this->view('shared/footer');
    }
  }

  public function logout()
  {
    session_unset();
    session_destroy();

    header("Location: /websiteKornerSkateShop/");
    exit();
  }

  public function registo()
  {
    $contas = $this->model('Contas');
    $categorias = $this->model('Categoria');
    $marcas = $this->model('Marca');
    $marca = $marcas->getMarcas();
    $categoria = $categorias->getCategorias();
    $generos = $this->model('Genero');
    $genero = $generos->getGeneros();
    $erro = '';

    define('ENCRYPTION_COST', '2y');
    $conta = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $user = [
        'email' => $_POST['email'],
        'nome' => $_POST['nome'],
        'apelido' => $_POST['apelido'],
        'pass' => password_hash($_POST['password'], PASSWORD_BCRYPT)
      ];

      if ($user['pass'] == '' || $user['email'] == '' || $user['nome'] == '' || $user['apelido'] == '') {
        $erro = 'Preencha todos os campos';
      }

      if ($_POST['password'] == '' || strlen($_POST['password']) < 8) {
        $erro = 'A passe precisa de 8 caracteres';
      }

      $resultado = $contas->verificaEmail($user['email']);

      $existe = isset($resultado[0]['numero']) ? $resultado[0]['numero'] : 0;

      if ($existe != 0) {
        $erro = 'Email já existe';
      }

      if ($erro == '') {
        $conta = $contas->addConta($user);
      }

      if ($conta) {
        header("Location: /websiteKornerSkateShop/contas");
        exit();
      } else {

        //var_dump($conta);
        $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        $this->view('contas/registo', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'error' => $erro]);
        $this->view('shared/footer');
      }
    } else {
      $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
      $this->view('contas/registo', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
      $this->view('shared/footer');
    }
  }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes