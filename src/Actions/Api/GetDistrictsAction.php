<?php

namespace Ibge\Src\Actions\Api;

use Exception;
use Ibge\Src\Actions\Action;
use Ibge\Src\Models\DistrictModel;
use Slim\Psr7\Response;

class GetDistrictsAction extends Action
{
    private DistrictModel $districtModel;

    public function __construct(DistrictModel $districtModel)
    {
        $this->districtModel = $districtModel;
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
        $result = $this->districtModel->getDistrictsOnApiAndSave();

        return $this->toJson($response, ["data" => $result]);
    }
}