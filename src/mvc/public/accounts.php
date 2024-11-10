<?php

use bbn\X;
use bbn\Str;
/** @var bbn\Mvc\Controller $ctrl */

$ctrl->setUrl($ctrl->pluginUrl('appui-billing') . '/accounts')->combo(_("Accounts management"), true);
