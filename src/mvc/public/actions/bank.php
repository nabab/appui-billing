<?php

use bbn\X;
use bbn\Str;
use bbn\Accounting\Entity;
/** @var $model \bbn\Mvc\Model*/

if ($ctrl->hasArguments() && empty($ctrl->post['action'])) {
  $ctrl->addData([
    'action' => $ctrl->arguments[0]
  ]);
}

$ctrl->action();