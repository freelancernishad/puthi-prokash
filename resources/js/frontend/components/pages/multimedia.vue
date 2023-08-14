<template>
    <main>

<section class="container px-2" style="padding-top: 50px;">

    <Breadcrumb :pages="[{'route':'home','params':{},'text':'হোম'},{'route':'','params':{},'text':'মাল্টিমিডিয়া'}]"/>




    <div class=" my-4 row w-100"  style="margin: 0;">
    <div class="align-items-center col-md-6 d-flex justify-content-between">
        <img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px">
    <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4">মাল্টিমিডিয়া</p>
    <p  class="border-3 border-bottom border-top d-inline fs-4 mb-0 px-4">0</p>
    </div>

    <div class="col-md-6 d-flex gap-5 py-2">

        <form class="d-flex" style="width: 90%;" @submit.stop.prevent="searchItem">
          <input type="text" placeholder="আপনার কাঙ্খিত বই খুঁজুন" v-model="form.search" class="form-control writer-search-input">
          <button type="submit" class="writer-search-button" ><i class="fa-regular fa-magnifying-glass"></i></button>
        </form>



        <router-link class="fs-5 nav-link text-dark position-relative" aria-current="page" :to="{name:'cart'}">
                  <img width="35px" :src="$asseturl+'assets/image/cart-icon.png'"/><span class="CartQuantity2">{{ getCartQuantity  }}</span>
                </router-link>


    </div>
    </div>
    </section>


    <section class="container">
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
    data() {
        return {
            form:{
                search:''
            },
            items:{},


            totalItems: 0,
            per_page: 0,
            totalitems:0,
            Totalpageprops:[],
            Routenameprops:'',
            Routeparamsprops:{},
        }
    },
    methods: {

        async getItems(){
            var page = 1;
            if(this.$route.query.page){
                page = this.$route.query.page;
            }
            var res = await this.callApi('get',`/api/multimedia?page=${page}`,[]);


            this.items = res.data.data
            this.totalItems = res.data.total


            this.per_page = res.data.per_page
            this.totalitems = res.data.total
            this.Totalpageprops = res.data.links
            this.Routenameprops = 'multimedia'

        }
    },
    mounted() {

        this.getItems();
    },
}
</script>
<style >


.iframeContainer iframe {
    width: 100% !important;
    height: 100% !important;
}

.multimediaContainer .col .card{
    height: 100% !important;
}
</style>
