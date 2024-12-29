<?php

namespace app\models;

use app\core\Db;

class Contas
{
    private $db;

    public function __construct()
    {
        $this->db = new Db(); // Usa o novo Db para consumir a API
    }

    /**
     * Obter todas as contas
     *
     * @return array|null
     */
    public function getContas()
    {
        return $this->db->execGet('user/');
    }

    public function login($conta) {
        $response = $this->db->execPost('user/login/', $conta);
    
        if (isset($response['error']) && $response['error'] === true) {
            // Retorna o erro para o controlador
            return $response;
        }
    
        return $response; // Retorna os dados do usuário em caso de sucesso
    }
    

    /**
     * Obter uma conta por ID
     *
     * @param int $id
     * @return array|null
     */
    public function getContaById(int $id)
    {
        return $this->db->execGet("user/$id");
    }

    /**
     * Adicionar uma nova conta
     *
     * @param array $data
     * @return array|null
     */
    public function addConta(array $data)
    {
        return $this->db->execPost('user/', $data);
    }

    public function verificaEmail(string $email) {
        $response = $this->db->execGet("user/emailcheck/$email");
    
        return $response; 
    }


    /**
     * Deletar uma conta por ID
     *
     * @param int $id
     * @return array|null
     */
    public function deleteConta(int $id)
    {
        return $this->db->execDelete("user/$id");
    }
}
