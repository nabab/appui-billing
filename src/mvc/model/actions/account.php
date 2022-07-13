<?php
/**
 * What is my purpose?
 *
 **/

use bbn\X;
use bbn\Str;
use bbn\Accounting\Account;
/** @var $model \bbn\Mvc\Model*/

if ($model->hasData('action', true)) {
  switch($model->data['action']) {
    case 'insert':
      if ($model->hasData(['id_entity', 'name', 'id_bank'], true)) {
        $acc = new Account($model->db);
        if ($id = $acc->insert([
          'name' => $model->data['name'],
          'id_entity' => $model->data['id_entity'],
          'id_bank' => $model->data['id_bank'],
          'account_number' => $model->data['account_number']
        ])) {
          return [
            'success' => true,
            'data' => $acc->rselect($id)
          ];
        }
        else {
          $model->data['res']['last'] = $model->db->last();
        }
      }
      break;

    case 'update':
      break;

    case 'delete':
      break;
  }

}

return $model->data['res'] ?? [];
