<?php
/**
 * What is my purpose?
 *
 **/

use bbn\X;
use bbn\Str;
/** @var $model \bbn\Mvc\Model*/

if ($model->hasData(['id_account'])) {
  return $model->db->rselect('bbn_accounting_accounts', [], ['id' => $model->data['id_account']]);
  
}

