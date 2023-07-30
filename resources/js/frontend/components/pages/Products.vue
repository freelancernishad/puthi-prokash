<template>
    <main>






<section class="container px-2" style="padding-top: 50px;">



    <Breadcrumb :pages="Breadcrumb"/>

    <div class="my-4 row w-100" style="width: 102.5% !important;">
    <div class="align-items-center col-md-6 d-flex justify-content-between">
        <img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px">

    <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4" v-if="searchItem">{{ searchItem }}</p>
    <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4" v-else>{{ categoris.name }}</p>

    <p  class="border-3 border-bottom border-top d-inline fs-4 mb-0 px-4">{{ totalItems }}</p>
    </div>

    <div class="col-md-6 d-flex gap-5 py-2">
        <select class="form-select"  style="width: 45%;" aria-label="Default select example" v-model="sort" @change="filterBooks">
        <option selected value="">বাছাইয়ের ধরণ</option>
        <option value="latest">নতুন বই</option>
        <option value="oldest">পুরাতন বই</option>
        <option value="bangla_asc">শিরনাম অ-ক্ষ</option>
        <option value="bangla_desc">শিরনাম ক্ষ-অ</option>
        <!-- <option value="az">শিরনাম a-z</option>
        <option value="za">শিরনাম z-a</option> -->
        <option value="price_low_high">মূল্য নিম্ন-উচ্চ</option>
        <option value="price_high_low">মূল্য উচ্চ-নিম্ন</option>
      </select>


      <form class="d-flex" style="width: 45%;" @submit.stop.prevent="searchItem">
          <input type="text" placeholder="আপনার কাঙ্ক্ষিত বইটি খুজে বের করুন"  class="form-control writer-search-input">
          <button type="submit" class="writer-search-button" ><i class="fa-regular fa-magnifying-glass"></i></button>
        </form>



        <router-link class="fs-5 nav-link text-dark" aria-current="page" :to="{name:'cart'}">
                  <img width="35px" :src="$asseturl+'assets/image/cart-icon.png'"/>
                </router-link>


    </div>
    </div>
    </section>









    <Productslistpaginate  :key="'childrenProduct'" :category_name="categoris.name" :category_slug="categoris.slug" :products="items" :children="categoris.children"/>


    <div class="container">

        <Paginaion
        :per_page="per_page"
        :totalitems="totalitems"
        :Totalpageprops="Totalpageprops"
        :Routenameprops="Routenameprops"
        :Routeparamsprops="Routeparamsprops"
        />

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
            searchItem:'',
            sort:'',
            category:'',
            author:'',
            modalOpen: false,
            imageUrl:'',
            categoris:{children:[]},
            items:[],
            parentCategory:{},
            allParents:[],
            Breadcrumb:[],
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
            if(this.searchItem){
                if(this.$route.query.search) this.searchItem = this.$route.query.search;
              this.getCategoryProduct();
            }else{


            }


        }
    },
    methods: {

        Products(data) {
            const result = [];
            for (let i = 0; i < data.length; i += 6) {
                result.push(data.slice(i, i + 6));
            }
            this.items = result;
            },


            filterBooks(){
                this.getCategoryProduct()

            },



        async getCategoryProduct(page=1){

            if(this.$route.query.page) page = this.$route.query.page;



            var searchQuery = '';
            var sortQuery = '';
            var categoryQuery = '';
            var authorQuery = '';

            if(this.author){
                authorQuery = `&author=${this.author}`
            }
            if(this.category){
                categoryQuery = `&category=${this.category}`
            }
            if(this.sort){
                sortQuery = `&sort=${this.sort}`
            }
            if(this.searchItem){
                searchQuery = `&search=${this.searchItem}`
            }



            const query = { page: page };

            if (this.sort) {
            query.sort = this.sort;
            }

            if (this.searchItem) {
                query.search = this.searchItem;
            }

            if (this.category) {
            query.category = this.category;
            }

            if (this.author) {
            query.author = this.author;
            }



                this.$router.push({ name: 'Products', query: query });












            var res = await this.callApi('get',`/api/filter/products?page=${page}${categoryQuery}${sortQuery}${authorQuery}${searchQuery}`,[]);




            this.Products(res.data.products.data);
            this.totalItems = res.data.products.total


            this.per_page = res.data.products.per_page
            this.totalitems = res.data.products.total
            this.Totalpageprops = res.data.products.links
            this.Routenameprops = 'Products'
            this.Routeparamsprops = {category:this.$route.query.category}


            // this.items = res.data.products.data


            this.categoris = res.data.category


            this.allParents = [];
            this.Breadcrumb = [{'route':'home','params':{},'text':'হোম'}];

            var parantCategory = this.getAllParents(this.categoris.parent);
            parantCategory.sort((a, b) => b.serialId - a.serialId)
            parantCategory.forEach(parent => {
                this.Breadcrumb.push(
                    {'route':'categoryProduct','params':{'category':parent.item.slug},'text':parent.item.name}
                )
            });
            if(this.searchItem){
                this.Breadcrumb.push(
                    {'route':'','params':{},'text':this.searchItem}
                    );
            }else{

                this.Breadcrumb.push(
                    {'route':'','params':{},'text':this.categoris.name}
                    );
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
        if(this.$route.query.sort) this.sort = this.$route.query.sort;
        if(this.$route.query.category) this.category = this.$route.query.category;
        if(this.$route.query.author) this.author = this.$route.query.author;
        if(this.$route.query.search) this.searchItem = this.$route.query.search;
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
