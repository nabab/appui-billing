<?php

use bbn\X;
use bbn\Str;
/** @var $ctrl \bbn\Mvc\Controller */

$ctrl->setUrl($ctrl->pluginUrl('appui-billing') . '/accounts')->combo(_("Accounts management"), true);
