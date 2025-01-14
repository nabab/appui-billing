<bbn-table :source="root + 'data/tasks'">
  <bbns-column field="title"
               label="<?= _('Title') ?>"
               :render="renderTitle"
  ></bbns-column>
  <bbns-column field="creation_date"
               label="<?= _('Created on') ?>"
               type="date"
               cls="bbn-c"
               :width="100"
  ></bbns-column>
  <bbns-column field="id_user"
               label="<?= _('Created by') ?>"
               :component="$options.components.user"
  ></bbns-column>
  <bbns-column field="approve_date"
               label="<?= _('Approved on') ?>"
               type="date"
               cls="bbn-c"
               :width="100"
  ></bbns-column>
  <bbns-column field="approve_user"
               label="<?= _('Approved by') ?>"
               :component="$options.components.approveUser"
  ></bbns-column>
  <bbns-column field="close_date"
               label="<?= _('Closed on') ?>"
               type="date"
               cls="bbn-c"
               :width="100"
  ></bbns-column>
  <bbns-column field="close_user"
               label="<?= _('Closed by') ?>"
               :component="$options.components.closeUser"
  ></bbns-column>
  <bbns-column field="price"
               label="<?= _('Price') ?>"
               type="money"
               cls="bbn-r"
               :width="100"
  ></bbns-column>
  <bbns-column :buttons="[{
                 label: '<?= _('See the task') ?>',
                 icon: 'nf nf-fa-bug',
                 action: openTask
               }]"
               cls="bbn-c"
               :width="70"
  ></bbns-column>
</bbn-table>
