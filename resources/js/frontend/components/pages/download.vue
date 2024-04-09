<template>
    <main>

<section class="container px-2" style="padding-top: 50px;">

    <Breadcrumb :pages="[{'route':'home','params':{},'text':'হোম'},{'route':'','params':{},'text':'Download'}]"/>




    <div class=" my-4 row w-100"  style="margin: 0;">
    <div class="align-items-center col-md-6 d-flex justify-content-between">
        <img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px">
    <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4">Download</p>
    <!-- <p  class="border-3 border-bottom border-top d-inline fs-4 mb-0 px-4">0</p> -->
    </div>

        <!-- <div class="col-md-6 d-flex gap-5 py-2">

            <form class="d-flex" style="width: 90%;" @submit.stop.prevent="searchItem">
            <input type="text" placeholder="আপনার কাঙ্খিত বই খুঁজুন" v-model="form.search" class="form-control writer-search-input">
            <button type="submit" class="writer-search-button" ><i class="fa-regular fa-magnifying-glass"></i></button>
            </form>



            <router-link class="fs-5 nav-link text-dark position-relative" aria-current="page" :to="{name:'cart'}">
                    <img width="35px" :src="$asseturl+'assets/image/cart-icon.png'"/><span class="CartQuantity2">{{ getCartQuantity  }}</span>
                    </router-link>
        </div> -->

    </div>
    </section>


    <div class="downloadHeadHero">
        <h2 class="text-center text-white">Search your Document</h2>
        <div class="container">
        <div class="row">
            <div class="col-md-7 mt-3">
                <form class="d-flex downloadSearchBox" @submit.prevent="SearchTitle">
                    <input type="text" placeholder="Title Name" v-model="title" class="downloadTitleSearch">
                    <button type="submit"><i class="fa-regular fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="col-md-5 mt-3">

                <form class="d-flex downloadSearchBox" @submit.prevent="SearchDate">
                    <input type="date" placeholder="Title Name" v-model="published_date" class="downloadTitleSearch">
                    <button type="submit"><i class="fa-regular fa-magnifying-glass"></i></button>
                </form>

            </div>
        </div>
        </div>
    </div>






    <section class="container">


        <div class="row">



                <div class="col-12 card downloadContainer"  v-for="(item,index) in items" :key="index">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-3 contentItem">
                                <h4>Published Date</h4>
                                <p>{{ item.published_date }}</p>
                            </div>

                            <div class="col-7 contentItem">
                                <h4>Document Title</h4>
                                <p>{{ item.title }}</p>
                            </div>

                            <div class="col-2 contentItem">
                                <h4>Action</h4>
                                <div class="d-flex justify-content-between downloadActionButtons">
                                    <router-link :to="{name:'downloadView',params:{id:item.id}}">View</router-link>
                                    <a :href="$asseturl+item.file">Download</a>
                                </div>
                            </div>

                        </div>

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
            categoris:{},


            totalItems: 0,
            per_page: 0,
            totalitems:0,
            Totalpageprops:[],
            Routenameprops:'',
            Routeparamsprops:{},
            title:'',
            published_date:'',
        }
    },
    methods: {


        SearchTitle(){
            this.getItems();
        },


        SearchDate(){
            this.getItems();
        },


        async getItems(id=''){
            this.queryId = id
            var page = 1;
            if(this.$route.query.page){
                page = this.$route.query.page;
            }

            var title = '';
            if(this.title){
                title = `&title=${this.title}`
            }

            var published_date = '';
            if(this.published_date){
                published_date = `&published_date=${this.published_date}`
            }

            var queryId = '';
            if(this.queryId){
                queryId = `&id=${id}`

            }
            var res = await this.callApi('get',`/api/downloads?page=${page}${queryId}${title}${published_date}`,[]);
            var galleryItems = res.data
            this.items = galleryItems.data
            this.totalItems = galleryItems.total
            this.per_page = galleryItems.per_page
            this.totalitems = galleryItems.total
            this.Totalpageprops = galleryItems.links
            this.Routenameprops = 'download'

        }
    },
    mounted() {

        this.getItems();
    },
}
</script>
<style scoped>


.contentItem h4 {
    color: var(--defaultColor);
    font-size: 20px;
}
.contentItem p {

    font-size: 16px;
}

.downloadActionButtons a {
    color: black;
    text-decoration: underline !important;
    font-weight: 500;
}

.downloadContainer {
    border: 0;
    box-shadow: 5px 5px 14px 0px #f15c4666;
    background: #E9E7E7;
    margin-top: 40px;
}

.downloadHeadHero {
    background: #f1614d;
    padding: 50px 30px;
}

.downloadSearchBox input {
    width: 100%;
    border: 0;
    padding: 8px 8px;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    font-size: 27px;
}

.downloadSearchBox button {border: 0;padding: 8px 16px;color: var(--defaultColor);background: white;border-bottom-right-radius: 10px;border-top-right-radius: 10px;}
</style>
