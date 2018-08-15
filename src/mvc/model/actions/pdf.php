<?php
if ( !empty($model->data['id_media']) || !empty($model->data['id_invoice']) ){
  if ( empty($model->data['id_media']) ){
    $model->data['id_media'] = $model->db->select_one('bbn_invoices', 'id_media', ['id' => $model->data['id_invoice']]);
  }
  if ( !empty($model->data['id_media']) ){
    $medias = new \bbn\appui\medias($model->db);
    return [
      'pdf' => $medias->get_media($model->data['id_media'])
    ];
  }
}
