<?php

namespace app\models;

use app\core\Db;

class Pecas_fotos {
    private $db;

    public function __construct() {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    /**
     * Obter todas as Pecas_fotoss
     *
     * @return array|null
     */
    public function getPecas_fotos() {
        return $this->db->execGet('pecas_fotos/');
    }

    /**
     * Obter uma Pecas_fotos por ID
     *
     * @param int $id
     * @return array|null
     */
    public function getPecas_fotosById(int $id) {
        return $this->db->execGet("pecas_fotos/$id");
    }

    /**
     * Adicionar uma nova Pecas_fotos
     *
     * @param array $data
     * @return array|null
     */
    public function addPecas_fotos(array $data) {
        return $this->db->execPost('pecas_fotos/', $data);
    }

    /**
     * Deletar uma Pecas_fotos por ID
     *
     * @param int $id
     * @return array|null
     */
    public function deletePecas_fotos(int $id) {
        return $this->db->execDelete("pecas_fotos/$id");
    }
}

