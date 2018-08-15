(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-billing'] + '/',
        year: moment().format('YYYY')
      }
    },
    methods: {
      renderTitle(row){
        return bbn.fn.shorten(row.title, 40);
      },
      openTask(row){
        bbn.fn.link(`${appui.plugins['appui-task']}/page/task/${row.id}`);
      }
    },
    components: {
      user: {
        props: ['source'],
        template: `
<div class="bbn-vmiddle">
  <bbn-initial :user-id="source.id_user"
               :height="20"
               :title="userName(source.id_user)"
  ></bbn-initial>
  <span v-text="userName(source.id_user)"
        class="bbn-hsmargin"
  ></span>
</div>
        `,
        methods: {
          userName: appui.app.getUserName
        }
      },
      approveUser: {
        props: ['source'],
        template: `
<div class="bbn-vmiddle">
  <bbn-initial :user-id="source.approve_user"
               :height="20"
               :title="userName(source.approve_user)"
  ></bbn-initial>
  <span v-text="userName(source.approve_user)"
        class="bbn-hsmargin"
  ></span>
</div>
        `,
        methods: {
          userName: appui.app.getUserName
        }
      },
      closeUser: {
        props: ['source'],
        template: `
<div class="bbn-vmiddle">
  <bbn-initial :user-id="source.close_user"
               :height="20"
               :title="userName(source.close_user)"
  ></bbn-initial>
  <span v-text="userName(source.close_user)"
        class="bbn-hsmargin"
  ></span>
</div>
        `,
        methods: {
          userName: appui.app.getUserName
        }
      }
    }
  }
})();
