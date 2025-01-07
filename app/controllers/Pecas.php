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
            $cores = $this->model('Cor');
            $cor = $cores->getCores();
            $peca = $pecas->getPecaById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $texturaBin = null;

                // Verifica se uma nova textura foi enviada
                if (!empty($_FILES['imagemTextura']['tmp_name'])) {
                    $texturaBin = base64_encode(file_get_contents($_FILES['imagemTextura']['tmp_name']));
                } else {
                    // Verifica e trata o campo imagemTextura
                    if (isset($peca[0]['imagemTextura']) && is_string($peca[0]['imagemTextura'])) {
                        $texturaBin = base64_encode($peca[0]['imagemTextura']); // Já é uma string binária
                    } elseif (isset($peca[0]['imagemTextura']['data'])) {
                        // Converte array de dados para binário
                        $binaryData = pack('C*', ...$peca[0]['imagemTextura']['data']);
                        $texturaBin = base64_encode($binaryData);
                    } else {
                        $texturaBin = null; // Sem textura
                    }
                }

                $newPeca = [
                    'nome' => $_POST['nome'],
                    'descricao' => $_POST['descricao'],
                    'id_cor' => $_POST['id_cor'],
                    'id_categoria' => $_POST['id_categoria'],
                    'id_marca' => $_POST['id_marca'],
                    'id_genero' => $_POST['id_genero'],
                    'preco' => $_POST['preco'],
                    'taxa_iva' => $_POST['taxa_iva'],
                    'taxa_desconto' => $_POST['taxa_desconto'],
                    'tridimensional' => $_POST['tridimensional'],
                    'imagemTextura' => $texturaBin
                ];

                if ($pecas->updatePeca($newPeca, $peca[0]['id'])) {
                    header("Location: /websiteKornerSkateShop/admin/peca");
                    exit();
                } else {

                    $erro = "Erro ao dar update";
                    $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                    $this->view('pecas/editar', ['peca' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'cores' => $cor, 'error' => $erro]);
                    $this->view('shared/footer');
                }
            } else {
                $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
                $this->view('pecas/editar', ['peca' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'cores' => $cor]);
                $this->view('shared/footer');
            }
        } else {
            $this->pageNotFound();
        }
    }

    public function fotos($id = null)
    {

        if (is_numeric($id) && isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) {

            $pecas = $this->model('Pecas');
            $categorias = $this->model('Categoria');
            $generos = $this->model('Genero');
            $genero = $generos->getGeneros();
            $marcas = $this->model('Marca');
            $fotosModel = $this->model('Fotos');
            $pecas_fotos = $this->model('Pecas_fotos');
            $marca = $marcas->getMarcas();
            $categoria = $categorias->getCategorias();
            $cores = $this->model('Cor');
            $cor = $cores->getCores();
            $peca = $pecas->getPecaById($id);
            $pecaas_fotos = $pecas_fotos->getPecas_fotos($id);

            $quantidadeFotos = count($pecaas_fotos) + 1;

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fotos'])) {

                $fotos = [];

                if (isset($_FILES['fotos'])) {

                    for ($a = 0; $a < count($_FILES['fotos']['name']); $a++) {
                        $fotos[$a] = [
                            'name' => $_FILES['fotos']['name'][$a],
                            'tmp_name' => $_FILES['fotos']['tmp_name'][$a],
                            'error' => $_FILES['fotos']['error'][$a],
                            'size' => $_FILES['fotos']['size'][$a],
                        ];
                    }
                }

                $id_peca = $id;

                for ($i = 0; $i <  count($fotos); $i++) {

                    if ($fotos[$i]['error'] === UPLOAD_ERR_OK) {

                        $nomeFormatado = $peca[0]['nome'] . '_' . $quantidadeFotos + $i;
                        $extensao = pathinfo($fotos[$i]['name'], PATHINFO_EXTENSION);

                        $caminhoFinal = 'assets/logos/roupas/' . $nomeFormatado . '.' . $extensao;

                        if (move_uploaded_file($fotos[$i]['tmp_name'], $caminhoFinal)) {
                            $newFoto = [
                                'nome_arquivo' => $nomeFormatado . '.' . $extensao
                            ];

                            $fotoNow = $fotosModel->addFoto($newFoto);
                            $id_foto = $fotoNow['id'];

                            $newPeca_Foto = [
                                'id_peca' => $id_peca,
                                'id_foto' => $id_foto
                            ];

                            $pecas_fotos->addPecas_fotos($newPeca_Foto);
                        }
                    }
                }

                header("Location: /websiteKornerSkateShop/pecas/fotos/$id");
                exit();
            }

            $this->view('shared/navBar', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
            $this->view('pecas/fotos', ['peca' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'cores' => $cor, 'pecas_fotos' => $pecaas_fotos]);
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
            $fotosModel = $this->model('Fotos');
            $pecas_fotos = $this->model('Pecas_fotos');
            $marca = $marcas->getMarcas();
            $categoria = $categorias->getCategorias();
            $cores = $this->model('Cor');
            $cor = $cores->getCores();
            $pecas = $this->model('Pecas');
            $peca = $pecas->getPecas();


            $erro = '';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $texturaBin = null;
                if (!empty($_FILES['imagemTextura']['tmp_name'])) {
                    $texturaBin =  base64_encode(file_get_contents($_FILES['imagemTextura']['tmp_name']));
                } else {
                    die("Erro ao acessar o arquivo temporário.");
                }

                $newPeca = [
                    'nome' => $_POST['nome'],
                    'descricao' => $_POST['descricao'],
                    'id_cor' => $_POST['id_cor'],
                    'id_categoria' => $_POST['id_categoria'],
                    'id_marca' => $_POST['id_marca'],
                    'id_genero' => $_POST['id_genero'],
                    'preco' => $_POST['preco'],
                    'taxa_iva' => $_POST['taxa_iva'],
                    'taxa_desconto' => $_POST['taxa_desconto'],
                    'tridimensional' => $_POST['tridimensional'],
                    'imagemTextura' =>  $texturaBin
                ];

                foreach ($peca as $p) {
                    if ($p['nome'] == $newPeca['nome']) {

                        $erro = 'Peca com esse nome já existente';
                    }
                }

                $fotos = []; // Array para armazenar as fotos

                if (isset($_FILES['fotos'])) {
                    for ($a = 0; $a < count($_FILES['fotos']['name']); $a++) {
                        $fotos[$a] = [
                            'name' => $_FILES['fotos']['name'][$a],
                            'tmp_name' => $_FILES['fotos']['tmp_name'][$a],
                            'error' => $_FILES['fotos']['error'][$a],
                            'size' => $_FILES['fotos']['size'][$a],
                        ];
                    }
                }
                /*
                if (isset($_FILES['fotoTextura']) && $_FILES['fotoTextura']['error'] === UPLOAD_ERR_OK) {

                    // vai vuscar o nome original da foto
                    $imagem_nome = $_POST['nome'] . '_Textura';
                    $extensao = pathinfo($_FILES['fotoTextura']['name'], PATHINFO_EXTENSION);
                    // caminho temporário da imagem no servidor
                    $imagem_tmp = $_FILES['fotoTextura']['tmp_name'];

                    // defino o caminho final da imagem
                    $destino = 'assets/logos/texturas/' . $imagem_nome . '.' . $extensao;
                    if (move_uploaded_file($imagem_tmp, $destino)) {
                        $newPeca['urltextura'] = $destino;
                    }else{
                        $erro = 'Erro no upload do arquivo ';
                    }
                    // move a iamegm do local temporário para o destino final
                }

*/
                if ($erro === '') {
                    var_dump($newPeca);
                    $pecaNow = $pecas->addPeca($newPeca);
                    if (!$pecaNow) {
                        error_log("Erro ao inserir nova peça no banco de dados.");
                        die("Erro ao salvar no banco de dados.");
                    }
                    
                    $id_peca = $pecaNow['id'];

                    for ($i = 0; $i < count($fotos); $i++) {

                        if ($fotos[$i]['error'] === UPLOAD_ERR_OK) {

                            $nomeFormatado = $_POST['nome'] . '_' . $i;
                            $extensao = pathinfo($fotos[$i]['name'], PATHINFO_EXTENSION);

                            $caminhoFinal = 'assets/logos/roupas/' . $nomeFormatado . '.' . $extensao;

                            if (move_uploaded_file($fotos[$i]['tmp_name'], $caminhoFinal)) {
                                $newFoto = [
                                    'nome_arquivo' => $nomeFormatado . '.' . $extensao
                                ];

                                $fotoNow = $fotosModel->addFoto($newFoto);
                                $id_foto = $fotoNow['id'];

                                $newPeca_Foto = [
                                    'id_peca' => $id_peca,
                                    'id_foto' => $id_foto
                                ];

                                $pecas_fotos->addPecas_fotos($newPeca_Foto);
                            } else {
                                $erro = 'Erro ao mover o arquivo ' . $fotos[$i]['name'] . '.';
                            }
                        } else {
                            $erro = 'Erro no upload do arquivo ' . $fotos[$i]['name'] . '.';
                        }
                    }
                }
                if ($erro === '') {
                    
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