<?php
if ( !empty($ctrl->post['id_media']) ){
  $ctrl->obj->file = $ctrl->get_model($ctrl->post)['pdf'];
}
