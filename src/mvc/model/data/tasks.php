<?php
if (
  isset($model->data['limit'], $model->data['start']) &&
  ($closed_opt = $model->inc->options->from_code('closed', 'states', 'tasks', 'appui')) &&
  ($close_opt = $model->inc->options->from_code('task_close', 'actions', 'tasks', 'appui')) &&
  ($approve_opt = $model->inc->options->from_code('price_approved', 'actions', 'tasks', 'appui')) &&
  ($price_opt = $model->inc->options->from_code('price_update', 'actions', 'tasks', 'appui'))
){
  // $grid = new \bbn\appui\grid($model->db, $model->data, [
  //   'query' => "
  //     SELECT bbn_tasks.*,
  //       MAX(log_close.chrono) AS close_date, log_close.id_user AS close_user,
  //       MAX(log_approve.chrono) AS approve_date, log_approve.id_user AS approve_user,
  //       MAX(log_price.chrono) AS price_date
  //     FROM bbn_tasks
  //       LEFT JOIN bbn_tasks_invoices
  //         ON bbn_tasks_invoices.id_task = bbn_tasks.id
  //       JOIN bbn_tasks_logs AS log_close
  //         ON log_close.id_task = bbn_tasks.id
  //       JOIN bbn_tasks_logs AS log_approve
  //         ON log_approve.id_task = bbn_tasks.id
  //       LEFT JOIN bbn_tasks_logs AS log_price
  //         ON log_price.id_task = bbn_tasks.id
  //         AND log_price.action = UNHEX('".$price_opt."')
  //   ",
  //   'count' => "
  //     SELECT COUNT(DISTINCT bbn_tasks.id)
  //     FROM bbn_tasks
  //       LEFT JOIN bbn_tasks_invoices
  //         ON bbn_tasks_invoices.id_task = bbn_tasks.id
  //       JOIN bbn_tasks_logs AS log_close
  //         ON log_close.id_task = bbn_tasks.id
  //       JOIN bbn_tasks_logs AS log_approve
  //         ON log_approve.id_task = bbn_tasks.id
  //       LEFT JOIN bbn_tasks_logs AS log_price
  //         ON log_price.id_task = bbn_tasks.id
  //         AND log_price.action = UNHEX('".$price_opt."')
  //   ",
  //   'order' => [[
  //     'field' => 'close_date',
  //     'dir' => 'DESC'
  //   ]],
  //   'filters' => [[
  //     'field' => 'bbn_tasks_invoices.id_invoice',
  //     'operator' => 'isnull'
  //   ], [
  //     'field' => 'bbn_tasks.state',
  //     'operator' => 'eq',
  //     'value' => $closed_opt
  //   ], [
  //     'field' => 'bbn_tasks.price',
  //     'operator' => 'isnotnull'
  //   ], [
  //     'field' => 'log_close.action',
  //     'operator' => 'eq',
  //     'value' => $close_opt
  //   ], [
  //     'field' => 'log_approve.action',
  //     'operator' => 'eq',
  //     'value' => $approve_opt
  //   ], [
  //     'field' => 'bbn_tasks.active',
  //     'operator' => 'eq',
  //     'value' => 1
  //   ], [
  //     'conditions' => [[
  //       'field' => 'log_price.chrono',
  //       'operator' => 'isnull'
  //     ], [
  //       'field' => 'log_approve.chrono',
  //       'operator' => 'gte',
  //       'exp' => 'log_price.chrono'
  //     ]],
  //     'logic' => 'OR'
  //   ]],
  //   'group_by' => 'bbn_tasks.id'
  // ]);
  //
  // if ( $grid->check() ){
  //   return $grid->get_datatable();
  // }

  return [
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
}
