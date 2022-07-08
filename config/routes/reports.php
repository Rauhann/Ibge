<?php

namespace Ibge\Config\Routes;

use Ibge\Src\Actions\App\GetAdHocReportAction;
use Ibge\Src\Middlewares\JsonBodyParserMiddleware;
use Slim\Routing\RouteCollectorProxy;

$GLOBALS['app']->group('/reports', function (RouteCollectorProxy $group) {
    $group->get('', GetAdHocReportAction::class);
})->add(JsonBodyParserMiddleware::class);
