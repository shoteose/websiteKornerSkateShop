<?php

namespace app\models;

use app\core\Db;

class Marca {
    private $db;

    public function __construct() {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    /**
     * Obter todas as Marcas
     *
     * @return array|null
     */
    public function getMarcas() {
        return $this->db->execGet('marca/');
    }

    /**
     * Obter uma Marca por ID
     *
     * @param int $id
     * @return array|null
     */
    public function getMarcaById(int $id) {
        return $this->db->execGet("marca/$id");
    }

    /**
     * Adicionar uma nova Marca
     *
     * @param array $data
     * @return array|null
     */
    public function addMarca(array $data) {
        return $this->db->execPost('marca/', $data);
    }

    public function updateMarca(array $data, $id)
    {
        return $this->db->execPut("marca/$id", $data);
    }
    /**
     * Deletar uma Marca por ID
     *
     * @param int $id
     * @return array|null
     */
    public function deleteMarca(int $id) {
        return $this->db->execDelete("marca/$id");
    }
}

