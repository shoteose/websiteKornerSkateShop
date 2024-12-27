<?php

use app\core\Controller;

class Categoria extends Controller
{

    public function get($id = null)
    {
        if (is_numeric($id)) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $genero = $generos->getGeneros();
            $marcas = $this->model('Marca');
            $marca = $marcas->getMarcas();
            $peca = $pecas->getPecasByCategoriaId($id);
            $categoria = $categorias->getCategorias($id);

            $this->view('categoria/get', ['roupas' => $peca , 'categorias' => $categoria,'generos' => $genero, 'marcas' => $marca]);
        } else {

            $this->pageNotFound();
        }
    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes