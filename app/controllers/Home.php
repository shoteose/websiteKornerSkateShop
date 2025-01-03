<?php

use app\core\Controller;

class Home extends Controller
{
  public function index()
  {
    $contass = $this->model('Contas');
    $pecas = $this->model('Pecas');
    $categorias = $this->model('Categoria');
    $generos = $this->model('Genero');
    $marcas = $this->model('Marca');
    $peca = $pecas->getPecasComDesconto();
    $marca = $marcas->getMarcas();
    $genero = $generos->getGeneros();

    $categoria = $categorias->getCategorias();

    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
    $this->view('home/index', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
    $this->view('shared/footer');
  }
}
