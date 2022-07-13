<?php
/**
 * What is my purpose?
 *
 **/

use bbn\X;
use bbn\Str;
use bbn\Accounting\Entity;
/** @var $model \bbn\Mvc\Model*/

$entities = new Entity($model->db);
return [
  'root' => APPUI_BILLING_ROOT,
  'entities' => $entities->rselectAll([])
];
