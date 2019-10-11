<div class="appui-billing bbn-overlay">
  <bbn-tabnav class="appui_billing_tabnav"
              :scrollable="true"
              :autoload="true"
  >
    <bbns-container url="home"
              :static="true"
              :load="true"
              title="<?=_("Invoices")?>"
              icon="nf nf-fa-home"
    ></bbns-container>
    <bbns-container url="tasks"
              :static="true"
              :load="true"
              title="<?=_("Tasks not billed")?>"
              icon="nf nf-fa-bug"
    ></bbns-container>
  </bbn-tabnav>
</div>
