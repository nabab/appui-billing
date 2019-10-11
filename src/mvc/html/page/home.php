<bbn-table :source="root + 'data/invoices'"
           :pageable="true"
           :toolbar="$options.components.toolbar"
           :filterable="true"
           :filters="selectedYear"
           ref="table"
>
  <bbns-column field="ref"
               title="<?=_('Ref')?>"
               cls="bbn-c"
               :width="130"
               :render="renderRef"
               :filterable="false"
  ></bbns-column>
  <bbns-column field="creation"
               title="<?=_('Date')?>"
               type="date"
               cls="bbn-c"
               :width="100"
               :filterable="false"
  ></bbns-column>
  <bbns-column field="description"
               title="<?=_('Description')?>"
               :render="renderDescription"
               :filterable="false"
  ></bbns-column>
  <bbns-column field="taxable"
               title="<?=_('Taxable')?>"
               type="money"
               cls="bbn-r"
               :width="150"
               :filterable="false"
  ></bbns-column>
  <bbns-column field="tax"
               title="<?=_('Tax')?>"
               :render="renderTax"
               cls="bbn-r"
               :width="170"
               :filterable="false"
  ></bbns-column>
  <bbns-column field="amount"
               title="<?=_('Amount')?>"
               type="money"
               cls="bbn-r"
               :width="150"
               :filterable="false"
  ></bbns-column>
  <bbns-column field="id_task"
               title="<?=_('Task')?>"
               cls="bbn-c"
               :width="70"
               :buttons="getButton"
               :filterable="false"
  ></bbns-column>
  <bbns-column title="<?=_('PDF')?>"
               cls="bbn-c"
               :width="70"
               :buttons="[{
                 title: '<?=_('Get PDF')?>',
                 action: getPDF,
                 icon: 'nf nf-fa-file_pdf_o'
               }]"
               :filterable="false"
  ></bbns-column>
</bbn-table>
