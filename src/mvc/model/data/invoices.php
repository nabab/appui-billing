<?php
if ( isset($model->data['start'], $model->data['limit']) ){
  $grid = new \bbn\appui\grid($model->db, $model->data, [
    'tables' => ['bbn_invoices'],
    'fields' => array_merge($model->db->get_fields_list('bbn_invoices'), ['bbn_tasks_invoices.id_task']),
    'join' => [[
      'table' => 'bbn_tasks_invoices',
      'type' => 'left',
      'on' => [
        'conditions' => [[
          'field' => "bbn_tasks_invoices.id_invoice",
          'operator' => 'eq',
          'exp' => "bbn_invoices.id"
        ]]
      ]
    ]],
    'order' => [[
      'field' => 'ref',
      'dir' => 'DESC'
    ]]
  ]);

  if ( $grid->check() ){
    return $grid->get_datatable();
  }
}
