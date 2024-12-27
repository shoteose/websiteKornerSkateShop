<?php
use app\core\Controller;

class Contas extends Controller
{
  /**
   * Invocação da view index.php
   */
  public function index() {
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

        $conta = $contas->login($user);

        if (!empty($conta) && empty($conta['error'])) {
            // Login feito
            $_SESSION['user_id_acess'] = $conta['id_tipoUser'];
            $_SESSION['user_ID'] = $conta['id'];

            header("Location: /websiteKornerSkateShop/");
            exit();
        } else {
            // Login falhou, passa o erro para a view
            $error = $conta['message'] ?? 'Erro desconhecido.';
            $this->view('contas/index', [
                'categorias' => $categoria,'generos' => $genero, 'marcas' => $marca,
                'error' => $error
            ]);
        }
    } else {
        // view nromal
        $this->view('contas/index', ['categorias' => $categoria,'generos' => $genero, 'marcas' => $marca]);
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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $user = [
        'email' => $_POST['email'],
        'pass' => $_POST['password']
      ];

      $conta = $contas->addConta($user);

      if (!empty($conta) && $user['email'] != null && $user['pass'] != null) {
        $_SESSION['user_id_acess'] = $conta['id_tipoUser'];
        $_SESSION['user_ID'] = $conta['id'];

        header("Location: /websiteKornerSkateShop/contas");
        exit();
      } else {
       //var_dump($conta);
        $this->view('contas/registo', [ 'categorias' => $categoria,'generos' => $genero, 'marcas' => $marca,'error' => 'Acessos errados']);
      }
    } else {
      $this->view('contas/registo', ['categorias' => $categoria,'generos' => $genero, 'marcas' => $marca]);
    }
  }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes