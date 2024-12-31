<?php

use app\core\Controller;

class Stock extends Controller
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
            $stocks = $this->model('Stock');
            $stock = $stocks->getStock();

            $pecas = $this->model('Pecas');
            $tamanhos = $this->model('Tamanho');
            $peca = $pecas->getPecas();
            $tamanho = $tamanhos->getTamanhos();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id_peca = $_POST['id_peca'];
                $tamanhos = $_POST['tamanhos'];

                foreach ($tamanhos as $tam) {
                    $newTam = [
                        'id_peca' => $id_peca,
                        'id_tamanho' => $tam['id_tamanho'],
                        'quantidade' => $tam['quantidade'],
                    ];
                    
                    $stocks->addStock($newTam);
                }

                header("Location: /websiteKornerSkateShop/admin/stock");
                exit();
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('admin/add/stock', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'pecas' => $peca, 'tamanhos' => $tamanho,]);
                $this->view('shared/footer');
            }
        } else {

            $this->pageNotFound();
        }
    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes