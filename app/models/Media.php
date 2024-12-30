<?php

namespace app\models;

use app\core\Db;

class Media {
    private $db;

    public function __construct() {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    /**
     * Obter todas as Medias
     *
     * @return array|null
     */
    public function getMedias() {
        return $this->db->execGet('media/');
    }

    /**
     * Obter uma Media por ID
     *
     * @param int $id
     * @return array|null
     */
    public function getMediaById(int $id) {
        return $this->db->execGet("media/$id");
    }

    /**
     * Adicionar uma nova Media
     *
     * @param array $data
     * @return array|null
     */
    public function addMedia(array $data) {
        return $this->db->execPost('media/', $data);
    }

    /**
     * Deletar uma Media por ID
     *
     * @param int $id
     * @return array|null
     */
    public function deleteMedia(int $id) {
        return $this->db->execDelete("media/$id");
    }
}

