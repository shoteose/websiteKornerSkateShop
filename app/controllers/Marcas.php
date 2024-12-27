<?php

use app\core\Controller;

class Marcas extends Controller
{

    public function get($id = null)
    {
        if (is_numeric($id)) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $genero = $generos->getGeneros();
            $peca = $pecas->getPecasByMarcaId($id);
            $categoria = $categorias->getCategorias($id);

            $this->view('marcas/get', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero]);
        } else {

            $this->pageNotFound();
        }
    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes