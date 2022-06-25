<?php

namespace Ibge\Config\Routes;

use Ibge\Src\Actions\Api\GetCitiesAction;
use Ibge\Src\Actions\Api\GetDistrictsAction;
use Ibge\Src\Actions\Api\GetRegionsAction;
use Ibge\Src\Actions\Api\GetStatesAction;
use Ibge\Src\Middlewares\JsonBodyParserMiddleware;
use Slim\Routing\RouteCollectorProxy;

$GLOBALS['app']->group('/external', function (RouteCollectorProxy $group) {
    $group->post('/regions', GetRegionsAction::class);
    $group->post('/states', GetStatesAction::class);
    $group->post('/cities', GetCitiesAction::class);
    $group->post('/districts', GetDistrictsAction::class);
})->add(JsonBodyParserMiddleware::class);
