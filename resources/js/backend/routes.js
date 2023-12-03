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
let flipingbooks = require('./components/products/flipingbooks.vue').default;
let flipingbooksqr = require('./components/products/qrcode.vue').default;

let sliderIndex = require('./components/slider/index.vue').default;
let sliderForm = require('./components/slider/form.vue').default;


let galleryIndex = require('./components/gallery/index.vue').default;
let galleryForm = require('./components/gallery/form.vue').default;
let galleryimages = require('./components/gallery/images.vue').default;


let multimedia_categoriesIndex = require('./components/multimedia_categories/index.vue').default;
let multimedia_categoriesForm = require('./components/multimedia_categories/form.vue').default;

let multimediaIndex = require('./components/multimedia/index.vue').default;
let multimediaForm = require('./components/multimedia/form.vue').default;


let pagesIndex = require('./components/pages/index.vue').default;
let pagesForm = require('./components/pages/form.vue').default;


let ordersIndex = require('./components/orders/index.vue').default;
let ordersForm = require('./components/orders/form.vue').default;



let profile = require('./components/profile.vue').default;




let writerslist = require('./components/writers/list.vue').default;
let writerslistedit = require('./components/writers/form.vue').default;



let userslist = require('./components/users/list.vue').default;
let userslistedit = require('./components/users/form.vue').default;



let Customerlist = require('./components/customers/list.vue').default;


let feature_categories = require('./components/feature_categories.vue').default;


let theBookOfPuthiprakash = require('./components/theBookOfPuthiprakash/list.vue').default;

let deliveryCharge = require('./components/deliveryCharge/list.vue').default;


let settings = require('./components/settings.vue').default;





let PageNotFound = require('./components/404.vue').default;


let prefix = '/dashboard'
export const routes = [

  //Auth Routes

  { path: `${prefix}/logout`, component: logout, name:'logout',meta: { layout: blanklayout } },




  { path:  `${prefix}`, component: home, name:'Dashboard',meta: { layout: adminlayout } },
  { path:  `${prefix}/profile`, component: profile, name:'profile',meta: { layout: adminlayout } },



  { path:  `${prefix}/customers/list`, component: Customerlist, name:'Customerlist',meta: { layout: adminlayout } },



  { path:  `${prefix}/writers/list`, component: writerslist, name:'writerslist',meta: { layout: adminlayout } },
  { path:  `${prefix}/writers/list/add`, component: writerslistedit, name:'writerslistadd',meta: { layout: adminlayout } },
  { path:  `${prefix}/writers/list/edit/:id`, component: writerslistedit, name:'writerslistedit',meta: { layout: adminlayout } },



  { path:  `${prefix}/users/list`, component: userslist, name:'userslist',meta: { layout: adminlayout } },
  { path:  `${prefix}/users/list/add`, component: userslistedit, name:'userslistadd',meta: { layout: adminlayout } },
  { path:  `${prefix}/users/list/edit/:id`, component: userslistedit, name:'userslistedit',meta: { layout: adminlayout } },



  { path:  `${prefix}/category/list`, component: categoryIndex, name:'categoryIndex',meta: { layout: adminlayout } },
  { path:  `${prefix}/category/add`, component: categoryForm, name:'categoryAdd',meta: { layout: adminlayout } },
  { path:  `${prefix}/category/edit/:id`, component: categoryForm, name:'categoryEdit',meta: { layout: adminlayout } },
  { path:  `${prefix}/category/images/:id`, component: categoryimages, name:'categoryimages',meta: { layout: adminlayout } },




  { path:  `${prefix}/products/list`, component: productsIndex, name:'productsIndex',meta: { layout: adminlayout } },
  { path:  `${prefix}/products/add`, component: productsForm, name:'productsAdd',meta: { layout: adminlayout } },
  { path:  `${prefix}/products/edit/:id`, component: productsForm, name:'productsEdit',meta: { layout: adminlayout } },
  { path:  `${prefix}/products/images/:id`, component: productsimages, name:'productsimages',meta: { layout: adminlayout } },
  { path:  `${prefix}/products/fliping/books/:id`, component: flipingbooks, name:'flipingbooks',meta: { layout: adminlayout } },
  { path:  `${prefix}/products/fliping/books/qr/:id`, component: flipingbooksqr, name:'flipingbooksqr',meta: { layout: adminlayout } },




  { path:  `${prefix}/slider/list`, component: sliderIndex, name:'sliderIndex',meta: { layout: adminlayout } },
  { path:  `${prefix}/slider/add`, component: sliderForm, name:'sliderAdd',meta: { layout: adminlayout } },
  { path:  `${prefix}/slider/edit/:id`, component: sliderForm, name:'sliderEdit',meta: { layout: adminlayout } },



  { path:  `${prefix}/gallery/list`, component: galleryIndex, name:'galleryIndex',meta: { layout: adminlayout } },
  { path:  `${prefix}/gallery/add`, component: galleryForm, name:'galleryAdd',meta: { layout: adminlayout } },
  { path:  `${prefix}/gallery/edit/:id`, component: galleryForm, name:'galleryEdit',meta: { layout: adminlayout } },
  { path:  `${prefix}/gallery/images/:id`, component: galleryimages, name:'galleryimages',meta: { layout: adminlayout } },



  { path:  `${prefix}/multimedia_categories/list`, component: multimedia_categoriesIndex, name:'multimedia_categoriesIndex',meta: { layout: adminlayout } },
  { path:  `${prefix}/multimedia_categories/add`, component: multimedia_categoriesForm, name:'multimedia_categoriesAdd',meta: { layout: adminlayout } },
  { path:  `${prefix}/multimedia_categories/edit/:id`, component: multimedia_categoriesForm, name:'multimedia_categoriesEdit',meta: { layout: adminlayout } },



  { path:  `${prefix}/multimedia/list`, component: multimediaIndex, name:'multimediaIndex',meta: { layout: adminlayout } },
  { path:  `${prefix}/multimedia/add`, component: multimediaForm, name:'multimediaAdd',meta: { layout: adminlayout } },
  { path:  `${prefix}/multimedia/edit/:id`, component: multimediaForm, name:'multimediaEdit',meta: { layout: adminlayout } },



  { path:  `${prefix}/pages/list`, component: pagesIndex, name:'pagesIndex',meta: { layout: adminlayout } },
  { path:  `${prefix}/pages/add`, component: pagesForm, name:'pagesAdd',meta: { layout: adminlayout } },
  { path:  `${prefix}/pages/edit/:id`, component: pagesForm, name:'pagesEdit',meta: { layout: adminlayout } },



  { path:  `${prefix}/orders/list/:status`, component: ordersIndex, name:'ordersIndex',meta: { layout: adminlayout } },
  { path:  `${prefix}/orders/list/by/:customer`, component: ordersIndex, name:'ordersCustomer',meta: { layout: adminlayout } },
  { path:  `${prefix}/orders/add`, component: ordersForm, name:'ordersAdd',meta: { layout: adminlayout } },
  { path:  `${prefix}/orders/edit/:id`, component: ordersForm, name:'ordersEdit',meta: { layout: adminlayout } },


  { path:  `${prefix}/feature_categories`, component: feature_categories, name:'feature_categories',meta: { layout: adminlayout } },

  { path:  `${prefix}/the-book-of-puthiprakashes`, component: theBookOfPuthiprakash, name:'theBookOfPuthiprakash',meta: { layout: adminlayout } },


  { path:  `${prefix}/delivery/charge`, component: deliveryCharge, name:'deliveryCharge',meta: { layout: adminlayout } },

  { path:  `${prefix}/settings`, component: settings, name:'settings',meta: { layout: adminlayout } },





  { path: "*", component: PageNotFound }

]
