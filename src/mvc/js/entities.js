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
          title: bbn._("New entity"),
          component: "appui-billing-entity-form"
        });
      }
    }
  }
})();
