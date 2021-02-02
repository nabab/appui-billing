<?php
if ( !empty($model->data['id_media']) || !empty($model->data['id_invoice']) ){
  if ( empty($model->data['id_media']) ){
    $model->data['id_media'] = $model->db->selectOne('bbn_invoices', 'id_media', ['id' => $model->data['id_invoice']]);
  }
  if ( !empty($model->data['id_media']) ){
    $medias = new \bbn\Appui\Medias($model->db);
    return [
      'pdf' => $medias->getMedia($model->data['id_media'])
    ];
  }
}
