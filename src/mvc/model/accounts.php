<?php
/**
 * What is my purpose?
 *
 **/

use bbn\X;
use bbn\Str;
/** @var $model \bbn\Mvc\Model*/

$all = $model->db->rselectAll('bbn_accounting_accounts', []);
return [
  'data' => $all
];
