<?php

namespace app\models;

use app\core\Db;

class Genero {
    private $db;

    public function __construct() {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    /**
     * Obter todas as Generos
     *
     * @return array|null
     */
    public function getGeneros() {
        return $this->db->execGet('genero/');
    }

    /**
     * Obter uma Genero por ID
     *
     * @param int $id
     * @return array|null
     */
    public function getGeneroById(int $id) {
        return $this->db->execGet("genero/$id");
    }

    /**
     * Adicionar uma nova Genero
     *
     * @param array $data
     * @return array|null
     */
    public function addGenero(array $data) {
        return $this->db->execPost('genero/', $data);
    }

    /**
     * Deletar uma Genero por ID
     *
     * @param int $id
     * @return array|null
     */
    public function deleteGenero(int $id) {
        return $this->db->execDelete("genero/$id");
    }
}

