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
            $marcas = $this->model('Marca');
            $marca = $marcas->getMarcas();
            $peca = $pecas->getPecaById($id);
            $categoria = $categorias->getCategorias($id);

            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('pecas/detalhes', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
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
            $cores = $this->model('Cor');
            $cor = $cores->getCores();
            $pecas = $this->model('Pecas');
            $peca = $pecas->getPecas();


            $erro = '';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $newPeca = [
                    'nome' => $_POST['nome'],
                    'descricao' => $_POST['descricao'],
                    'id_cor' => $_POST['id_cor'],
                    'id_marca' => $_POST['id_marca'],
                    'id_genero' => $_POST['id_genero'],
                    'preco' => $_POST['preco'],
                    'taxa_iva' => $_POST['taxa_iva'],
                    'taxa_desconto' => $_POST['taxa_desconto'],
                    'tridimensional' => $_POST['tridimensional'],
                    'imagemTextura' => $_POST['imagemTextura']

                ];

                foreach ($peca as $p) {
                    if ($p['nome'] == $newPeca['nome']) {

                        $erro = 'Peca com esse nome já existente';
                    }
                }


                if ($erro == '') {
                    $pecas->addPeca($newPeca);
                    header("Location: /websiteKornerSkateShop/admin/peca");
                    exit();
                } else {
                    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                    $this->view('admin/add/peca', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'cores' => $cor, 'error' => $erro]);
                    $this->view('shared/footer');
                }
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('admin/add/peca', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'cores' => $cor]);
                $this->view('shared/footer');
            }
        } else {

            $this->pageNotFound();
        }
    }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes