<?php

namespace Ibge\Src\Actions\App;

use Ibge\Src\Actions\Action;
use Ibge\Src\Models\CityModel;
use Psr\Http\Message\ServerRequestInterface;

class QueryCitiesFiltered extends Action
{
    private $cityModel;

    public function __construct(CityModel $cityModel)
    {
        $this->cityModel = $cityModel;
    }

    public function __invoke(ServerRequestInterface $request, $response, $args)
    {
        $queryParams = $request->getQueryParams();
        $params = $request->getParsedBody();

        $columns = $queryParams['columns'] ?? [];
        $id = $params['id'] ?? null;
        $name = $params['name'] ?? null;
        $stateId = $params['state_id'] ?? null;
        $quantidade = $queryParams['quantidade'] ?? 100;
        $pagina = $queryParams['pagina'] ?? 1;

        $result = $this->cityModel->findFiltered(
            $columns,
            $id,
            $name,
            $stateId,
            $quantidade,
            $pagina
        );

        return $this->toJson($response, ['data' => $result]);
    }
}
