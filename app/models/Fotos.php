<?php

namespace app\models;

use app\core\Db;

class Fotos {
    private $db;

    public function __construct() {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    /**
     * Obter todas as Fotos
     *
     * @return array|null
     */
    public function getFotos() {
        return $this->db->execGet('fotos/');
    }

    /**
     * Obter uma Foto por ID
     *
     * @param int $id
     * @return array|null
     */
    public function getFotoById(int $id) {
        return $this->db->execGet("fotos/$id");
    }

    /**
     * Adicionar uma nova Foto
     *
     * @param array $data
     * @return array|null
     */
    public function addFoto(array $data) {
        return $this->db->execPost('fotos/', $data);
    }

    /**
     * Deletar uma Foto por ID
     *
     * @param int $id
     * @return array|null
     */
    public function deleteFoto(int $id) {
        return $this->db->execDelete("fotos/$id");
    }
}

