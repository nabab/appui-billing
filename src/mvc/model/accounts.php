<?php
/**
 * What is my purpose?
 *
 **/

use bbn\X;
use bbn\Str;
/** @var bbn\Mvc\Model $model */

$all = $model->db->rselectAll('bbn_accounting_accounts', []);
return [
  'data' => $all
];
