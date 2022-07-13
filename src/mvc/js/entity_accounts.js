// Javascript Document

(() => {
  return {
    data() {
      return {
        root: appui.plugins['appui-billing'] + '/'
      }
    },
    computed: {
      banks() {
        return bbn.fn.map(this.source.banks, a => {
          return {
            text: a.name,
            value: a.id
          }
        })
      }
    },
    methods: {
    	addAccount() {
        this.getRef('table').insert();
      }
    }
  };
})();
