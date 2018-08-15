<?php
if ( isset($model->data['start'], $model->data['limit']) ){
  $grid = new \bbn\appui\grid($model->db, $model->data, [
    'query' => "
      SELECT bbn_invoices.*, bbn_tasks_invoices.id_task
      FROM bbn_invoices
        LEFT JOIN bbn_tasks_invoices
          ON bbn_tasks_invoices.id_invoice = bbn_invoices.id
    ",
    'count' => "
      SELECT COUNT(id)
      FROM bbn_invoices
    ",
    'order' => [[
      'field' => 'ref',
      'dir' => 'DESC'
    ]]
  ]);

  if ( $grid->check() ){
    return $grid->get_datatable();
  }  
}
