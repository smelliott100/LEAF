
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
import Vuex from 'vuex'

const store = new Vuex.Store({
    state: {
        sharedData: {
            requests: {
                columns: [],
                entries: [],
                selected: []
            },
            inbox: {
                columns: [],
                entries: [],
                selected: []
            }
        },
    },
    mutations: {
        changeFilter(state, newFilters) {
            let errors = [];
            state.sharedData.inbox.selected = [];
            state.sharedData.requests.selected = [];
            if (newFilters.length !== 0) {
                for (let i = 0; i < newFilters.length; i++) {
                    let tempObj = new Object();
                    if (typeof (newFilters[i]) !== "undefined" && typeof (newFilters[i].type) !== "undefined" && newFilters[i].type !== null) {
                        switch (newFilters[i].type) {
                            case 'inbox':
                                tempObj = {
                                    field: newFilters[i].field,
                                    operator: newFilters[i].operator,
                                    data: newFilters[i].data
                                };
                                state.sharedData.inbox.selected.push(tempObj);
                                break;
                            case 'request':
                                tempObj = {
                                    field: newFilters[i].field,
                                    operator: newFilters[i].operator,
                                    data: newFilters[i].data
                                };
                                state.sharedData.requests.selected.push(tempObj);
                                break;
                            default:
                                break;
                        }
                    } else {
                        errors.push(i + 1);
                    }
                }
            }
            if (errors.length > 0) {
                alert('Filter number ' + errors.join(', ') + ' must have associated type.');
            }
        },
        addSharedData(state, newData) {
            let keys = Object.keys(newData);
            for (let i = 0; i < keys.length; i++) {
                if (typeof (newData[keys[i]]) !==  "undefined" && newData[keys[i]] !== null) {
                    state.sharedData[keys[i]] = newData[keys[i]];
                }
            }
        }
    }
});

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
    store,
  data: {
      isShowing:false
  },
  methods: {
    showAlert: function(event){
      alert('How can I help you!');
    }
  }
});
