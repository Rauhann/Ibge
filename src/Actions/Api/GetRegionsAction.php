<?php

namespace Ibge\Src\Actions\Api;

use Exception;
use Ibge\Src\Actions\Action;
use Ibge\Src\Models\RegionModel;
use Slim\Psr7\Response;

class GetRegionsAction extends Action
{
    private RegionModel $regionModel;

    public function __construct(RegionModel $regionModel)
    {
        $this->regionModel = $regionModel;
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
        $result = $this->regionModel->getRegionsOnApiAndSave();

        return $this->toJson($response, ["data" => $result]);
    }
}