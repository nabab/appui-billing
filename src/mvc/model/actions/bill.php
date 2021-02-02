<?php
if (
  !empty($model->data['ref']) &&
  !empty($model->data['creation']) &&
  !empty($model->data['description']) &&
  !empty($model->data['tax']) &&
  !empty($model->data['taxable']) &&
  !empty($model->data['amount']) &&
  !$model->db->selectOne('bbn_invoices', 'id', ['ref' => $model->data['ref']]) &&
  $model->db->insert('bbn_invoices', [
    'ref' => (int)$model->data['ref'],
    'creation' => $model->data['creation'],
    'description' => $model->data['description'],
    'tax' => $model->data['tax'],
    'taxable' => $model->data['taxable'],
    'amount' => $model->data['amount']
  ]) &&
  ($id_invoice = $model->db->lastId())
){
  $path = $model->dataPath('appui-billing');
  $medias = new \bbn\Appui\Medias($model->db);
  $pdf = new \bbn\File\Pdf([
    'template' => $path.'paper.pdf',
    'mgt' => 60,
    'mgl'=> 0,
    'mgr' => 0,
    'mgb' => 40
  ]);
  // Make page text
  $template = file_get_contents($path.'template.html');
  $template = str_replace('{{creation}}', Date('d M Y', Strtotime($model->data['creation'])), $template);
  $template = str_replace('{{ref}}', $model->data['ref'], $template);
  if ( !empty($model->data['approved']) ){
    $template = str_replace('{{show_approved}}', 'table-cell', $template);
    $template = str_replace('{{approvedby}}', $model->data['approved']['user'], $template);
    $template = str_replace('{{approvedon}}', $model->data['approved']['moment'], $template);
  }
  else {
    $template = str_replace('{{show_approved}}', 'none', $template);
  }
  $year = date('Y', Strtotime($model->data['creation']));
  $template = str_replace('{{year}}', $year, $template);
  $template = str_replace('{{description}}', $model->data['description'], $template);
  $template = str_replace('{{taxable}}', number_format((float)$model->data['taxable'], 2, ',', '.') .' €', $template);
  $template = str_replace('{{tax}}', $model->data['tax'], $template);
  $template = str_replace('{{tax_amount}}', number_format((float)($model->data['taxable'] * $model->data['tax'] / 100), 2, ',', '.').' €', $template);
  $template = str_replace('{{amount}}', number_format((float)$model->data['amount'], 2, ',', '.').' €', $template);
  // Save pdf into tmp path
  $pdf->addPage($template);
  $file = $path.'tmp/'.$year.'-'.$model->data['ref'].'_invoice.pdf';
  $pdf->save($file);

  if (
    ($id_media = $medias->insert($file)) &&
    $model->db->update('bbn_invoices', ['id_media' => $id_media], ['id' => $id_invoice])
  ){
    \bbn\File\Dir::delete($file);
    return [
      'success' => true,
      'data' => $model->db->rselect('bbn_invoices', [], ['id' => $id_invoice])
    ];
  }
}
return ['success' => false];
