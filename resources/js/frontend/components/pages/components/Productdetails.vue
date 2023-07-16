<template>


<div class="align-items-center border d-flex flex-wrap  mb-5 py-4 w-100 position-relative" style="grid-gap:15px" >
            <button class="singleProductCollectedButton" @click="addToCart({'user_id':1,'product_id':product.id})">সংগ্রহ করুন</button>

                    <div>
                        <img :src="$asseturl+product.image"
                            alt="" style="width: 195px;  height: 255px">
                    </div>
                    <div>

                        <router-link :to="{name:'productSingle',params:{id:1}}" class="mb-0" >{{ product.name }}</router-link>
                        <p class="mb-0 fs-9 product-lebel-text">Price : {{ product.price-product.discount }}</p>
                        <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : {{ product.price }}</p>
                        <p class="mb-0  fs-8 mt-3">উল্লেখযোগ্য অংশবিশেষ</p>
                        <div>
                            <div class="d-flex">



                                <img :src="$asseturl+flipping_book.image" v-for="(flipping_book,index) in product.flipping_books" :key="'flipping_books'+index" @click="openModal($asseturl+flipping_book.image)"  class="img-thumbnail sampleBooks" role="button">




                            </div>
                        </div>
                    </div>



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
        product: {
            type: Object,
            default: {}
        },
    },
    data() {
        return {
            modalOpen: false,
        imageUrl:'',
        }
    },




}
</script>
