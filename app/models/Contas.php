<?php

namespace app\models;

use app\core\Db;

class Contas {
    private $db;

    public function __construct() {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    /**
     * Obter todas as contas
     *
     * @return array|null
     */
    public function getContas() {
        return $this->db->execGet('user/');
    }

    public function login($conta){

      return $this->db->execPost('user/login/', $conta);

    }
    /**
     * Obter uma conta por ID
     *
     * @param int $id
     * @return array|null
     */
    public function getContaById(int $id) {
        return $this->db->execGet("user/$id");
    }

    /**
     * Adicionar uma nova conta
     *
     * @param array $data
     * @return array|null
     */
    public function addConta(array $data) {
        return $this->db->execPost('user/', $data);
    }

    /**
     * Deletar uma conta por ID
     *
     * @param int $id
     * @return array|null
     */
    public function deleteConta(int $id) {
        return $this->db->execDelete("user/$id");
    }
}

