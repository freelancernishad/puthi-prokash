<template>
    <main>

<section class="mx-2 px-2" style="padding-top: 50px;">



    <Breadcrumb :pages="Breadcrumb"/>

    <div class=" my-4 row w-100">
    <div class="align-items-center col-md-6 d-flex justify-content-between">
        <img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px">
    <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4">{{ items.name }}</p>
    <p  class="border-3 border-bottom border-top d-inline fs-4 mb-0 px-4">৬০</p>
    </div>

    <div class="col-md-6 d-flex gap-5 py-2">
        <select class="form-select" aria-label="Default select example">
        <option selected>বাছাইয়ের ধরণ</option>
        <option value="1">  One</option>

        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    <select class="form-select" aria-label="Default select example">
        <option selected>ফিল্টার </option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select></div>
    </div>
    </section>








<div  v-if="items.children.length === 0">
    <Productslist  :key="'children'" :category_name="items.name" :category_slug="items.slug" :category_id="items.id" :products="items.products" :children="items.children"/>
</div>

<div  v-else>
    <Productslist v-for="(item,index) in items.children" :key="'children'+index" :category_id="item.id" :category_name="item.name" :category_slug="item.slug" :products="item.products" :children="item.children"/>
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
            modalOpen: false,
            imageUrl:'',
            items:{children:[]},
            parentCategory:{},
            allParents:[],
            Breadcrumb:[],
        }
    },
    watch: {
        '$route': async function (to, from) {

            this.getCategoryProduct();

        }
    },
    methods: {
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
