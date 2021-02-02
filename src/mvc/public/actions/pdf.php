<?php
if ( !empty($ctrl->post['id_media']) ){
  $ctrl->obj->file = $ctrl->getModel($ctrl->post)['pdf'];
}
