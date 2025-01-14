<!-- HTML Document -->

<div class="bbn-overlay">
  <bbn-router :nav="true"
              :menu="[]">
    <bbn-container :fixed="true"
                   :scrollable="false"
                   :autoload="true"
                   label="<?= _("Liste des comptes") ?>"
                   url="list">
    	<bbn-table :sortable="true"
                 :source="source.data">
      	<bbns-column field="name"
                     :render="renderName"/>
      	<bbns-column field="id_bank"/>
      	<bbns-column field="id"/>
      </bbn-table>
    </bbn-container>
  </bbn-router>
</div>