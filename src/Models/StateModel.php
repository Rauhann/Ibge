<?php

namespace Ibge\Src\Models;

use Ibge\Src\Entities\State;
use Ibge\Src\Services\IbgeService;

class StateModel
{
    private IbgeService $ibgeService;
    private State $stateEntity;

    public function __construct(
        IbgeService $ibgeService,
        State $stateEntity
    ) {
        $this->ibgeService = $ibgeService;
        $this->stateEntity = $stateEntity;
    }

    /**
     * Retorna os estados da API do IBGE.
     *
     * @return array
     */
    public function getStatesOnApiAndSave(): array
    {
        $result = $this->ibgeService->getStates();

        if ($result) {
            $this->saveStates($result);
        }

        return $result;
    }

    /**
     * Salva os estados no banco de dados.
     *
     * @param array $data
     * @return void
     */
    private function saveStates(array $data): void
    {
        foreach ($data as $state) {
            $this->stateEntity->query("INSERT INTO states (id,name,initials,region_id) VALUES (?,?,?,?)", [
                $state['id'],
                $state['nome'],
                $state['sigla'],
                $state['regiao']['id']
            ]);
        }
    }
}
