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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $user = [
        'email' => $_POST['email'],
        'pass' => $_POST['password']
      ];

      $conta = $contas->login($user);

      if (!empty($conta)) {
        $_SESSION['user_id_acess'] = $conta['id_tipoUser'];

        header("Location: /websiteKornerSkateShop/home/index");
        exit();
      } else {
        $this->view('contas/index', ['error' => 'Acessos errados']);
      }
    } else {
      $this->view('contas/index');
    }
  }

  public function logout()
  {
    session_unset();
    session_destroy();
    
    header("Location: /websiteKornerSkateShop/home/index");
    exit();
  }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes