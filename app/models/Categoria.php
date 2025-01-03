<?php

namespace app\models;

use app\core\Db;

class Categoria
{
    private $db;

    public function __construct()
    {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    /**
     * Obter todas as Categorias
     *
     * @return array|null
     */
    public function getCategorias()
    {
        return $this->db->execGet('categoria/');
    }

    /**
     * Obter uma Categoria por ID
     *
     * @param int $id
     * @return array|null
     */
    public function getCategoriaById(int $id)
    {
        return $this->db->execGet("categoria/$id");
    }

    public function updateCategoria(array $data, $id)
    {
        return $this->db->execPut("categoria/$id", $data);
    }

    /**
     * Adicionar uma nova Categoria
     *
     * @param array $data
     * @return array|null
     */
    public function addCategoria(array $data)
    {
        return $this->db->execPost('categoria/', $data);
    }

    /**
     * Deletar uma Categoria por ID
     *
     * @param int $id
     * @return array|null
     */
    public function deleteCategoria(int $id)
    {
        return $this->db->execDelete("categoria/$id");
    }
}
