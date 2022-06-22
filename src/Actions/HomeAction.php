<?php

namespace Ibge\Src\Actions;

use Slim\Psr7\Response;

class HomeAction extends Action
{
    /**
     * @param $request
     * @param $response
     * @param $args
     * @return Response
     */
    public function __invoke($request, $response, $args): Response
    {
        return $this->toJson($response, ['message' => "It's work"]);
    }
}