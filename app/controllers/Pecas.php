<?php

use app\core\Controller;

class Pecas extends Controller
{

    public function detalhes($id = null)
    {
        if (is_numeric($id)) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $genero = $generos->getGeneros();
            $peca = $pecas->getPecaById($id);
            $categoria = $categorias->getCategorias($id);
    
            $this->view('pecas/detalhes', ['roupas' => $peca , 'categorias' => $categoria,'generos' => $genero]);

        }else{

            $this->pageNotFound();
        }

    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes