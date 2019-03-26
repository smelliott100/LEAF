
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import BTable from 'bootstrap-vue/es/components/table/table'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.component('b-table', BTable);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('inbox', require('./components/inbox.vue').default);
Vue.component('requests', require('./components/requests.vue').default);
Vue.component('adv-search', require('./components/advancedSearch.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  // app initial state
  el: '.leaf-app',
  data: {
    isShowing:false
  },
  methods: {
    showAlert: function(event){
      alert('How can I help you!');
    }
  }
});
