<div class="appui-billing bbn-full-screen">
  <bbn-tabnav class="appui_billing_tabnav"
              :scrollable="true"
              :autoload="true"
  >
    <bbns-container url="home"
              :static="true"
              :load="true"
              title="<i class='nf nf-fa-home'></i> <?=_("Invoices")?>"
    ></bbns-container>
    <bbns-container url="tasks"
              :static="true"
              :load="true"
              title="<i class='nf nf-fa-bug'></i> <?=_("Tasks not billed")?>"
    ></bbns-container>
  </bbn-tabnav>
</div>
