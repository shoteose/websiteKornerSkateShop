<?php

use app\core\Controller;

class Cor extends Controller
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
            $cores = $this->model('Cor');
            $cor = $cores->getCores();
            $erro = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $newCor = [
                    'descricao' => $_POST['descricao'],
                ];

                foreach ($cor as $c) {
                    if ($c['descricao'] == $newCor['descricao']) {
                        $erro = 'Cor já existente';
                    }
                }

                if ($erro == '') {
                    $cores->addCor($newCor);
                    header("Location: /websiteKornerSkateShop/admin/cor");
                    exit();
                } else {
                    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                    $this->view('admin/add/categoria', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'error' => $erro]);
                    $this->view('shared/footer');
                }
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('admin/add/cor', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('shared/footer');
            }
        } else {

            $this->pageNotFound();
        }
    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes