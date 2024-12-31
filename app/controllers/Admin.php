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
            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('admin/index', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('shared/footer');
        } else {

            $this->pageNotFound();
        }
    }

    public function peca($ids = null)
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


            if ($ids != null) {
                $result = $pecas->deletePeca($ids);
                header("Location: /websiteKornerSkateShop/admin/peca");
                exit();
            }

            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('admin/indexes/peca', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('shared/footer');
        } else {

            $this->pageNotFound();
        }
    }

    public function categoria($ids = null)
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

            if ($ids != null) {
                $result = $categorias->deleteCategoria($ids);
                header("Location: /websiteKornerSkateShop/admin/categoria");
                exit();
            }
            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('admin/indexes/categoria', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('shared/footer');
        } else {

            $this->pageNotFound();
        }
    }

    public function marca($ids = null)
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

            if ($ids != null) {
                $result = $marcas->deleteMarca($ids);
                header("Location: /websiteKornerSkateShop/admin/marca");
                exit();
            }
            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('admin/indexes/marca', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('shared/footer');
        } else {

            $this->pageNotFound();
        }
    }

    public function genero($ids = null)
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

            if ($ids != null) {
                $result = $generos->deleteGenero($ids);
                header("Location: /websiteKornerSkateShop/admin/genero");
                exit();
            }
            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('admin/indexes/genero', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('shared/footer');
        } else {

            $this->pageNotFound();
        }
    }

    public function cor($ids = null)
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');
            $cores = $this->model('Cor');

            $cor = $cores->getCores();
            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();

            if ($ids != null) {
                $result = $cores->deleteCor($ids);
                header("Location: /websiteKornerSkateShop/admin/cor");
                exit();
            }
            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('admin/indexes/cor', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'cores' => $cor]);
            $this->view('shared/footer');
        } else {

            $this->pageNotFound();
        }
    }

    public function tamanho($ids = null)
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');
            $tamanhos = $this->model('Tamanho');
            $tamanho = $tamanhos->getTamanhos();

            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();

            if ($ids != null) {
                $result = $tamanhos->deleteTamanho($ids);
                header("Location: /websiteKornerSkateShop/admin/tamanho");
                exit();
            }

            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('admin/indexes/tamanho', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'tamanhos' => $tamanho]);
            $this->view('shared/footer');
        } else {

            $this->pageNotFound();
        }
    }

    public function stock($ids = null)
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');
            $stocks = $this->model('Stock');

            $stock = $stocks->getStock();
            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();



            if ($ids != null) {
                $result = $stocks->deleteStock($ids);
                header("Location: /websiteKornerSkateShop/admin/stock");
                exit();
            }
            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('admin/indexes/stock', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'stocks' => $stock]);
            $this->view('shared/footer');
        } else {

            $this->pageNotFound();
        }
    }

    public function media($ids = null)
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $marcas = $this->model('Marca');
            $medias = $this->model('Media');

            $peca = $pecas->getPecas();
            $categoria = $categorias->getCategorias();
            $genero = $generos->getGeneros();
            $marca = $marcas->getMarcas();
            $media = $medias->getMedias();

            if ($ids != null) {
                $result = $medias->deleteMedia($ids);
                header("Location: /websiteKornerSkateShop/admin/media");
                exit();
            }
            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('admin/indexes/media', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'medias' => $media]);
            $this->view('shared/footer');
        } else {

            $this->pageNotFound();
        }
    }

    public function conta($ids = null)
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

            if ($ids != null) {
                $result = $contas->deleteConta($ids);
                header("Location: /websiteKornerSkateShop/admin/conta");
                exit();
            }
            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('admin/indexes/conta', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'contas' => $conta]);
            $this->view('shared/footer');
        } else {

            $this->pageNotFound();
        }
    }


}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes