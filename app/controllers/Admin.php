<?php

use app\core\Controller;

class Admin extends Controller
{

    public function index()
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');

            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();

            $this->view('admin/index', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        } else {

            $this->pageNotFound();
        }
    }

    public function peca()
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');

            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();

            $this->view('admin/peca', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        } else {

            $this->pageNotFound();
        }
    }

    public function categoria()
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');

            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();

            $this->view('admin/categoria', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        } else {

            $this->pageNotFound();
        }
    }

    public function marca()
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');

            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();

            $this->view('admin/marca', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        } else {

            $this->pageNotFound();
        }
    }

    public function genero()
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');

            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();

            $this->view('admin/genero', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        } else {

            $this->pageNotFound();
        }
    }

    public function cores()
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');

            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();

            $this->view('admin/cores', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        } else {

            $this->pageNotFound();
        }
    }

    public function tamanho()
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');

            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();

            $this->view('admin/tamanho', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        } else {

            $this->pageNotFound();
        }
    }

    public function stock()
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');

            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();

            $this->view('admin/stock', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        } else {

            $this->pageNotFound();
        }
    }

    public function media()
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');

            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();

            $this->view('admin/media', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
        } else {

            $this->pageNotFound();
        }
    }

    public function conta()
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');
            $contas = $this->model('Contas');
            $conta = $contas->getContas();
            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();

            $this->view('admin/conta', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'contas' => $conta]);
        } else {

            $this->pageNotFound();
        }
    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes