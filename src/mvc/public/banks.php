<?php

use bbn\X;
use bbn\Str;
/** @var bbn\Mvc\Controller $ctrl */

if (isset($ctrl->post['limit'])) {
  $ctrl->action();
}
elseif ($ctrl->hasArguments()) {
  $ctrl->addData(['id_entity' => $ctrl->arguments[0]])
    ->combo('$title', true);
}
