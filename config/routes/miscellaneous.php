<?php

namespace Ibge\Src\Routes;

use Ibge\Src\Actions\HomeAction;

$GLOBALS['app']->get('/', HomeAction::class);