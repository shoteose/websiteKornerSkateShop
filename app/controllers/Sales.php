<?php

use app\core\Controller;

class Sales extends Controller
{

    public function index()
    {

        $pecas = $this->model('Pecas');
        $categorias = $this->model('Categoria');
        $generos = $this->model('Genero');
        $genero = $generos->getGeneros();
        $marcas = $this->model('Marca');
        $marca = $marcas->getMarcas();
        $peca = $pecas->getPecasComDesconto();
        $categoria = $categorias->getCategorias();

        $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        $this->view('sales/index', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        $this->view('shared/footer');
    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes