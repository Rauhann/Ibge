<?php

namespace Ibge\Config\Routes;

use Ibge\Src\Actions\App\GetAdHocReportTables;
use Ibge\Src\Actions\App\QueryRegionsFiltered;
use Ibge\Src\Actions\App\QueryStatesFiltered;
use Ibge\Src\Actions\App\QueryCitiesFiltered;
use Ibge\Src\Actions\App\QueryDistrictsFiltered;
use Ibge\Src\Middlewares\JsonBodyParserMiddleware;
use Slim\Routing\RouteCollectorProxy;

$GLOBALS['app']->group('/reports', function (RouteCollectorProxy $group) {
    $group->get('/tables', GetAdHocReportTables::class);
    $group->post('/query-regions', QueryRegionsFiltered::class);
    $group->post('/query-states', QueryStatesFiltered::class);
    $group->post('/query-cities', QueryCitiesFiltered::class);
    $group->post('/query-districts', QueryDistrictsFiltered::class);
})
->add(JsonBodyParserMiddleware::class);
