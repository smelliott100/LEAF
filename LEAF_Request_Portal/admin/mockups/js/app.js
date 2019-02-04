Vue.use(VuejsDialog.main.default, {
    html: true,
    loader: false,
    okText: 'Proceed',
    cancelText: 'Cancel',
    animation: 'bounce',
    message: 'Some message'
})

const CustomView = Vue.extend({
	data() {
  	return {
    	items: [
        {name: 'Apple', count: 0},
        {name: 'Bananna', count: 0},
        {name: 'Cherry', count: 0}
      ]
    }
  },
	mixins: [VuejsDialog.mixin.default],
	template: '#custom-view-template',
  methods: {
  	handleSelect(index) {
    	let newData = this.items[index]
      newData.count = (newData.count + 1)
    	this.$set(this.items, index, newData)
    },
    handleDismiss() {
    	this.cancel()
    },
    handleProceed() {
    	this.proceed(this.items)
    }
  }
})

Vue.dialog.registerComponent('custom-view', CustomView)

Vue.component('line-chart', {
  extends: VueChartJs.Line,
  mounted () {
    this.renderChart({
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label: 'Data One',
          backgroundColor: '#f87979',
          data: [40, 39, 10, 40, 39, 80, 40]
        }
      ]
    }, {responsive: true, maintainAspectRatio: false})
  }

})


var app = new Vue({
  // app initial state
  el: '.leaf-app',
  data: {
    isShowing:false
  },
  methods: {
    showDialog(){
    	this.$dialog.confirm('Choose multiple items', {
      	view: 'custom-view',
        customClass: 'has--list-items'
      })
      .then((dialog) => {
          console.log('Dialog ok: ', dialog)

          dialog.close && dialog.close()

          let text = dialog.data.map(item => {
          	return item.count ? item.count +'-'+ item.name : null
          }).filter(i => !!i).join(', ')

          let msg = `You selected ${text || 'none'}`

          this.$dialog.alert(msg, {
          	animation: 'zoom'
          })
       })
     }
  }
});
