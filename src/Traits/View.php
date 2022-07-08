<?php

namespace Ibge\Src\Traits;

use Slim\Psr7\Response;

trait View
{
    /**
     * Undocumented function
     *
     * @param string $view
     * @param array $data
     * @return Response
     */
    public function toView(string $view, array $data): Response
    {
        print_r($GLOBALS['blade']->render($view, $data));
        die;
    }
}
