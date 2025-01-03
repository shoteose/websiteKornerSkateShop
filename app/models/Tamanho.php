<?php

namespace app\models;

use app\core\Db;

class Tamanho
{
    private $db;

    public function __construct()
    {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    public function getTamanhos()
    {
        return $this->db->execGet('tamanho/');
    }

    public function updateTamanho(array $data, $id)
    {
        return $this->db->execPut("tamanho/$id", $data);
    }

    public function getTamanhoById(int $id)
    {
        return $this->db->execGet("tamanho/$id");
    }

    public function addTamanho(array $data)
    {
        return $this->db->execPost('tamanho/', $data);
    }

    public function deleteTamanho(int $id)
    {
        return $this->db->execDelete("tamanho/$id");
    }
}
