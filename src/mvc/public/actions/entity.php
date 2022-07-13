<?php

use bbn\X;
use bbn\Str;
use bbn\Accounting\Entity;
/** @var $model \bbn\Mvc\Model*/

if ($ctrl->hasArguments()) {
  $ctrl->addData([
    'action' => $ctrl->arguments[0]
  ])->action();
}