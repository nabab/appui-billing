<!-- HTML Document -->
<div class="bbn-overlay bbn-flex-height">
  <div class="bbn-header bbn-padding">
    <h2 v-text="source.name"/>
  </div>
  <div class="bbn-flex-fill">
    <bbn-table :source="root + 'data/account/' + source.id + '/transactions'"
               :sortable="true"
               :filterable="true"
               :showable="true"
               :pageable="true"
               :toolbar="toolbarSource">
      <bbns-column field="id"
                   :hidden="true"/>
      <bbns-column field="reference"/>
      <bbns-column field="paid"
                   type="date"/>
      <bbns-column field="amount"
                   type="money"/>
    </bbn-table>
  </div>
</div>