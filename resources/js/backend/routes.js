let adminlayout = require('./components/layouts/adminlayout.vue').default;
let blanklayout = require('./components/layouts/blanklayout.vue').default;



// Auth Components

let logout = require('./components/auth/logout.vue').default;

let home = require('./components/home.vue').default;


let categoryIndex = require('./components/category/index.vue').default;
let categoryForm = require('./components/category/form.vue').default;
let categoryimages = require('./components/category/images.vue').default;

let productsIndex = require('./components/products/index.vue').default;
let productsForm = require('./components/products/form.vue').default;
let productsimages = require('./components/products/images.vue').default;

let galleryIndex = require('./components/gallery/index.vue').default;
let galleryForm = require('./components/gallery/form.vue').default;
let galleryimages = require('./components/gallery/images.vue').default;


let profile = require('./components/profile.vue').default;




let userlist = require('./components/users/list.vue').default;
let userlistedit = require('./components/users/form.vue').default;







let PageNotFound = require('./components/404.vue').default;


let prefix = '/dashboard'
export const routes = [

  //Auth Routes

  { path: `${prefix}/logout`, component: logout, name:'logout',meta: { layout: blanklayout } },




  { path:  `${prefix}`, component: home, name:'Dashboard',meta: { layout: adminlayout } },
  { path:  `${prefix}/profile`, component: profile, name:'profile',meta: { layout: adminlayout } },



  { path:  `${prefix}/user/list`, component: userlist, name:'userlist',meta: { layout: adminlayout } },
  { path:  `${prefix}/user/list/add`, component: userlistedit, name:'userlistadd',meta: { layout: adminlayout } },
  { path:  `${prefix}/user/list/edit/:id`, component: userlistedit, name:'userlistedit',meta: { layout: adminlayout } },



  { path:  `${prefix}/category/list`, component: categoryIndex, name:'categoryIndex',meta: { layout: adminlayout } },
  { path:  `${prefix}/category/add`, component: categoryForm, name:'categoryAdd',meta: { layout: adminlayout } },
  { path:  `${prefix}/category/edit/:id`, component: categoryForm, name:'categoryEdit',meta: { layout: adminlayout } },
  { path:  `${prefix}/category/images/:id`, component: categoryimages, name:'categoryimages',meta: { layout: adminlayout } },




  { path:  `${prefix}/products/list`, component: productsIndex, name:'productsIndex',meta: { layout: adminlayout } },
  { path:  `${prefix}/products/add`, component: productsForm, name:'productsAdd',meta: { layout: adminlayout } },
  { path:  `${prefix}/products/edit/:id`, component: productsForm, name:'productsEdit',meta: { layout: adminlayout } },
  { path:  `${prefix}/products/images/:id`, component: productsimages, name:'productsimages',meta: { layout: adminlayout } },




  { path:  `${prefix}/gallery/list`, component: galleryIndex, name:'galleryIndex',meta: { layout: adminlayout } },
  { path:  `${prefix}/gallery/add`, component: galleryForm, name:'galleryAdd',meta: { layout: adminlayout } },
  { path:  `${prefix}/gallery/edit/:id`, component: galleryForm, name:'galleryEdit',meta: { layout: adminlayout } },
  { path:  `${prefix}/gallery/images/:id`, component: galleryimages, name:'galleryimages',meta: { layout: adminlayout } },







  { path: "*", component: PageNotFound }

]
