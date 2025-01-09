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
            $tamanhos = $this->model('Tamanho');
            $pecas = $this->model('Pecas');
            $peca = $pecas->getPecas();
            $tamanho = $tamanhos->getTamanhos();
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id_peca = $_POST['id_peca'];
                $tamanhos = $_POST['tamanhos']; // Array com tamanhos e quantidades
    
                foreach ($tamanhos as $tam) {
                    $newTam = [
                        'id_peca' => $id_peca,
                        'id_tamanho' => $tam['id_tamanho'],
                        'quantidade' => $tam['quantidade']
                    ];
    
                    $stocks->addStock($newTam); // Adiciona ao banco
                }
    
                header("Location: /websiteKornerSkateShop/admin/stock");
                exit();
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('admin/add/stock', [
                    'categorias' => $categoria,
                    'generos' => $genero,
                    'marcas' => $marca,
                    'pecas' => $peca,
                    'tamanhos' => $tamanho
                ]);
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
            $stocks = $this->model('Stock');
            $stockInd = $stocks->getStockById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {


                $newStock = [
                    'id_peca' => $stockInd[0]['id_peca'],
                    'id_tamanho' => $stockInd[0]['id_tamanho'],
                    'quantidade' => $_POST['quantidade']
                ];

                if ($stocks->updateStock($newStock, $stockInd[0]['id'])) {
                    header("Location: /websiteKornerSkateShop/admin/stock");
                    exit();
                } else {
                    $erro = "Erro ao atualizar o stock.";

                    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                    $this->view('stock/editar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'corInd' => $stockInd, 'error' => $erro]);
                    $this->view('shared/footer');
                }
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('stock/editar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'stockInd' => $stockInd]);
                $this->view('shared/footer');
            }
        } else {
            $this->pageNotFound();
        }
    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes