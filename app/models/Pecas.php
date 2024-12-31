<?php

namespace app\models;

use app\core\Db;

class Pecas
{
    private $db;

    public function __construct()
    {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    /**
     * Obter todas as Pecas
     *
     * @return array|null
     */
    public function getPecas()
    {
        return $this->db->execGet('peca/');
    }

    public function getPecaById(int $id)
    {
        return $this->db->execGet("peca/$id");
    }

    public function getPecasByCategoriaId($id)
    {
        return $this->db->execGet("peca/categoria/$id");
    }

    public function getPecasByMarcaId($id)
    {
        return $this->db->execGet("peca/marca/$id");
    }

    public function getPecasByGeneroId($id)
    {
        return $this->db->execGet("peca/categoria/$id");
    }

    public function getPecasComDesconto()
    {
        return $this->db->execGet('peca/sales');
    }

    public function deletePeca($id)
    {
        return $this->db->execDelete("peca/$id");
    }
}
