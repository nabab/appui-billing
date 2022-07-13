<!-- HTML Document -->

<bbn-form :action="root + 'actions/entity/insert'"
          :source="currentData"
          @success="onSuccess">
  <div class="bbn-grid-fields bbn-lpadded bbn-nowrap">
    <label><?= _("Name") ?></label>
    <bbn-input v-model="currentData.name"
               class="bbn-wide"
               :required="true"/>

    <label v-if="users.length > 1"><?= _("Owner") ?></label>
    <bbn-dropdown v-if="users.length > 1"
                  :source="users"
                  :required="true"
                  v-model="currentData.owner"/>

    <!-- TO DO
    <label><?= _("Address") ?></label>
    <adress-component/>
    -->

    <label><?= _("Country") ?></label>
    <bbn-dropdown :source="countries"
                  v-model="currentData.id_country"
               		:required="true"/>

    <label><?= _("Tax number") ?></label>
    <bbn-input v-model="currentData.tax_number"/>

  </div>
</bbn-form>