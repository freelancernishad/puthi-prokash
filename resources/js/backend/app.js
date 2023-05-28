import Vue from 'vue'
require('../bootstrap');


import { BButton, BImg, BModal,VBModal  } from 'bootstrap-vue'
Vue.component('b-modal', BModal)
Vue.component('b-button', BButton)
Vue.component('b-img', BImg)



import Swal from 'sweetalert2'
window.Swal = Swal;

import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes';

import store from '../store'

import Breadcrumbs from './components/breadcrumbs.vue'
Vue.component('Breadcrumbs', Breadcrumbs)


import Paginate from './components/paginate.vue'
Vue.component('Paginate', Paginate)




Vue.prototype.$localStorage = localStorage;


import Multiselect from 'vue-multiselect'


// register globally
Vue.component('multiselect', Multiselect)

window.Reload = new Vue();
const router = new VueRouter({
  routes,
  mode: 'history'
})
const app = new Vue({
    el: '#app',
    router,
    store
});


