<?php

namespace Ibge\Config\Routes;

use Ibge\Src\Actions\Api\GetRegionsAction;
use Ibge\Src\Actions\Api\GetStatesAction;
use Ibge\Src\Middlewares\JsonBodyParserMiddleware;
use Slim\Routing\RouteCollectorProxy;

$GLOBALS['app']->group('/external', function (RouteCollectorProxy $group) {
    $group->post('/regions', GetRegionsAction::class);
    $group->post('/states', GetStatesAction::class);
})->add(JsonBodyParserMiddleware::class);
