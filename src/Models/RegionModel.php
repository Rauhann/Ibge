<?php

namespace Ibge\Src\Models;

use Ibge\Src\Entities\Region;
use Ibge\Src\Services\IbgeService;

class RegionModel
{
    private IbgeService $ibgeService;
    private Region $regionEntity;

    public function __construct(
        IbgeService $ibgeService,
        Region $regionEntity
    ) {
        $this->ibgeService = $ibgeService;
        $this->regionEntity = $regionEntity;
    }

    /**
     * Retorna as regiões da API do IBGE.
     *
     * @return array
     */
    public function getRegionsOnApiAndSave(): array
    {
        $result = $this->ibgeService->getRegions();

        if ($result) {
            $this->saveRegions($result);
        }

        return $result;
    }

    /**
     * Salva as regioes no banco de dados.
     *
     * @param array $data
     * @return void
     */
    private function saveRegions(array $data): void
    {
        foreach ($data as $region) {
            $this->regionEntity->query("INSERT INTO regions (id,name,initials) VALUES (?,?,?)", [
                $region['id'],
                $region['nome'],
                $region['sigla']
            ]);
        }
    }
}
