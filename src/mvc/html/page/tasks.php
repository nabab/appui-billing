<bbn-table :source="root + 'data/tasks'">
  <bbns-column field="title"
               title="<?=_('Title')?>"
               :render="renderTitle"
  ></bbns-column>
  <bbns-column field="creation_date"
               title="<?=_('Created on')?>"
               type="date"
               cls="bbn-c"
               :width="100"
  ></bbns-column>
  <bbns-column field="id_user"
               title="<?=_('Created by')?>"
               :component="$options.components.user"
  ></bbns-column>
  <bbns-column field="approve_date"
               title="<?=_('Approved on')?>"
               type="date"
               cls="bbn-c"
               :width="100"
  ></bbns-column>
  <bbns-column field="approve_user"
               title="<?=_('Approved by')?>"
               :component="$options.components.approveUser"
  ></bbns-column>
  <bbns-column field="close_date"
               title="<?=_('Closed on')?>"
               type="date"
               cls="bbn-c"
               :width="100"
  ></bbns-column>
  <bbns-column field="close_user"
               title="<?=_('Closed by')?>"
               :component="$options.components.closeUser"
  ></bbns-column>
  <bbns-column field="price"
               title="<?=_('Price')?>"
               type="money"
               cls="bbn-r"
               :width="100"
  ></bbns-column>
  <bbns-column :buttons="[{
                 title: '<?=_('See the task')?>',
                 icon: 'nf nf-fa-bug',
                 action: openTask
               }]"
               cls="bbn-c"
               :width="70"
  ></bbns-column>
</bbn-table>
