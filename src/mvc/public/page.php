<?php

/** @var $ctrl \bbn\Mvc\Controller */

$ctrl->obj->url = APPUI_BILLING_ROOT . 'page';
$ctrl
  ->setIcon('nf nf-mdi-file_document')
  ->combo(_("Billing"), true);
