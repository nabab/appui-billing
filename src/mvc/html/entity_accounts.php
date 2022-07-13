<!-- HTML Document -->
<div class="bbn-overlay bbn-flex-height">
  <bbn-toolbar>
  	<div>
      <bbn-button @click="addAccount"
                  icon="nf nf-fa-plus"
                  text="<?= _("New account") ?>"/>
    </div>
  </bbn-toolbar>
  <div class="bbn-flex-fill">
    <bbn-table ref="table"
               :source="root + 'entity_accounts'"
               :url="root + 'actions/account'"
               :data="{id_entity: source.id_entity}"
               editable="popup"
               :sortable="true">
    	<bbns-column field="id"
                   :hidden="true"
                   title="<?= _("ID") ?>"
                   :editable="false"/>
    	<bbns-column field="name"
                   title="<?= _("Name") ?>"/>
    	<bbns-column field="account_number"
                   title="<?= _("Account number") ?>"/>
    	<bbns-column field="id_bank"
                   title="<?= _("Bank") ?>"
                   :source="banks"/>
      <!-- TODO
    	<bbns-column name="id_currency"
                   :width="50"
                   title="<?= _("Currency") ?>"/>
			-->
    </bbn-table>
  </div>
</div>

