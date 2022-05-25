// Javascript Document

(() => {
  return {
    data() {
      return {
        root: appui.plugins['appui-billing'] + '/',
      }
    },
    methods: {
      renderName(row) {
        return '<a href="' + this.root + 'accounts/account/' + row.id + '">' + row.name + '</a>';
      }
    }
  }
})();
