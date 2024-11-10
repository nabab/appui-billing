<?php

use bbn\X;
use bbn\Str;
use bbn\Accounting\Entity;
/** @var bbn\Mvc\Model $model */

if ($ctrl->hasArguments() && empty($ctrl->post['action'])) {
  $ctrl->addData([
    'action' => $ctrl->arguments[0]
  ]);
}

$ctrl->action();