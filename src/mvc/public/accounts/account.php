<?php

use bbn\X;
use bbn\Str;
/** @var bbn\Mvc\Controller $ctrl */

if (!defined('BBN_BASEURL') || empty(BBN_BASEURL)) {
  $ctrl->addToObj(APPUI_BILLING_ROOT . 'accounts');
}
elseif ($ctrl->hasArguments()) {
  $ctrl->addData([
    'id_account' => $ctrl->arguments[0]
  ])
    ->combo('$name', true);
}
