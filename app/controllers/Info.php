<?php

use app\core\Controller;

class Info extends Controller
{

    public function termoscondicoes()
    {
        $categorias = $this->model('Categoria');
        $generos = $this->model('Genero');
        $genero = $generos->getGeneros();
        $marcas = $this->model('Marca');
        $marca = $marcas->getMarcas();
        $categoria = $categorias->getCategorias();

        $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        $this->view('shared/termos', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        $this->view('shared/footer');
    }

    public function politica()
    {
        $categorias = $this->model('Categoria');
        $generos = $this->model('Genero');
        $genero = $generos->getGeneros();
        $marcas = $this->model('Marca');
        $marca = $marcas->getMarcas();
        $categoria = $categorias->getCategorias();

        $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        $this->view('shared/politica', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        $this->view('shared/footer');
    }

    public function loja()
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