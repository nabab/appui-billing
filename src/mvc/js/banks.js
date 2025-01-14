// Javascript Document

(() => {
  return {
    data() {
      return {
        root: appui.plugins['appui-billing'] + '/'
      }
    },
    methods: {
    	addBank() {
        this.getRef('table').insert();
        /*
        this.getPopup({
          label: bbn._("New bank"),
          component: "appui-billing-bank-form"
        });
        */
      }
    }
  };
})();
