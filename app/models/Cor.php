<?php

namespace app\models;

use app\core\Db;

class Cor {
    private $db;

    public function __construct() {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    /**
     * Obter todas as Cors
     *
     * @return array|null
     */
    public function getCores() {
        return $this->db->execGet('cor/');
    }

    /**
     * Obter uma Cor por ID
     *
     * @param int $id
     * @return array|null
     */
    public function getCorById(int $id) {
        return $this->db->execGet("cor/$id");
    }

    /**
     * Adicionar uma nova Cor
     *
     * @param array $data
     * @return array|null
     */
    public function addCor(array $data) {
        return $this->db->execPost('cor/', $data);
    }

    /**
     * Deletar uma Cor por ID
     *
     * @param int $id
     * @return array|null
     */
    public function deleteCor(int $id) {
        return $this->db->execDelete("cor/$id");
    }
}

