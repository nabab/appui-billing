(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-billing'] + '/',
        year: moment().format('YYYY')
      }
    },
    computed: {
      selectedYear(){
        return {
          conditions: [{
            field: 'ref_year',
            operator: 'eq',
            value: this.year
          }],
          logic: 'AND'
        }
      }
    },
    methods: {
      renderRef(row){
        if ( row.ref && row.creation ){
          return row.ref_year + '-' + row.ref;
        }
        return '';
      },
      renderDescription(row){        
        if ( row.description.length ){
          return bbn.fn.shorten(bbn.fn.html2text(row.description), 50);
        }
        return '';
      },
      renderTax(row){
        if ( (row.tax > 0) && row.taxable.length ){
          return '(' + row.tax + '%) ' + bbn.fn.money(row.taxable * row.tax / 100);
        }
      },
      getButton(row){
        if ( row.id_task ){
          return [{
            title: bbn._('Open task'),
            command: this.openTask,
            icon: 'nf nf-fa-bug'
          }];
        }
        return [];
      },
      openTask(row){
        bbn.fn.link(`${appui.plugins['appui-task']}/page/task/${row.id_task}`);
      },
      getPDF(row){
        if ( row.id_media ){
          this.post_out(this.root + 'actions/pdf', {
            id_media: row.id_media
          });
        }
      },
      setFilter(){
        this.$refs.table.currentFilters = this.selectedYear;
      }
    },
    components: {
      toolbar: {
        template: `
<div>
  <span>${bbn._('Year')}: </span>
  <bbn-datepicker :max="maxYear"
                  v-model="currentYear"
                  depth="decade"
                  format="yyyy"
                  value-format="yyyy"
                  mask="0000"
                  :footer="false"
                  :input-readonly="true"
                  style="width: 80px"
  ></bbn-datepicker>
</div>
        `,
        data(){
          return {
            currentYear: moment().format('YYYY'),
            maxYear: moment().format('YYYY-MM-DD HH:mm:ss'),
            cp: bbn.vue.closest(this, 'bbns-container').getComponent()
          }
        },
        methods: {

        },
        watch: {
          currentYear(newVal){
            this.cp.year = newVal;
            this.cp.setFilter();
          }
        }
      }
    }
  }
})();