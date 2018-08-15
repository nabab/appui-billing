<div class="appui-billing bbn-full-screen">
  <bbn-tabnav class="appui_billing_tabnav"
              :scrollable="true"
              :autoload="true"
  >
    <bbns-tab url="home"
              :static="true"
              :load="true"
              title="<i class='fas fa-home'></i> <?=_("Invoices")?>"
    ></bbns-tab>
    <bbns-tab url="tasks"
              :static="true"
              :load="true"
              title="<i class='fas fa-bug'></i> <?=_("Tasks not billed")?>"
    ></bbns-tab>
  </bbn-tabnav>
</div>
