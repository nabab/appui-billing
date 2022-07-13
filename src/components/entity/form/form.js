// Javascript Document

(() => {
  return {
    props: ['source'],
    data() {
      let d = this.source && this.source.id ? this.source : {
        name: '',
        id_country: '',
        owner: appui.app.userId,
        tax_number: ''
      };
      return {
        root: appui.plugins['appui-billing'] + '/',
        currentData: d
      };
    },
    computed: {
      users() {
        return appui.app.users || [{
          text: appui.app.userName,
          value: appui.app.userId
        }];
      },
      countries() {
        return appui.options.countries || [];
      }
    },
    methods: {
      onSuccess() {
        let fl = this.closest('bbn-floater');
        if (fl && fl.opener && bbn.fn.isFunction(fl.opener.updateData)) {
          fl.opener.updateData();
        }
      }
    }
  };
})();
