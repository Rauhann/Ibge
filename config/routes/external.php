<?php

namespace Ibge\Config\Routes;

use Ibge\Src\Actions\Api\GetRegionsAction;
use Ibge\Src\Middlewares\JsonBodyParserMiddleware;
use Slim\Routing\RouteCollectorProxy;

$GLOBALS['app']->group('/external', function (RouteCollectorProxy $group) {
    $group->post('/regions', GetRegionsAction::class);
})->add(JsonBodyParserMiddleware::class);
