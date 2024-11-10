<?php
/**
 * What is my purpose?
 *
 **/

use bbn\X;
use bbn\Str;
use bbn\Accounting\Bank;
use bbn\Accounting\Entity;
/** @var bbn\Mvc\Model $model */


if ($model->hasData(['limit', 'data']) && !empty($model->data['data']['id_entity'])) {
  $banks = new Bank($model->db);
  $e = new Entity($model->db);
  $entity = $e->rselect($model->data['data']['id_entity']);
  $data = $banks->rselectAll([/*'id_entity' => $model->data['id_entity']*/]);
  return [
    'data' => $data,
    'total' => count($data)
  ];
}
elseif ($model->hasData('id_entity')) {
  $banks = new Bank($model->db);
  $e = new Entity($model->db);
  $entity = $e->rselect($model->data['id_entity']);
  return [
    'title' => sprintf(_("Banks from %s"), $entity['name']),
    'id_entity' => $model->data['id_entity']
  ];
}
