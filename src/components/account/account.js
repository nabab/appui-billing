// Javascript Document

(() => {
  return {
    mixins: [bbn.vue.basicComponent],
    props: {
      source: {
        type: Object,
        required: true
      }
    },
    data() {
      return {
        root: appui.plugins['appui-billing'] + '/',
      };
    },
    computed: {
      toolbarSource() {
        return [
          {
            text: bbn._("Import..."),
            action: () => {}
          }, {
            text: bbn._("Export to CSV"),
            action: () => {}
          }, {
            component: 'bbn-datepicker',
            text: bbn._("After")
          }, {
            component: 'bbn-datepicker',
            text: bbn._("Before")
          }
        ]
      }
    }
  }
})();