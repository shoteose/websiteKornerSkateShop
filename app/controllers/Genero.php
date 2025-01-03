<?php

use app\core\Controller;

class Genero extends Controller
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
            $peca = $pecas->getPecasByGeneroId($id);
            $categoria = $categorias->getCategorias($id);
            $generoo = $generos->getGeneroById($id);

            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('generos/get', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'generoos' => $generoo]);
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

                $newGen = [
                    'descricao' => $_POST['descricao'],
                ];

                foreach ($genero as $gen) {
                    if ($gen['descricao'] == $newGen['descricao']) {
                        $erro = 'Genero já existente';
                    }
                }

                if ($erro == '') {
                    $generos->addGenero($newGen);
                    header("Location: /websiteKornerSkateShop/admin/genero");
                    exit();
                } else {
                    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                    $this->view('admin/add/genero', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'error' => $erro]);
                    $this->view('shared/footer');
                }
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('admin/add/genero', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('shared/footer');
            }
        } else {

            $this->pageNotFound();
        }
    }

    public function editar($id = null)
    {
        if (is_numeric($id) && isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $genero = $generos->getGeneros();
            $marcas = $this->model('Marca');
            $marca = $marcas->getMarcas();
            $categoria = $categorias->getCategorias();
            $generoInd = $generos->getGeneroById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {


                $newGenero = [
                    'descricao' => $_POST['descricao']
                ];

                if ($generos->updateGenero($newGenero, $generoInd[0]['id'])) {
                    header("Location: /websiteKornerSkateShop/admin/genero");
                    exit();
                } else {
                    $erro = "Erro ao atualizar o género.";

                    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                    $this->view('generos/editar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'generoInd' => $generoInd, 'error' => $erro]);
                    $this->view('shared/footer');
                }
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('generos/editar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'generoInd' => $generoInd]);
                $this->view('shared/footer');
            }
        } else {
            $this->pageNotFound();
        }
    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes