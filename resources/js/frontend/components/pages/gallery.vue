<template>
    <main>

<section class="container px-2" style="padding-top: 50px;">

    <Breadcrumb :pages="[{'route':'home','params':{},'text':'হোম'},{'route':'','params':{},'text':'Gallery'}]"/>




    <div class=" my-4 row w-100"  style="margin: 0;">
    <div class="align-items-center col-md-6 d-flex justify-content-between">
        <img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px">
    <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4">Gallery</p>
    <!-- <p  class="border-3 border-bottom border-top d-inline fs-4 mb-0 px-4">0</p> -->
    </div>

    <div class="col-md-6 d-flex gap-5 py-2">

        <form class="d-flex" style="width: 90%;" @submit.stop.prevent="searchItem">
          <!-- <input type="text" placeholder="আপনার কাঙ্খিত বই খুঁজুন" v-model="form.search" class="form-control writer-search-input">
          <button type="submit" class="writer-search-button" ><i class="fa-regular fa-magnifying-glass"></i></button> -->
        </form>



        <router-link class="fs-5 nav-link text-dark position-relative" aria-current="page" :to="{name:'cart'}">
                  <img width="35px" :src="$asseturl+'assets/image/cart-icon.png'"/><span class="CartQuantity2">{{ getCartQuantity  }}</span>
                </router-link>


    </div>
    </div>
    </section>


    <div class="page">
      <div class="page-content">
        <div class="container">

<div class="container px-0 py-4">
  <div class="pp-category-filter">
    <div class="row">

        <p @click="previous" class="prev col-sm-1 text-center">
            <i class="fas fa-chevron-left fa-fw"></i>
        </p>
        <div class="col-sm-10" id="slide">
            <button :class="queryId=='' ? 'btn-primary text-white' : 'btn-outline-primary'"  class="btn pp-filter-button catitems mr-2" @click="getItems()" href="#" style="margin-right: 6px;" >All</button>
            <button v-for="(gallery,indexG) in galleris" :key="`indexG${indexG}`" :class="queryId==gallery.id ? 'btn-primary  text-white' : 'btn-outline-primary'" @click="getItems(gallery.id)" class="btn pp-filter-button catitems" style="margin-right: 5px;">{{ gallery.title }}</button>
        </div>
        <P @click="next" class="next col-sm-1 text-center">
            <i class="fas fa-chevron-right fa-fw"></i>
        </P>

    </div>
  </div>
</div>
<div class="container px-0">
  <div class="pp-gallery">
    <div class="card-columns row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-2">



        <div class="card" v-for="(item,index) in items" :key="index">
            <a href="#">
                <figure class="pp-effect"><img class="img-fluid" :src="$asseturl+item.image_path" alt="Nature"/>
                    <figcaption>
                    <div class="h4">{{ item.gallery.title }}</div>
                    <p>{{ item.gallery.description }}</p>
                    </figcaption>
                </figure>
            </a>
        </div>




    </div>
  </div>
</div>
</div>
      </div>
    </div>






    <div class="container">
        <Paginaion
        :per_page="per_page"
        :totalitems="totalitems"
        :Totalpageprops="Totalpageprops"
        :Routenameprops="Routenameprops"
        :Routeparamsprops="Routeparamsprops"
        />
    </div>



    </main>

</template>

<script>
export default {
    data() {
        return {

        count: 0,
    direction: 'forward',
    frame: 2,

            form:{
                search:''
            },
            queryId:'',
            items:{},
            galleris:{},


            totalItems: 0,
            per_page: 0,
            totalitems:0,
            Totalpageprops:[],
            Routenameprops:'',
            Routeparamsprops:{},
        }
    },

    watch: {
        '$route': async function (to, from) {
            this.getItems(this.queryId);
        }
    },
    methods: {

        async getItems(id=''){
            this.queryId = id
            var page = 1;
            if(this.$route.query.page){
                page = this.$route.query.page;
            }

            var queryId = '';
            if(this.queryId){
                queryId = `&id=${id}`

            }


            var res = await this.callApi('get',`/api/galleries/front/images?page=${page}${queryId}`,[]);



            var galleryItems = res.data.galleryItems

            this.galleris = res.data.gallery

            this.items = galleryItems.data
            this.totalItems = galleryItems.total


            this.per_page = galleryItems.per_page
            this.totalitems = galleryItems.total
            this.Totalpageprops = galleryItems.links
            this.Routenameprops = 'gallery'

        },
        previous() {
     this.count--
      this.scroll("previous")
  },
    next() {
        this.count++
      this.scroll("next")
    },
    scroll(position) {
     let el = document.getElementById("slide")
      let pos = 0;
      let id = setInterval(frame, 5);
      let num = this.items.length - this.frame
      let width = 250;
      let resize = num * width
      let check = position == "reset" ? resize : width
          function frame() {
            if (pos == check) {
              clearInterval(id);
            } else {
              pos += 5;
              if(position == 'next'){
               el.scrollLeft += 5
              }else{
               el.scrollLeft -= 5
              }
            }
          }
    },

    slideLoop(pass) {
     let steps = this.items.length - this.frame
     if(this.count >= steps & pass == "forward"){
       this.direction = "backward"
        this.previous()
        return
      }
      if(this.count <= steps & pass == "backward"){
       if(this.count <= 0){
         this.count = 0
         this.direction = "forward"
          this.next();
          return
        }
       this.previous()
        return
      }
      if(this.count < steps & pass == "forward"){
       if(this.count < 0){
         this.resetScroll()
          return
        } else if(this.count == 0){
         this.next()
          return
        }
       this.next()
        return
      }
      this.resetScroll()
    },
    resetScroll(){
     this.count = 0
      this.direction = "forward"
      this.scroll("reset")
    }



    },
    mounted() {

        this.getItems();
    },
}
</script>
<style scoped>
body {
  background: #ffffff;
  min-height: 900px;
  position: relative;
  background-size: cover;
  font-family: 'Arimo', sans-serif; }

.page {
  background: white;
  max-width: 1280px;
  margin: 0 auto; }

.navbar-brand {
  font-size: 30px;
  font-weight: 600;
  letter-spacing: 1px; }
  @media (max-width: 992px) {
    .navbar-brand {
      display: none; } }

.pp-header {
  padding-top: 3rem; }
  .pp-header img {
    width: auto;
    height: 80px;
    margin-left: -12px; }
  .pp-header h1 {
    font-weight: 400; }
  .pp-header .navbar-nav {
    letter-spacing: 1px;
    font-family: 'Arimo', sans-serif;
    font-size: 18px;
    font-weight: 400; }
  @media (max-width: 576px) {
    .pp-header {
      padding-top: 0; } }

/* Body Section  */
.pp-category-filter a {
  display: inline-block;
  margin: 0 10px 6px 0;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 1px;
  border-radius: 3px; }

.pp-gallery {
  min-height: 500px; }
  .pp-gallery .card-columns .card {
    border: none;
    margin-bottom: 0;
    border-radius: none; }
  @media (max-width: 992px) {
    .pp-gallery .card-columns {
      -moz-column-count: 2;
           column-count: 2; } }
  @media (max-width: 576px) {
    .pp-gallery .card-columns {
      -moz-column-count: 1;
           column-count: 1; } }
  .pp-gallery .card figure {
    position: relative;
    overflow: hidden;
    margin: 10px 1%;
    text-align: center; }
  .pp-gallery .card figure img {
    position: relative;
    display: block;
    max-width: 100%;
    opacity: 1; }
  .pp-gallery .card figure figcaption {
    padding: 2em;
    color: #fff;
    text-transform: uppercase;
    font-size: 1.25em;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden; }
  .pp-gallery .card figure figcaption,
  .pp-gallery .card figure figcaption > a {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%; }
  .pp-gallery .card figure figcaption > a {
    z-index: 1000;
    text-indent: 200%;
    white-space: nowrap;
    font-size: 0;
    opacity: 0; }
  .pp-gallery .card figure .h4 {
    word-spacing: -0.15em;
    font-weight: 600; }
  .pp-gallery .card figure .h4,
  .pp-gallery .card figure p {
    margin: 0; }
  .pp-gallery .card figure p {
    letter-spacing: 1px;
    font-size: 60%; }
  .pp-gallery figure.pp-effect figcaption {
    padding: 12px; }
  .pp-gallery figure.pp-effect figcaption::before,
  .pp-gallery figure.pp-effect figcaption::after {
    position: absolute;
    content: '';
    opacity: 0; }
  .pp-gallery figure.pp-effect figcaption::before {
    top: 50px;
    right: 30px;
    bottom: 50px;
    left: 30px;
    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
    transform: scale(0, 1);
    transform-origin: 0 0; }
  .pp-gallery figure.pp-effect figcaption::after {
    top: 30px;
    right: 50px;
    bottom: 30px;
    left: 50px;
    border-right: 1px solid #fff;
    border-left: 1px solid #fff;
    transform: scale(1, 0);
    transform-origin: 100% 0; }
  .pp-gallery figure.pp-effect .h4 {
    padding-top: 26%;
    transition: transform 0.35s;
    opacity: 0; }
  .pp-gallery figure.pp-effect p {
    padding: 0.5em 2em;
    text-transform: none;
    opacity: 0;
    transform: translate3d(0, -10px, 0); }
  .pp-gallery figure.pp-effect img,
  .pp-gallery figure.pp-effect .h4 {
    transform: translate3d(0, -25px, 0); }
  .pp-gallery figure.pp-effect img,
  .pp-gallery figure.pp-effect figcaption::before,
  .pp-gallery figure.pp-effect figcaption::after,
  .pp-gallery figure.pp-effect p {
    transition: opacity 0.35s, transform 0.35s; }
  .pp-gallery figure.pp-effect:hover img {
    opacity: 1;
    transform: translate3d(0, 0, 0); }
  .pp-gallery figure.pp-effect:hover figcaption::before,
  .pp-gallery figure.pp-effect:hover figcaption::after {
    opacity: 1;
    transform: scale(1); }
  .pp-gallery figure.pp-effect:hover figcaption:before {
    background: rgba(31, 30, 30, 0.5); }
  .pp-gallery figure.pp-effect:hover .h4,
  .pp-gallery figure.pp-effect:hover p {
    opacity: 1;
    transform: translate3d(0, 0, 0);
    color: #FFFFFF; }
  .pp-gallery figure.pp-effect:hover figcaption::after,
  .pp-gallery figure.pp-effect:hover .h4,
  .pp-gallery figure.pp-effect:hover p,
  .pp-gallery figure.pp-effect:hover img {
    transition-delay: 0.15s; }
  @media (max-width: 768px) and (min-width: 578px) {
    .pp-gallery figure.pp-effect:hover .h4 {
      padding-top: 20%;
      font-size: 16px; } }
  @media (max-width: 375px) {
    .pp-gallery figure.pp-effect:hover .h4 {
      padding-top: 20%;
      font-size: 16px; } }

/* Footer sectiom */
.pp-footer {
  background: #f8f8f8; }
  .pp-footer a.credit {
    color: inherit;
    border-bottom: 1px dashed;
    text-decoration: none; }
  .pp-footer .fa {
    width: 18px; }
  .pp-footer .fa-2x {
    font-size: 22px; }
  .pp-footer i {
    color: #888; }
  .pp-footer .pp-facebook:hover i {
    color: #3b5998; }
  .pp-footer .pp-twitter:hover i {
    color: #1da1f2; }
  .pp-footer .pp-youtube:hover i {
    color: #ff0000; }
  .pp-footer .pp-instagram:hover i {
    color: #405de6; }

/* About page */
.pp-about .pp-client-brand {
  text-align: center; }
  .pp-about .pp-client-brand img {
    opacity: 0.6;
    width: 90%; }

.pp-about .pp-client-brand img:hover {
  opacity: 1; }

.pp-about .pp-team .h5 {
  padding-top: 15px; }

.pp-about .pp-team img {
  width: 80%; }

@media (max-width: 768px) {
  .pp-about .pp-team p {
    margin-bottom: 2rem; } }

/* Contact page */
.pp-contact textarea {
  min-height: 200px; }

.pp-contact .pp-contact-message {
  padding-left: 5rem; }

@media (max-width: 768px) {
  .pp-contact .h4 {
    padding-top: 4rem; }
  .pp-contact .pp-contact-message {
    padding-left: 0; } }

/*Blog Page*/
.pp-container-readable {
  box-sizing: border-box;
  margin-left: auto;
  margin-right: auto;
  max-width: 760px;
  width: 100%;
  padding-right: 1rem;
  padding-left: 1rem; }
  .pp-container-readable .pp-post {
    margin-bottom: 50px; }
    .pp-container-readable .pp-post + .pp-post {
      padding-top: 50px;
      border-top: 1px solid rgba(228, 226, 226, 0.7); }
    .pp-container-readable .pp-post .pp-post-meta {
      color: #aaa;
      margin-bottom: 24px; }
      .pp-container-readable .pp-post .pp-post-meta ul {
        list-style: none;
        margin: 0;
        padding: 0; }
        .pp-container-readable .pp-post .pp-post-meta ul li {
          display: inline;
          padding-right: 18px; }
          .pp-container-readable .pp-post .pp-post-meta ul li i {
            padding-right: 5px; }
    .pp-container-readable .pp-post .pp-post-title {
      margin-top: 18px;
      margin-bottom: 8px; }
    .pp-container-readable .pp-post a {
      text-decoration: none; }
    .pp-container-readable .pp-post .pp-post-read-more {
      padding-top: 10px; }
  .pp-container-readable .pp-pagination {
    padding-top: 2rem; }
    .pp-container-readable .pp-pagination ul {
      list-style-type: disc;
      border-radius: 4px;
      padding: 0; }
      .pp-container-readable .pp-pagination ul li {
        display: inline-block;
        margin-right: 2px; }
        .pp-container-readable .pp-pagination ul li a {
          border: 2px solid #eeeeee;
          border-radius: 3px;
          display: block;
          float: none;
          padding: 8px 15px;
          text-decoration: none; }
        .pp-container-readable .pp-pagination ul li a:hover {
          box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.08); }

/* Blog Post Page */
.pp-blog-details {
  margin-top: 20px; }
  .pp-blog-details blockquote {
    font-style: italic;
    padding-left: 20px;
    margin-right: 20px; }
  .pp-blog-details .pp-tags {
    margin-top: 40px;
    margin-bottom: 60px; }
    .pp-blog-details .pp-tags a {
      margin-right: 10px; }
  .pp-blog-details .pp-comments .media {
    margin-top: 3rem; }
    .pp-blog-details .pp-comments .media .fa {
      padding-right: 5px; }
    @media (max-width: 576px) {
      .pp-blog-details .pp-comments .media {
        display: block; } }
  .pp-blog-details .pp-comments img {
    height: 60px;
    width: 60px; }
  .pp-blog-details .pp-comments a {
    text-decoration: none; }
  .pp-blog-details .pp-comments span {
    padding-left: 6px; }

/* Common Style */
.pp-section {
  padding-top: 6rem; }


  .btn-primary {
    background: var(--defaultColor);
    border: 1px solid var(--defaultColor);
}

.btn-outline-primary {
    border: 1px solid var(--defaultColor);
    color: var(--defaultColor);
}









#slide {
  display: flex;
  overflow: hidden;
  /* align-items: flex-start; */
  align-items: center;
}
.catitems{
    flex: 0 0 auto;
}

.prev, .next {
    display: flex;
    cursor: pointer;
    justify-content: space-around;
    align-items: center;
    margin-bottom: 0;
    color: var(--defaultColor);
}


</style>
