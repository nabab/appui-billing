<?php
/**
 * What is my purpose?
 *
 **/

use bbn\X;
use bbn\Str;
use bbn\Accounting\Account;
use bbn\Accounting\Bank;
use bbn\Accounting\Entity;
/** @var bbn\Mvc\Model $model */

if ($model->hasData(['limit', 'data']) && !empty($model->data['data']['id_entity'])) {
  $accounts = new Account($model->db);
  return [
    'data' => $accounts->rselectAll(['id_entity' => $model->data['data']['id_entity']])
  ];
}
elseif ($model->hasData('id_entity')) {
  $e = new Entity($model->db);
  $entity = $e->rselect($model->data['id_entity']);
  $banks = new Bank($model->db);
  return [
    'id_entity' => $model->data['id_entity'],
    'banks' => $banks->rselectAll([/*'id_entity' => $model->data['id_entity']*/]),
    'title' => sprintf(_("Accounts from %s"), $entity['name'])
  ];
}
