<?php
/**
 * What is my purpose?
 *
 **/

use bbn\X;
use bbn\Str;
use bbn\Accounting\Entity;
/** @var bbn\Mvc\Model $model */

if ($model->hasData('action', true)) {
  switch($model->data['action']) {
    case 'insert':
      if ($model->hasData(['name', 'owner', 'id_country'], true)) {
        $entities = new Entity($model->db);
        if ($id = $entities->insert([
          'name' => $model->data['name'],
          'owner' => $model->data['owner'],
          'id_country' => $model->data['id_country'],
          'id_address' => $model->data['id_address'] ?? null,
          'tax_number' => $model->data['tax_number'] ?? ''
        ])) {
          return [
            'success' => true,
            'data' => $entities->select($id)
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
