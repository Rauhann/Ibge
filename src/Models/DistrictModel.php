<?php

namespace Ibge\Src\Models;

use Ibge\Src\Entities\District as DistrictEntity;
use Ibge\Src\Services\IbgeService;

class DistrictModel
{
    private IbgeService $ibgeService;
    private DistrictEntity $districtEntity;

    public function __construct(
        IbgeService $ibgeService,
        DistrictEntity $districtEntity
    ) {
        $this->ibgeService = $ibgeService;
        $this->districtEntity = $districtEntity;
    }

    /**
     * Retorna os distritos da API do IBGE.
     *
     * @return array
     */
    public function getDistrictsOnApiAndSave(): array
    {
        $result = $this->ibgeService->getDistricts();

        if ($result) {
            $this->saveDistricts($result);
        }

        return $result;
    }

    /**
     * Salva os distritos no banco de dados.
     *
     * @param array $data
     * @return void
     */
    private function saveDistricts(array $districts): void
    {
        foreach ($districts as $district) {
            $this->districtEntity->query("INSERT INTO districts (id,name,city_id) VALUES (?,?,?)", [
                $district['id'],
                $district['nome'],
                $district['municipio']['id']
            ]);
        }
    }
}
