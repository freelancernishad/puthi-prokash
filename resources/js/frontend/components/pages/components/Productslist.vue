<template>
    <div>
<section class="container mb-3">
        <div class="align-items-center  d-flex fs-3 gap-2 text-white py-1" style="width: 200px; background-color: #F35B43;">
            <i class="ms-4 fa-solid fa-bars fs-3"></i> <p class="mb-0">{{ category_name }}</p>
        </div>

        <div class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-6 row-cols-md-2 row-cols-sm-2 row-cols-2">


            <Product v-for="(product,index) in products" :key="'product'+index" :product="product" @show_details="showDetialsFun(1,product.id,product)"/>

            <Productdetails v-if="showDetials==1" :product="showDetialsProduct" />






    <router-link class="fs-5 mb-0 mb-2 my-2 text-center text-decoration-none text-dark w-100" :to="{name:'Products',query:{category:category_id}}">পরবর্তী <i class="fa-regular fa-chevron-right ms-2 text-danger"></i></router-link>
<!--
    <router-link v-if="children.length === 0" class="fs-5 mb-0 mb-2 my-2 text-center text-decoration-none text-dark w-100" :to="{name:'Products',params:{category:category_slug}}">পরবর্তী <i class="fa-regular fa-chevron-right ms-2 text-danger"></i></router-link> -->

    <!-- <router-link v-else class="fs-5 mb-0 mb-2 my-2 text-center text-decoration-none text-dark w-100" :to="{name:'categoryProduct',params:{category:category_slug}}">পরবর্তী <i class="fa-regular fa-chevron-right ms-2 text-danger"></i></router-link> -->


    </div>
    </section>





    <div v-if="modalOpen" @click="closeModal" class="modal-overlay">
      <div class="modal-container">
        <img :src="imageUrl" alt="Modal Image" />
      </div>
    </div>




</div>
</template>



<script>
export default {
    props: {
        category_name: {
            type: String,
            default: ''
        },
        category_slug: {
            type: String,
            default: ''
        },
        category_id: {
            type: Number,
            default: 0
        },
        products: {
            type: Array,
            default: function() {
                    return [];
                }
        },
        children: {
            type: Array,
            default: []
        },
    },
    data() {
        return {
            showDetials:0,
            productId:0,
            showDetialsProduct:{},
            modalOpen: false,
            imageUrl:'',
        }
    },
    methods: {

        showDetialsFun(id,productid,showDetialsProduct){
            if(this.showDetials==id && this.productId==productid){
                this.showDetials = 0;
                this.productId = 0;
            }else{
                this.showDetials = id;
                this.productId = productid;
                this.showDetialsProduct = showDetialsProduct

            }
        },






    },
    mounted() {

    },
}
</script>
