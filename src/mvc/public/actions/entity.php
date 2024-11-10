<?php

use bbn\X;
use bbn\Str;
use bbn\Accounting\Entity;
/** @var bbn\Mvc\Model $model */

if ($ctrl->hasArguments()) {
  $ctrl->addData([
    'action' => $ctrl->arguments[0]
  ])->action();
}