<?php

namespace Ibge\Src\Actions\App;

use Ibge\Src\Actions\Action;

class GetAdHocReportTables extends Action
{
    const TABLE_INFO = [
        'municipios' => [
            'table' => 'cities',
            'columns' => [
                'id',
                'name',
                'state_id'
            ]
        ],
        'regioes' => [
            'table' => 'regions',
            'columns' => [
                'id',
                'name',
                'initials'
            ]
        ],
        'estados' =>
        [
            'table' => 'states',
            'columns' => [
                'id',
                'name',
                'initials',
                'region_id',
            ]
        ],
        'distritos' =>
        [
            'table' => 'districts',
            'columns' => [
                'id',
                'name',
                'initials',
                'region_id'
            ]
        ],
    ];

    public function __construct()
    {
    }

    public function __invoke($request, $response, $args)
    {

        return $this->toJson($response, ['data' => self::TABLE_INFO]);
    }
}