<?php

namespace Ibge\Src\Actions\App;

use Ibge\Src\Actions\Action;
use Ibge\Src\Models\RegionModel;
use Psr\Http\Message\ServerRequestInterface;

class QueryRegionsFiltered extends Action
{

    private $regionModel;

    public function __construct(RegionModel $regionModel)
    {
        $this->regionModel = $regionModel;
    }

    public function __invoke(ServerRequestInterface $request, $response, $args)
    {
        $queryParams = $request->getQueryParams();
        $params = $request->getParsedBody();

        $columns = $queryParams['columns'] ?? [];
        $id = $params['id'] ?? null;
        $name = $params['name'] ?? null;
        $initials = $params['initials'] ?? null;
        $quantidade = $queryParams['quantidade'] ?? 100;
        $pagina = $queryParams['pagina'] ?? 1;

        $result = $this->regionModel->findFiltered(
            $columns,
            $id,
            $name,
            $initials,
            $quantidade,
            $pagina
        );

        return $this->toJson($response, ['data' => $result]);
    }
}
