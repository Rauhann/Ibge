<?php

namespace Ibge\Src\Actions\App;

use Ibge\Src\Actions\Action;
use Ibge\Src\Models\RegionModel;

class GetAdHocReportAction extends Action
{
    private RegionModel $regionModel;

    public function __construct(RegionModel $regionModel)
    {
        $this->regionModel = $regionModel;
    }

    public function __invoke($request, $response, $args)
    {
        $fields = $this->regionModel->getAllRegions();

        return $this->toView('ad-hoc', ['regions' => $fields]);
    }
}