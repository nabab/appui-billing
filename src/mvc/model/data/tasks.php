<?php
if (
  isset($model->data['limit'], $model->data['start']) &&
  ($closed_opt = \bbn\appui\tasks::get_appui_option_id('closed', 'states')) &&
  ($close_opt = \bbn\appui\tasks::get_appui_option_id('task_close', 'actions')) &&
  ($approve_opt = \bbn\appui\tasks::get_appui_option_id('price_approved', 'actions')) &&
  ($price_opt = \bbn\appui\tasks::get_appui_option_id('price_update', 'actions'))
){
/*  return [
    'data' => $model->db->get_rows("
      SELECT bbn_tasks.*,
        MAX(log_close.chrono) AS close_date, log_close.id_user AS close_user,
        MAX(log_approve.chrono) AS approve_date, log_approve.id_user AS approve_user,
        MAX(log_price.chrono) AS price_date
      FROM bbn_tasks
        LEFT JOIN bbn_tasks_invoices
          ON bbn_tasks_invoices.id_task = bbn_tasks.id
        JOIN bbn_tasks_logs AS log_close
          ON log_close.id_task = bbn_tasks.id
        JOIN bbn_tasks_logs AS log_approve
          ON log_approve.id_task = bbn_tasks.id
        LEFT JOIN bbn_tasks_logs AS log_price
          ON log_price.id_task = bbn_tasks.id
          AND log_price.action = ?
      WHERE  (
      	bbn_tasks_invoices.id_invoice IS NULL
      	AND bbn_tasks.state = ?
      	AND bbn_tasks.price IS NOT NULL
      	AND log_close.action = ?
      	AND log_approve.action = ?
      	AND bbn_tasks.active = 1
      )
      GROUP BY bbn_tasks.id
      HAVING (
        close_date > approve_date
      	AND (
      		price_date IS NULL
      		OR approve_date > price_date
      	)
      )
      ORDER BY close_date DESC ",
      hex2bin($price_opt),
      hex2bin($closed_opt),
      hex2bin($close_opt),
      hex2bin($approve_opt)
    )
  ];
*/

  $grid = new \bbn\appui\grid($model->db, $model->data, [
    'tables' => ['bbn_tasks'],
    'fields' => [
      'bbn_tasks.id',
      'bbn_tasks.type',
      'bbn_tasks.id_parent',
      'bbn_tasks.id_user',
      'bbn_tasks.title',
      'bbn_tasks.state',
      'bbn_tasks.priority',
      'bbn_tasks.id_alias',
      'bbn_tasks.creation_date',
      'bbn_tasks.deadline',
      'bbn_tasks.price',
      'bbn_tasks.private',
      'bbn_tasks.active',
      'close_date' => "MAX(log_close.chrono)",
      'close_user' => "log_close.id_user",
      'approve_date' => "MAX(log_approve.chrono)",
      'approve_user' => "log_approve.id_user",
      'price_date' => "MAX(log_price.chrono)"
    ],
    'join' => [[
      'table' => 'bbn_tasks_invoices',
      'type' => 'left',
      'on' => [
        'logic' => "AND",
        'conditions' => [[
          'field' => "bbn_tasks_invoices.id_task",
          'operator' => 'eq',
          'exp' => "bbn_tasks.id"
        ]]
      ]
    ], [
      'table' => 'bbn_tasks_logs',
      'alias' => 'log_close',
      'on' => [
        'logic' => "AND",
        'conditions' => [[
          'field' => "log_close.id_task",
          'operator' => 'eq',
          'exp' => "bbn_tasks.id"
        ]]
      ]
    ], [
      'table' => 'bbn_tasks_logs',
      'alias' => 'log_approve',
      'on' => [
        'logic' => "AND",
        'conditions' => [[
          'field' => "log_approve.id_task",
          'operator' => 'eq',
          'exp' => "bbn_tasks.id"
        ]]
      ]
    ], [
      'table' => 'bbn_tasks_logs',
      'alias' => 'log_price',
      'type' => 'left',
      'on' => [
        'logic' => 'AND',
        'conditions' => [[
          'field' => "log_price.id_task",
          'operator' => 'eq',
          'exp' => "bbn_tasks.id"
        ], [
          'field' => "log_price.action",
          'operator' => 'eq',
          'value' => $price_opt
        ]]
      ]
    ]],
    'filters' => [
      'logic' => 'AND',
      'conditions' => [[
        'field' => 'bbn_tasks_invoices.id_invoice',
        'operator' => 'isnull'
      ], [
        'field' => 'bbn_tasks.state',
        'operator' => 'eq',
        'value' => $closed_opt
      ], [
        'field' => 'bbn_tasks.price',
        'operator' => 'isnotnull'
      ], [
        'field' => 'log_close.action',
        'operator' => 'eq',
        'value' => $close_opt
      ], [
        'field' => 'log_approve.action',
        'operator' => 'eq',
        'value' => $approve_opt
      ], [
        'field' => 'bbn_tasks.active',
        'operator' => 'eq',
        'value' => 1
      ]]
    ],
    'group_by' => ['bbn_tasks.id'],
    'having' => [
      'logic' => 'AND',
      'conditions' => [[
        'field' => "close_date",
        'operator' => '>',
        'exp' => "approve_date"
      ], [
        'logic' => 'OR',
        'conditions' => [[
          'field' => 'price_date',
          'operator' => 'isnull'
        ], [
          'field' => 'approve_date',
          'operator' => '>',
          'exp' => "price_date"
        ]]
      ]]
    ],
    'order' => [
      'field' => 'close_date',
      'dir' => 'DESC'
    ],
  ]);

  if ( $grid->check() ){
    return $grid->get_datatable();
  }
}
