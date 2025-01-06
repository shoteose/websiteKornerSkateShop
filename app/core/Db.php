<?php

namespace app\core;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Db
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost:3000/api/', // URL base da API
            'timeout'  => 5.0, 
        ]);
    }


    public function execGet(string $endpoint)
    {
        try {
            $response = $this->client->get($endpoint);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            $mes = $e->getMessage();
            return $mes;
        }
    }


    public function execPost(string $endpoint, array $data)
    {
        try {
            $response = $this->client->post($endpoint, [
                'json' => $data, // Dados enviados como JSON
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Verifica se há uma resposta da API no erro
            $errorResponse = $e->getResponse();
            if ($errorResponse) {
                $errorBody = json_decode($errorResponse->getBody()->getContents(), true);
                return [
                    'error' => true,
                    'message' => $errorBody['message'] ?? 'Erro desconhecido.'
                ];
            }
            // Caso não haja uma resposta da API, retorna um erro genérico
            return [
                'error' => true,
                'message' => 'Erro ao se conectar com o servidor.'
            ];
        }
    }


    public function execDelete(string $endpoint)
    {
        try {
            $response = $this->client->delete($endpoint);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            echo "Erro na requisição DELETE: " . $e->getMessage();
            return null;
        }
    }


    public function execPut(string $endpoint, array $data)
    {
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
