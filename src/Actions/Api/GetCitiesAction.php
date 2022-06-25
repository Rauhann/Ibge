<?php

namespace Ibge\Src\Actions\Api;

use Exception;
use Ibge\Src\Actions\Action;
use Ibge\Src\Models\CityModel;
use Slim\Psr7\Response;

class GetCitiesAction extends Action
{
    private CityModel $cityModel;

    public function __construct(CityModel $cityModel)
    {
        $this->cityModel = $cityModel;
    }

    /**
     * @param $request
     * @param $response
     * @param $args
     * @return Response
     * @throws Exception
     */
    public function __invoke($request, $response, $args): Response
    {
        $result = $this->cityModel->getCitiesOnApiAndSave();

        return $this->toJson($response, ["data" => $result]);
    }
}