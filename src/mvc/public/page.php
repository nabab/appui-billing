<?php
/*
 * Describe what it does to show you're not that dumb!
 *
 **/

/** @var $ctrl \bbn\mvc\controller */

$ctrl->obj->url = APPUI_BILLING_ROOT . 'page';
$ctrl
  ->set_icon('fas fa-file-invoice')
  ->combo(_("Billing"), true);
