<?php

use app\core\Controller;

class Tamanho extends Controller
{

    public function add()
    {

        if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $genero = $generos->getGeneros();
            $marcas = $this->model('Marca');
            $marca = $marcas->getMarcas();
            $categoria = $categorias->getCategorias();
            $tamanhos = $this->model('Tamanho');
            $tamanho = $tamanhos->getTamanhos();
            $erro = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $newTam = [
                    'descricao' => $_POST['descricao'],
                ];

                foreach ($tamanho as $c) {
                    if ($c['descricao'] == $newTam['descricao']) {
                        $erro = 'Tamanho já existente';
                    }
                }

                if ($erro == '') {
                    $tamanhos->addTamanho($newTam);
                    header("Location: /websiteKornerSkateShop/admin/tamanho");
                    exit();
                } else {
                    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                    $this->view('admin/add/tamanho', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'error' => $erro]);
                    $this->view('shared/footer');
                }
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('admin/add/tamanho', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
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
            $tamanhos = $this->model('Tamanho');
            $tamanhoInd = $tamanhos->getTamanhoById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {


                $newTamanho = [
                    'descricao' => $_POST['descricao']
                ];

                if ($tamanhos->updateTamanho($newTamanho, $tamanhoInd[0]['id'])) {
                    header("Location: /websiteKornerSkateShop/admin/tamanho");
                    exit();
                } else {
                    $erro = "Erro ao atualizar o tamanho.";

                    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                    $this->view('tamanho/editar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'corInd' => $tamanhoInd, 'error' => $erro]);
                    $this->view('shared/footer');
                }
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('tamanho/editar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'tamanhoInd' => $tamanhoInd]);
                $this->view('shared/footer');
            }
        } else {
            $this->pageNotFound();
        }
    }
    
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes