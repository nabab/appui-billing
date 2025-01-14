(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-billing'] + '/',
        year: dayjs().format('YYYY')
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
            label: bbn._('Open task'),
            action: this.openTask,
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
          this.postOut(this.root + 'actions/pdf', {
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
<div class="bbn-header bbn-spadding bbn-100 bbn-no-border-bottom bbn-vmiddle">
  <span class="bbn-right-sspace">`+ bbn._('Year') + `:</span>
  <bbn-datepicker :max="maxYear"
                  v-model="currentYear"
                  type="years"
                  :input-readonly="true"
                  :autosize="true"
  ></bbn-datepicker>
</div>
        `,
        data(){
          return {
            currentYear: dayjs().format('YYYY'),
            maxYear: dayjs().format('YYYY-MM-DD HH:mm:ss'),
            cp: this.closest('bbn-container').getComponent()
          }
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
