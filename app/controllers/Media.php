<?php

use app\core\Controller;

class Media extends Controller
{
    public function index()
    {
        $contass = $this->model('Contas');
        $pecas = $this->model('Pecas');
        $medias = $this->model('Media');
        $media = $medias->getMedias();
        $categorias = $this->model('Categoria');
        $generos = $this->model('Genero');
        $marcas = $this->model('Marca');
        $marca = $marcas->getMarcas();
        $genero = $generos->getGeneros();

        $peca = $pecas->getPecas();
        $categoria = $categorias->getCategorias();

        // este & faz com que me esteja a referir ao item real
        foreach ($media as &$m) {
            if ($m['url'] != null) {
                $url = $m['url'];

                // verifica se é um link do YouTube
                if (str_contains($url, 'youtube.com')) {
                    // obter o ID do vídeo
                    $parts = explode('?', $url);
                    parse_str($parts[1] ?? '', $queryParams);
                    $videoId = $queryParams['v'];

                    if ($videoId) {
                        $m['url'] = "<div class= 'ratio ratio-16x9'> <iframe src='https://www.youtube.com/embed/$videoId' 
                            title='YouTube video player' frameborder='0'
                            allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture'
                            allowfullscreen></iframe></div>";
                    }
                }
                // verifica se é um link do Instagram
                elseif (str_contains($url, 'instagram.com')) {
                    
                    $m['url'] = "<blockquote class='instagram-media' data-instgrm-permalink='$url' 
                                       data-instgrm-version='14'></blockquote>
                                       <script async src='//www.instagram.com/embed.js'></script>";
                }
            }
        }


        $this->view('media/index', ['roupas' => $peca, 'categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca, 'medias' => $media]);
    }
}
