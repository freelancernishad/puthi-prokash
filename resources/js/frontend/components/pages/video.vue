<template>
    <main>

<section class="container px-2" style="padding-top: 50px;">

    <Breadcrumb :pages="[{'route':'home','params':{},'text':'হোম'},{'route':'','params':{},'text':'ভিডিও'}]"/>




    <div class=" my-4 row w-100"  style="margin: 0;">
    <div class="align-items-center col-md-6 d-flex justify-content-between">
        <img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px">
    <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4">ভিডিও</p>
    <!-- <p  class="border-3 border-bottom border-top d-inline fs-4 mb-0 px-4">0</p> -->
    </div>

    <div class="col-md-6 d-flex gap-5 py-2" style="flex-direction: row-reverse;">
<!--
        <form class="d-flex" style="width: 90%;" @submit.stop.prevent="searchItem">
          <input type="text" placeholder="আপনার কাঙ্খিত বই খুঁজুন" v-model="form.search" class="form-control writer-search-input">
          <button type="submit" class="writer-search-button" ><i class="fa-regular fa-magnifying-glass"></i></button>
        </form> -->



        <router-link class="fs-5 nav-link text-dark position-relative" aria-current="page" :to="{name:'cart'}">
                  <img width="35px" :src="$asseturl+'assets/image/cart-icon.png'"/><span class="CartQuantity2">{{ getCartQuantity  }}</span>
                </router-link>


    </div>
    </div>
    </section>











    <section class="container">






<div class="container px-0 py-4">
  <div class="pp-category-filter">
    <div class="row">


        <p @click="previous" class="prev col-sm-1 text-center">
            <i class="fas fa-chevron-left fa-fw"></i>
        </p>
        <div class="col-sm-10" id="slide">
            <button :class="queryId=='' ? 'btn-primary text-white' : 'btn-outline-primary'"  class="btn pp-filter-button catitems mr-2" @click="getItems()" href="#" style="margin-right: 6px;" >All</button>
            <button v-for="(gallery,indexG) in categoris" :key="`indexG${indexG}`" :class="queryId==gallery.id ? 'btn-primary  text-white' : 'btn-outline-primary'" @click="getItems(gallery.id)" class="btn pp-filter-button catitems" style="margin-right: 5px;">{{ gallery.name }}</button>
        </div>
        <P @click="next" class="next col-sm-1 text-center">
            <i class="fas fa-chevron-right fa-fw"></i>
        </P>

    </div>
  </div>
</div>


        <div class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-2 multimediaContainer">


            <div class="col" v-for="(item,index) in items" :key="index">
                <div class="card">
                    <div class="card-body" v-if="item.media_type=='video'">
                        <video width="100%"  controls>
                            <source :src="$asseturl+item.media_url">
                        </video>
                    </div>
                    <div class="card-body iframeContainer" v-else v-html="item.media_url"></div>

                    <div class="card-footer">{{ item.title }}</div>
                </div>
            </div>


        </div>
    </section>

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
    created(){
//    var slide = setInterval(()=>this.slideLoop(this.direction),2000)
  },
    data() {
        return {

            itemss: [
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg'
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg'
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg'
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg'
          }
        ],

        count: 0,
    direction: 'forward',
    frame: 2,






            form:{
                search:''
            },
            items:{},
            categoris:{},

            queryId:'',
            totalItems: 0,
            per_page: 0,
            totalitems:0,
            Totalpageprops:[],
            Routenameprops:'',
            Routeparamsprops:{},
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

            var res = await this.callApi('get',`/api/multimedia/front/images?page=${page}${queryId}`,[]);



            var galleryItems = res.data.items

            this.categoris = res.data.category

            this.items = galleryItems.data
            this.totalItems = galleryItems.total


            this.per_page = galleryItems.per_page
            this.totalitems = galleryItems.total
            this.Totalpageprops = galleryItems.links
            this.Routenameprops = 'multimedia'




            // this.items = res.data.data
            // this.totalItems = res.data.total


            // this.per_page = res.data.per_page
            // this.totalitems = res.data.total
            // this.Totalpageprops = res.data.links
            // this.Routenameprops = 'multimedia'

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


.iframeContainer iframe {
    width: 100% !important;
    height: 100% !important;
}

.multimediaContainer .col .card{
    height: 100% !important;
}



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
