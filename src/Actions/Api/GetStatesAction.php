<?php

namespace Ibge\Src\Actions\Api;

use Exception;
use Ibge\Src\Actions\Action;
use Ibge\Src\Models\StateModel;
use Slim\Psr7\Response;

class GetStatesAction extends Action
{
    private StateModel $stateModel;

    public function __construct(StateModel $stateModel)
    {
        $this->stateModel = $stateModel;
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
        $result = $this->stateModel->getStatesOnApiAndSave();

        return $this->toJson($response, ["data" => $result]);
    }
}