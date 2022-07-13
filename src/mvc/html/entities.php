<!-- HTML Document -->
<div class="bbn-overlay bbn-flex-height">
  <bbn-toolbar>
  	<div>
      <bbn-button @click="addEntity"
                  icon="nf nf-fa-plus"
                  text="<?= _("New entity") ?>"/>
    </div>
  </bbn-toolbar>
  <div class="bbn-flex-fill">
    <bbn-dashboard v-if="source.entities">
      <bbn-widget v-for="entity in source.entities"
                  :title="entity.name">
        <a :href="root + 'entity_accounts/' + entity.id"><?= _("Accounts") ?></a><br>
        <a :href="root + 'banks/' + entity.id"><?= _("Banks") ?></a><br>
      </bbn-widget>
    </bbn-dashboard>
  </div>
</div>
