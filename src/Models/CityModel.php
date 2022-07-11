<?php

namespace Ibge\Src\Models;

use Ibge\Src\Entities\City as CityEntity;
use Ibge\Src\Services\IbgeService;

class CityModel
{
    private IbgeService $ibgeService;
    private CityEntity $cityEntity;

    public function __construct(
        IbgeService $ibgeService,
        CityEntity $cityEntity
    ) {
        $this->ibgeService = $ibgeService;
        $this->cityEntity = $cityEntity;
    }

    /**
     * Retorna os municipios da API do IBGE.
     *
     * @return array
     */
    public function getCitiesOnApiAndSave(): array
    {
        $result = $this->ibgeService->getCities();

        if ($result) {
            $this->saveCities($result);
        }

        return $result;
    }

    public function findFiltered(
        array $columns,
        ?int $id,
        ?string $name,
        ?int $stateId,
        int $pageSize = 100,
        int $pageNumber = 1
    ) {
        $result = $this->cityEntity->findFiltered($columns, $id, $name, $stateId, $pageSize, $pageNumber);

        if (!$result) {
            return [];
        }
        return $result;
    }

    /**
     * Salva os municipios no banco de dados.
     *
     * @param array $data
     * @return void
     */
    private function saveCities(array $cities): void
    {
        foreach ($cities as $city) {
            $this->cityEntity->query("INSERT INTO cities (id,name,state_id) VALUES (?,?,?)", [
                $city['id'],
                $city['nome'],
                $city['microrregiao']['mesorregiao']['UF']['id']
            ]);
        }
    }
}
