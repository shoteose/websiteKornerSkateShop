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
            $categoria = $categorias->getCategorias();
            $categoriaa = $categorias->getCategoriaById($id);
            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('categoria/get', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'categoriaa' => $categoriaa]);
            $this->view('shared/footer');
        } else {

            $this->pageNotFound();
        }
    }

    public function add()
    {
        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $genero = $generos->getGeneros();
            $marcas = $this->model('Marca');
            $marca = $marcas->getMarcas();
            $categoria = $categorias->getCategorias();
            $erro = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $newCat = [
                    'descricao' => $_POST['descricao'],
                ];

                foreach ($categoria as $cat) {
                    if ($cat['descricao'] == $newCat['descricao']) {
                        $erro = 'Categoria já existente';
                    }
                }

                if ($erro == '') {
                    $categorias->addCategoria($newCat);
                    header("Location: /websiteKornerSkateShop/admin/categoria");
                    exit();
                } else {
                    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                    $this->view('admin/add/categoria', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'error' => $erro]);
                    $this->view('shared/footer');
                }
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('admin/add/categoria', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('shared/footer');
            }
        } else {

            $this->pageNotFound();
        }
    }

    public function editar($id = null)
    {
        if (is_numeric($id) && isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {
            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $genero = $generos->getGeneros();
            $marcas = $this->model('Marca');
            $marca = $marcas->getMarcas();
            $categoria = $categorias->getCategorias();
            $categoriaInd = $categorias->getCategoriaById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {


                $newCategoria = [
                    'descricao' => $_POST['descricao']
                ];

                if ($categorias->updateCategoria($newCategoria, $categoriaInd[0]['id'])) {
                    header("Location: /websiteKornerSkateShop/admin/categoria");
                    exit();
                } else {
                    $erro = "Erro ao atualizar a categoria.";
                    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                    $this->view('categoria/editar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'categoriaInd' => $categoriaInd, 'error' => $erro]);
                    $this->view('shared/footer');
                }
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('categoria/editar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'categoriaInd' => $categoriaInd]);
                $this->view('shared/footer');
            }
        } else {
            $this->pageNotFound();
        }
    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes