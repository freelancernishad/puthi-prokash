<template>
    <div>
<section class="container mb-3">
        <div class="align-items-center  d-flex fs-3 gap-2 text-white py-1" style="width: 200px; background-color: #F35B43;">
            <i class="ms-4 fa-solid fa-bars fs-3"></i> <p class="mb-0">{{ category_name }}</p>
        </div>




        <div class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-6 row-cols-md-2 row-cols-sm-2 row-cols-2" v-for="(productRow,index) in products" :key="'productRow'+index">

            <Product v-for="(product,indexs) in productRow" :key="'product'+indexs"  :product="product" @show_details="showDetialsFun(index,product.id,product)"/>

            <Productdetails v-if="showDetials==index" :product="showDetialsProduct" />


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
            type: String,
            default: ''
        },
        products: {
            type: Array,
            default: []
        },
        children: {
            type: Array,
            default: []
        },
    },
    data() {
        return {
            showDetials:-1,
            productId:0,
            showDetialsProduct:{},
            modalOpen: false,
            imageUrl:'',
        }
    },
    methods: {

        showDetialsFun(id,productid,showDetialsProduct){
            if(this.showDetials==id && this.productId==productid){
                this.showDetials = -1;
                this.productId = -1;
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
