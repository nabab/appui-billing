<div class="appui-billing bbn-overlay">
  <bbn-router :scrollable="true"
              :autoload="true"
              mode="tabs"
  >
    <bbns-container url="home"
              :fixed="true"
              :load="true"
              label="<?= _("Invoices") ?>"
              icon="nf nf-fa-home"
    ></bbns-container>
    <bbns-container url="tasks"
              :fixed="true"
              :load="true"
              label="<?= _("Tasks not billed") ?>"
              icon="nf nf-fa-bug"
    ></bbns-container>
  </bbn-router>
</div>
