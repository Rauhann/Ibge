<?php

namespace Ibge\Src\Actions\App;

use Ibge\Src\Actions\Action;
use Ibge\Src\Models\StateModel;
use Psr\Http\Message\ServerRequestInterface;

class QueryStatesFiltered extends Action
{
    private $stateModel;

    public function __construct(StateModel $stateModel)
    {
        $this->stateModel = $stateModel;
    }

    public function __invoke(ServerRequestInterface $request, $response, $args)
    {
        $queryParams = $request->getQueryParams();
        $params = $request->getParsedBody();

        $columns = $queryParams['columns'] ?? [];
        $id = $params['id'] ?? null;
        $name = $params['name'] ?? null;
        $initials = $params['initials'] ?? null;
        $regionId = $params['region_id'] ?? null;
        $quantidade = $queryParams['quantidade'] ?? 100;
        $pagina = $queryParams['pagina'] ?? 1;

        $result = $this->stateModel->findFiltered(
            $columns,
            $id,
            $name,
            $initials,
            $regionId,
            $quantidade,
            $pagina
        );

        return $this->toJson($response, ['data' => $result]);
    }
}
