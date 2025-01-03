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
            $marcas = $this->model('Marca');
            $marca = $marcas->getMarcas();
            $marcaa = $marcas->getMarcaById($id);
            $peca = $pecas->getPecasByMarcaId($id);
            $categoria = $categorias->getCategorias($id);

            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('marcas/get', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'marcaa' => $marcaa]);
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

                $newMar = [
                    'nome' => $_POST['nome'],
                ];

                foreach ($marca as $mar) {
                    if ($mar['nome'] == $newMar['nome']) {
                        $erro = 'Marca já existente';
                    }
                }

                if ($erro == '') {
                    $marcas->addMarca($newMar);
                    header("Location: /websiteKornerSkateShop/admin/marca");
                    exit();
                } else {
                    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                    $this->view('admin/add/marca', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'error' => $erro]);
                    $this->view('shared/footer');
                }
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('admin/add/marca', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
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
            $marcaInd = $marcas->getMarcaById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {


                $newMarca = [
                    'nome' => $_POST['nome']
                ];

                if ($marcas->updateMarca($newMarca, $marcaInd[0]['id'])) {
                    header("Location: /websiteKornerSkateShop/admin/marca");
                    exit();
                } else {
                    $erro = "Erro ao atualizar a marca.";

                    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                    $this->view('marcas/editar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'marcaInd' => $marcaInd, 'error' => $erro]);
                    $this->view('shared/footer');
                }
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('marcas/editar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'marcaInd' => $marcaInd]);
                $this->view('shared/footer');
            }
        } else {
            $this->pageNotFound();
        }
    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes