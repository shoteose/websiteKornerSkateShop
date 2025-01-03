<?php

use app\core\Controller;

class Loja extends Controller
{
    public function index()
    {
        $categorias = $this->model('Categoria');
        $generos = $this->model('Genero');
        $genero = $generos->getGeneros();
        $marcas = $this->model('Marca');
        $marca = $marcas->getMarcas();
        $categoria = $categorias->getCategorias();

        $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        $this->view('shared/loja3D', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        $this->view('shared/footer');
    }
}


// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes