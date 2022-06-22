<?php

namespace Ibge\Src\Services;

use Exception;
use GuzzleHttp\Client;

class IbgeService
{
    const URL_IBGE = "https://servicodados.ibge.gov.br/api/v1/localidades/";
    const REGIONS = "regioes";
    const DISTRICTS = "distritos";
    const CITIES = "municipios";
    const STATES = "estados";

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Busca regioes da API.
     *
     * @return array
     */
    public function getRegions(): array
    {
        try {
            $response = $this->client->request('GET', self::URL_IBGE . self::REGIONS);
            $statusCode = $response->getStatusCode();

            if ($statusCode >= 200 && $statusCode < 400) {
                return json_decode($response->getBody()->getContents(), true);
            }

            return [];
        } catch (Exception $e) {
            print_r($e->getMessage());
            die;
        }
    }

    /**
     * Busca distritos da API.
     *
     * @return array
     */
    public function getDistricts(): array
    {
        try {
            $response = $this->client->request('GET', self::URL_IBGE . self::DISTRICTS);
            $statusCode = $response->getStatusCode();

            if ($statusCode >= 200 && $statusCode < 400) {
                return json_decode($response->getBody()->getContents(), true);
            }

            return [];
        } catch (Exception $e) {
            print_r($e->getMessage());
            die;
        }
    }

    /**
     * Busca municipios da API.
     *
     * @return array
     */
    public function getCities(): array
    {
        try {
            $response = $this->client->request('GET', self::URL_IBGE . self::CITIES);
            $statusCode = $response->getStatusCode();

            if ($statusCode >= 200 && $statusCode < 400) {
                return json_decode($response->getBody()->getContents(), true);
            }

            return [];
        } catch (Exception $e) {
            print_r($e->getMessage());
            die;
        }
    }

    /**
     * Busca estados da API.
     *
     * @return array
     */
    public function getStates(): array
    {
        try {
            $response = $this->client->request('GET', self::URL_IBGE . self::STATES);
            $statusCode = $response->getStatusCode();

            if ($statusCode >= 200 && $statusCode < 400) {
                return json_decode($response->getBody()->getContents(), true);
            }

            return [];
        } catch (Exception $e) {
            print_r($e->getMessage());
            die;
        }
    }
}
