<?php
/**
 * What is my purpose?
 *
 **/

use bbn\X;
use bbn\Str;
use bbn\Accounting\Bank;
/** @var $model \bbn\Mvc\Model*/

if ($model->hasData('action', true)) {
  switch($model->data['action']) {
    case 'insert':
      if ($model->hasData(['name'], true)) {
        $bank = new Bank($model->db);
        if ($id = $bank->insert([
          'name' => $model->data['name'],
          'id_address' => $model->data['id_address'] ?? null
        ])) {
          return [
            'success' => true,
            'data' => $bank->select($id)
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
