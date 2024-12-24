<?php
namespace app\core;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Db {
    private $client;

    public function __construct() {
        $this->client = new Client([
            'base_uri' => 'http://localhost:3000/api/', // URL base da API
            'timeout'  => 5.0, // Timeout em segundos
        ]);
    }

    /**
     * Método para executar requisições GET
     *
     * @param string $endpoint Endpoint da API
     * @return array|null Resposta da API em formato de array ou null em caso de erro
     */
    public function execGet(string $endpoint) {
        try {
            $response = $this->client->get($endpoint);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            echo "Erro na requisição GET: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Método para executar requisições POST
     *
     * @param string $endpoint Endpoint da API
     * @param array $data Dados a serem enviados
     * @return array|null Resposta da API em formato de array ou null em caso de erro
     */
    public function execPost(string $endpoint, array $data) {
        try {
            $response = $this->client->post($endpoint, [
                'json' => $data, // Dados enviados como JSON
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            echo "Erro na requisição POST: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Método para executar requisições DELETE
     *
     * @param string $endpoint Endpoint da API
     * @return array|null Resposta da API em formato de array ou null em caso de erro
     */
    public function execDelete(string $endpoint) {
        try {
            $response = $this->client->delete($endpoint);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            echo "Erro na requisição DELETE: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Método para executar requisições PUT (se necessário)
     *
     * @param string $endpoint Endpoint da API
     * @param array $data Dados a serem enviados
     * @return array|null Resposta da API em formato de array ou null em caso de erro
     */
    public function execPut(string $endpoint, array $data) {
        try {
            $response = $this->client->put($endpoint, [
                'json' => $data,
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            echo "Erro na requisição PUT: " . $e->getMessage();
            return null;
        }
    }
}
