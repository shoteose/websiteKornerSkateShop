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
        $peca = $pecas->getPecasComDesconto();
        $categoria = $categorias->getCategorias();

        $this->view('sales/index', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero]);
    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes