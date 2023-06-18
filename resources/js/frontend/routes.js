let layout = require('./components/layouts/layout.vue').default;
let blank = require('./components/layouts/blank.vue').default;


let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;



let home = require('./components/home.vue').default;
let categoryProduct = require('./components/pages/categoryProduct.vue').default;
let productSingle = require('./components/pages/productSingle.vue').default;

//books
let flipbooks = require('./components/flipbook/home.vue').default;



let PageNotFound = require('./components/404.vue').default;


let prefix = '/'
export const routes = [
    { path:  `${prefix}`, component: home, name:'home',meta: { layout: layout } },
    { path: `${prefix}login`, component: login, name:'login',meta: { layout: blank } },




    { path:  `${prefix}register`, component: register, name:'register',meta: { layout: layout } },
    { path:  `${prefix}forget`, component: forget, name:'forget',meta: { layout: layout } },


    { path:  `${prefix}product/:category`, component: categoryProduct, name:'categoryProduct',meta: { layout: layout } },
    { path:  `${prefix}product/single/:id`, component: productSingle, name:'productSingle',meta: { layout: layout } },


  { path: "*", component: PageNotFound }

]

