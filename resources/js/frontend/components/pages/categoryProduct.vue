<template>
    <main>

        <section class="container px-2" style="padding-top: 50px;">

            <Breadcrumb :pages="Breadcrumb"/>




            <div class=" my-4 row w-100" style="margin: 0;">
            <div class="align-items-center col-md-6 d-flex justify-content-between">
                <img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px">
            <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4">{{ items.name }}</p>
            <!-- <p  class="border-3 border-bottom border-top d-inline fs-4 mb-0 px-4">{{ totalItems }}</p> -->
            </div>

            <div class="col-md-6 d-flex gap-3 py-2">
                <select class="form-select" style="width: 45%;" aria-label="Default select example">
                <option selected>বাছাইয়ের ধরণ</option>

                <option value="1">  কবি</option>
                <option value="2">সাহিত্যিক</option>
                <option value="3">গল্পকার</option>
                <option value="3">প্রাবন্ধিক</option>
                <option value="3">জীবন-আদশ</option>
                <option value="3">ধম</option>
            </select>



                <button type="button" class="writer-search-button mobileSearchButton" v-if="!mobileSearchdesabled" @click="mobileSearch = !mobileSearch" >
                    <i class="fa-regular fa-magnifying-glass" v-if="!mobileSearch" ></i>
                    <i class="fa-solid fa-xmark" v-else></i>
                </button>



                <form class="d-flex mobileSearchForm" style="width: 45%;" @submit.stop.prevent="searchBooks"  v-if="mobileSearchdesabled" >
                <input type="text" placeholder="আপনার কাঙ্খিত বই খুঁজুন" v-model="form.search" class="form-control writer-search-input">
                <button type="submit" class="writer-search-button" ><i class="fa-regular fa-magnifying-glass"></i></button>
                </form>



                <router-link class="fs-5 nav-link text-dark position-relative" aria-current="page" :to="{name:'cart'}" style="    margin-left: 25px;">
                        <img width="35px" :src="$asseturl+'assets/image/cart-icon.png'"/><span class="CartQuantity2">{{ getCartQuantity  }}</span>
                        </router-link>


            </div>


            <div class="col-md-12" v-if="!mobileSearchdesabled">
                <form class="d-flex mobileSearchForm" style="width: 100%;" @submit.stop.prevent="searchBooks"  v-if="mobileSearch" >
                <input type="text" placeholder="আপনার কাঙ্খিত বই খুঁজুন" v-model="form.search" class="form-control writer-search-input">
                <button type="submit" class="writer-search-button" ><i class="fa-regular fa-magnifying-glass"></i></button>
                </form>
            </div>

            </div>
    </section>







<div  v-if="items.children.length === 0">

    <Productslist  :key="'children'" :category_name="items.name" :category_slug="items.slug" :category_id="items.id" :products="items.products" :children="items.children" v-if="items.products.length>0"/>

</div>

<div  v-else>
    <Productslist v-for="(item,index) in items.children" :key="'children'+index" :category_id="item.id" :category_name="item.name" :category_slug="item.slug" :products="item.products" :children="item.children" v-if="item.products.length>0"/>
</div>









    <div v-if="modalOpen" @click="closeModal" class="modal-overlay">
      <div class="modal-container">
        <img :src="imageUrl" alt="Modal Image" />
      </div>
    </div>





    </main>

</template>



<script>
export default {
    data() {
        return {
            showDetials:0,
            totalItems:0,
            modalOpen: false,
            imageUrl:'',
            items:{children:[]},
            parentCategory:{},
            allParents:[],
            Breadcrumb:[],
            mobileSearch:false,
            mobileSearchdesabled:false,
            form:{
                search:''
            },
        }
    },
    watch: {
        '$route': async function (to, from) {

            this.getCategoryProduct();


        }
    },
    methods: {


        searchBooks(){
            this.$router.push({name:'Products',query:{search:this.form.search}});
        },

        showDetialsFun(id){
            console.log(id)
            if(this.showDetials==id){
                this.showDetials = 0;
            }else{
                this.showDetials = id;

            }
        },

        async getCategoryProduct(){
            var res = await this.callApi('get',`/api/categories/search/${this.$route.params.category}`,[]);
            this.items = res.data
            this.totalItems =   0

            this.allParents = [];
            this.Breadcrumb = [{'route':'home','params':{},'text':'হোম'}];

            var parantCategory = this.getAllParents(res.data.parent);
            parantCategory.sort((a, b) => b.serialId - a.serialId)
            parantCategory.forEach(parent => {
                this.Breadcrumb.push(
                    {'route':'categoryProduct','params':{'category':parent.item.slug},'text':parent.item.name}
                )
            });
            this.Breadcrumb.push(
                {'route':'','params':{},'text':res.data.name}
            );

            const windowWidth = window.innerWidth;
            if (windowWidth > 767) {
                this.mobileSearch = true
                this.mobileSearchdesabled = true
            }else{
                this.mobileSearch = false
                this.mobileSearchdesabled = false
            }

        },

         getAllParents(item,serialNumber = 1) {

            if (item) {

                this.allParents.push({
                    "serialId": serialNumber,
                    "item": {
                        'id':item.id,
                        'name':item.name,
                        'slug':item.slug,
                    },
                });

                this.getAllParents(item.parent,serialNumber + 1);
            }

            return this.allParents
        }



    },
    mounted() {
        this.getCategoryProduct();

    },
}
</script>
<style scoped>
        .btn-details {
            border-radius: 16px 5px 16px 5px;
            background: #030454;
            width: 100px;
            padding: 5px 20px;
        }

        .btn-wishlist {
            border-radius: 16px 5px 16px 5px;
            width: 130px;
        }

        .btn-cart {
            border-radius: 16px 5px 16px 5px;
            width: 100px;
            background-color: #EC593B;
        }

        .btn-share {
            background-color: #555F6A;

        }
        .product-lebel-text{
            font-size: calc(11pt + (12 - 11) * ((100vw - 300px) / (1600 - 300)));
        }
        .product-lebel-text.orgPrice{
            font-size: 9pt;
        }
        .productimage{
            padding: 5px 7px;
        }
</style>
