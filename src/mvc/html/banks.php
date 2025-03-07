<!-- HTML Document -->
<div class="bbn-overlay bbn-flex-height">
  <bbn-toolbar>
  	<div>
      <bbn-button @click="addBank"
                  icon="nf nf-fa-plus"
                  label="<?= _("New bank") ?>"/>
    </div>
  </bbn-toolbar>
  <div class="bbn-flex-fill">
    <bbn-table ref="table"
               :source="root + 'banks'"
               :url="root + 'actions/bank'"
               :data="{id_entity: source.id_entity}"
               editable="popup"
               :sortable="true">
    	<bbns-column field="id"
                   :invisible="true"
                   :editable="false"
                   label="<?= _("ID") ?>"/>
    	<bbns-column field="name"
                   label="<?= _("Name") ?>"/>
    </bbn-table>
  </div>
</div>

