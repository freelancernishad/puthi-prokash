require('../bootstrap');
import Vue from 'vue'

import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
import 'swiper/css/swiper.css'

Vue.component('swiper', Swiper)
Vue.component('swiper-slide', SwiperSlide)


import { BButton, BModal,VBModal,BCarousel,BCarouselSlide,CarouselPlugin  } from 'bootstrap-vue'
Vue.use(CarouselPlugin)
Vue.component('b-modal', BModal)
Vue.component('b-button', BButton)
Vue.component('b-carousel', BCarousel)
Vue.component('b-carousel-slide', BCarouselSlide)



import 'bootstrap-vue/dist/bootstrap-vue.css'



import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes';
import User from '../helpers/User';

window.User = User
Vue.prototype.$appUrl = window.location.origin
import Notification from '../helpers/Notification';
window.Notification = Notification

import breadcrumb from './components/global/breadcrumb.vue';
Vue.component('Breadcrumb', breadcrumb)

import Productslist from './components/pages/components/Productslist.vue';
Vue.component('Productslist', Productslist)

import Productslistpaginate from './components/pages/components/Productslistpaginate.vue';
Vue.component('Productslistpaginate', Productslistpaginate)

import Paginaion from './components/pages/components/paginate.vue';
Vue.component('Paginaion', Paginaion)

import Product from './components/pages/components/Product.vue';
Vue.component('Product', Product)

import Productdetails from './components/pages/components/Productdetails.vue';
Vue.component('Productdetails', Productdetails)

import Cartpopup from './components/pages/components/cartPopup.vue';
Vue.component('Cartpopup', Cartpopup)


import VueScrollTo from 'vue-scrollto';
Vue.use(VueScrollTo);


import store from '../store'
window.Reload = new Vue();
import Swal from 'sweetalert2'
window.Swal = Swal;



import VeeValidate from 'vee-validate'
Vue.use(VeeValidate, {
  // This is the default
  inject: true,
  // Important to name this something other than 'fields'
  fieldsBagName: 'veeFields',
  // This is not required but avoids possible naming conflicts
  errorBagName: 'veeErrors'
})


const router = new VueRouter({
  routes,
  mode: 'history'
})
const app = new Vue({
    el: '#app',
    router,
    store
});
