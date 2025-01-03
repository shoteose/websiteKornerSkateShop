<?php

namespace app\core;

use app\models\Jogos;

/**
 * Classe que instancia um model e invoca uma view
 */
class Controller
{


  /**
   * 
   * 
   * Método para a invocação de um model.
   *
   * @param  string  $model   Model que será instanciado para usar numa view
   */
  public function model($model)
  {
    require 'app/models/' . $model . '.php';
    $classe = 'app\\models\\' . $model; // *
    return new $classe();
    // *  o duplo backslash deve-se ao facto de estar a ser referenciada uma classe numa string
    //    o primeiro backslash "escapa" o segundo
  }

  /**
   * Método para a invocação de uma view (página).
   *
   * @param  string  $view   A view que será invocada
   * @param  array   $data   Dados a exibir na view
   */
  public function view(string $view, $data = [])
  {
    $url_alias = '/websiteKornerSkateShop';
    require 'app/views/' . $view . '.php';
  }

  public function viewDouble(string $view, $data = [])
  {
    require 'app/views/' . $view . '.php';
  }

  /**
   * Método herdado em todas as subclasses.
   * É invocado quando o método ou classe não são encontrados.
   */
  public function pageNotFound()
  {
    $categorias = $this->model('Categoria');
    $generos = $this->model('Genero');
    $genero = $generos->getGeneros();
    $marcas = $this->model('Marca');
    $marca = $marcas->getMarcas();
    $categoria = $categorias->getCategorias();

    $this->view('erro404', ['categorias' => $categoria, 'generos' => $genero, 'marcas' => $marca]);
  }
}
