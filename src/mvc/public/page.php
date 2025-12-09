<?php

/** @var bbn\Mvc\Controller $ctrl */

$ctrl->obj->url = APPUI_BILLING_ROOT . 'page';
$ctrl
  ->setIcon('nf nf-md-file_document')
  ->combo(_("Billing"), true);
