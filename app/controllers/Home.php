<?php

use app\core\Controller;

class Home extends Controller
{
  public function index()
  {
    $contass = $this->model('Contas');
    $pecas = $this->model('Pecas');
    $peca = $pecas->getPecas();
    // existe user?
    if (isset($_SESSION['user_id_acess'])) {

      $userId = $_SESSION['user_id_acess'];
      $conta = $contass->getContaById($userId);

      //$this->view('home/index', ['user' => $conta]);
    }

    $this->view('home/index', ['roupas' => $peca]);
  }
}
