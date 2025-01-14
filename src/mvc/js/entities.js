// Javascript Document

(() => {
  return {
    data() {
      return {
        root: this.source.root
      };
    },
    methods: {
    	addEntity() {
        this.getPopup({
          label: bbn._("New entity"),
          component: "appui-billing-entity-form"
        });
      }
    }
  }
})();
