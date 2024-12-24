<?php

namespace app\models;

use app\core\Db;

class Pecas {
    private $db;

    public function __construct() {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    /**
     * Obter todas as Pecas
     *
     * @return array|null
     */
    public function getPecas() {
        return $this->db->execGet('peca/');
    }

    }

