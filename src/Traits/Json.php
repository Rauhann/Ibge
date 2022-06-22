<?php

namespace Ibge\Src\Traits;

use Slim\Psr7\Response;

trait Json
{
    /**
     * @param Response $response
     * @param array $data
     * @param int $statusCode
     * @return Response
     */
    public function toJson(Response $response, array $data = [], int $statusCode = 200): Response
    {
        $response->getBody()->write(json_encode($data, JSON_UNESCAPED_UNICODE));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($statusCode);
    }
}
