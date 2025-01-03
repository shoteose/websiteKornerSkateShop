<?php

namespace app\models;

use app\core\Db;

class Stock {
    private $db;

    public function __construct() {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    /**
     * Obter todas as Stocks
     *
     * @return array|null
     */
    public function getStock() {
        return $this->db->execGet('stock/');
    }

    public function updateStock(array $data, $id)
    {
        return $this->db->execPut("stock/$id", $data);
    }

    /**
     * Obter uma Stock por ID
     *
     * @param int $id
     * @return array|null
     */
    public function getStockById(int $id) {
        return $this->db->execGet("stock/$id");
    }

    /**
     * Adicionar uma nova Stock
     *
     * @param array $data
     * @return array|null
     */
    public function addStock(array $data) {
        return $this->db->execPost('stock/', $data);
    }

    /**
     * Deletar uma Stock por ID
     *
     * @param int $id
     * @return array|null
     */
    public function deleteStock(int $id) {
        return $this->db->execDelete("stock/$id");
    }
}

