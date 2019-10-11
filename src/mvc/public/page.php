<?php
/*
 * Describe what it does to show you're not that dumb!
 *
 **/

/** @var $ctrl \bbn\mvc\controller */

$ctrl->obj->url = APPUI_BILLING_ROOT . 'page';
$ctrl
  ->set_icon('nf nf-mdi-file_document')
  ->combo(_("Billing"), true);
