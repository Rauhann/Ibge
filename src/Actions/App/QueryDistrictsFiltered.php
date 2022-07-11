<?php

namespace Ibge\Src\Actions\App;

use Ibge\Src\Actions\Action;
use Ibge\Src\Models\DistrictModel;
use Psr\Http\Message\ServerRequestInterface;

class QueryDistrictsFiltered extends Action
{
    private $districtModel;

    public function __construct(DistrictModel $districtModel)
    {
        $this->districtModel = $districtModel;
    }

    public function __invoke(ServerRequestInterface $request, $response, $args)
    {
        $queryParams = $request->getQueryParams();
        $params = $request->getParsedBody();

        $columns = $queryParams['columns'] ?? [];
        $id = $params['id'] ?? null;
        $name = $params['name'] ?? null;
        $cityId = $params['city_id'] ?? null;
        $quantidade = $queryParams['quantidade'] ?? 100;
        $pagina = $queryParams['pagina'] ?? 1;

        $result = $this->districtModel->findFiltered(
            $columns,
            $id,
            $name,
            $cityId,
            $quantidade,
            $pagina
        );

        return $this->toJson($response, ['data' => $result]);
    }
}
