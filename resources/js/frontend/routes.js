let layout = require('./components/layouts/layout.vue').default;
let blank = require('./components/layouts/blank.vue').default;
let logout = require('../backend/components/auth/logout.vue').default;

let adminLogin = require('./components/auth/login.vue').default;


let login = require('./components/pages/auth/login.vue').default;
let register = require('./components/pages/auth/register.vue').default;


// let register = require('./components/auth/register.vue').default;
// let forget = require('./components/auth/forget.vue').default;



let home = require('./components/home.vue').default;

let pages = require('./components/pages/dynamicPage.vue').default;

let categories = require('./components/pages/categories.vue').default;
let categoryProduct = require('./components/pages/categoryProduct.vue').default;
let Products = require('./components/pages/Products.vue').default;
let productSingle = require('./components/pages/productSingle.vue').default;
let cart = require('./components/pages/cart.vue').default;
let checkout = require('./components/pages/checkout.vue').default;

let writer = require('./components/pages/writer.vue').default;
let contact = require('./components/pages/contact.vue').default;



let account = require('./components/pages/account/index.vue').default;
let orders = require('./components/pages/account/orders.vue').default;
let accountsettings = require('./components/pages/account/account-settings.vue').default;
let accountaddress = require('./components/pages/account/account-address.vue').default;
let accountnotification = require('./components/pages/account/account-notification.vue').default;





//books
let flipbooks = require('./components/flipbook/home.vue').default;



let PageNotFound = require('./components/404.vue').default;


let prefix = '/'
export const routes = [
    { path:  `${prefix}`, component: home, name:'home',meta: { layout: layout } },

    { path: `${prefix}logout`, component: logout, name:'logout',meta: { layout: blank } },

    { path: `${prefix}admin/login`, component: adminLogin, name:'AdminLogin',meta: { layout: blank } },


    { path: `${prefix}login`, component: login, name:'login',meta: { layout: layout } },

    { path:  `${prefix}register`, component: register, name:'register',meta: { layout: layout } },
    // { path:  `${prefix}forget`, component: forget, name:'forget',meta: { layout: layout } },


    { path:  `${prefix}categories`, component: categories, name:'categories',meta: { layout: layout } },

    { path:  `${prefix}pages/:slug`, component: pages, name:'pages',meta: { layout: layout } },



    { path:  `${prefix}product/category/:category`, component: categoryProduct, name:'categoryProduct',meta: { layout: layout } },
    { path:  `${prefix}products`, component: Products, name:'Products',meta: { layout: layout } },

    { path:  `${prefix}product/single/:id`, component: productSingle, name:'productSingle',meta: { layout: layout } },
    { path:  `${prefix}cart`, component: cart, name:'cart',meta: { layout: layout } },
    { path:  `${prefix}checkout`, component: checkout, name:'checkout',meta: { layout: layout } },

    { path:  `${prefix}writer`, component: writer, name:'writer',meta: { layout: layout } },
    { path:  `${prefix}contact-us`, component: contact, name:'contact',meta: { layout: layout } },





    { path:  `${prefix}my-account`, component: account, name:'account',meta: { layout: layout } },
    { path:  `${prefix}orders`, component: orders, name:'orders',meta: { layout: layout } },
    { path:  `${prefix}account-settings`, component: accountsettings, name:'accountsettings',meta: { layout: layout } },
    { path:  `${prefix}account-address`, component: accountaddress, name:'accountaddress',meta: { layout: layout } },
    { path:  `${prefix}account-notification`, component: accountnotification, name:'accountnotification',meta: { layout: layout } },


  { path: "*", component: PageNotFound }

]

