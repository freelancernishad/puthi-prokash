<template>


<div class="align-items-center border d-flex flex-wrap  mb-5 py-4 w-100 position-relative mt-5" style="grid-gap:15px" >
            <button class="singleProductcloseButton" @click="$emit('close_detials')"><i class="fa-regular fa-xmark"></i></button>
            <button class="singleProductCollectedButton" @click="addToCart({'product_id':product.id})">সংগ্রহ করুন</button>

                    <div>
                        <img :src="$asseturl+product.image"
                            alt="" style="width: 195px;  height: 255px">
                    </div>
                    <div>

                        <router-link :to="{name:'productSingle',params:{id:product.id}}" class="mb-0" style="    color: #037adb;font-weight: bold;" >{{ product.name }}</router-link>
                        <p class="mb-0 fs-9 product-lebel-text" style="color: #0000008f;">Price : {{ product.price-product.discount }}</p>
                        <p class="mb-0  fs-8 product-lebel-text orgPrice" style="color: #0000008f;">Regular Price : {{ product.price }}</p>

                        <button class="singleProductCollectedButton2" @click="addToCart({'product_id':product.id})">সংগ্রহ করুন</button>


                        <p class="mb-0  fs-8 mt-3 mb-2" style="font-weight: bold;">উল্লেখযোগ্য অংশবিশেষ</p>
                        <div>
                            <div class="d-flex flex-wrap">



                                <img :src="$asseturl+flipping_book.image" v-for="(flipping_book,index) in product.flipping_books" :key="'flipping_books'+index" @click="openModal($asseturl+flipping_book.image,index,product.flipping_books)"  class="img-thumbnail sampleBooks" role="button">




                            </div>
                        </div>
                    </div>



                    <div v-if="modalOpen"  class="modal-overlay">
                        <div class="modal-container" >
                            <span class="imageshowCloseButton" @click="closeModal"><i class="fa-regular fa-xmark"></i></span>
                            <button class="ImageModalButton" @click="preImage" :disabled="imageUrlIndex == 0"><i class="fa-solid fa-chevron-left" style="margin-top: 12px;"></i></button>
                            <img :src="imageUrl" alt="Modal Image" />
                            <button class="ImageModalButton" @click="nextImage" :disabled="imageUrlIndex == 3"><i class="fa-solid fa-chevron-right" style="margin-top: 12px;"></i></button>

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
        imageUrls:'',
        imageUrlIndex:0,
        }
    },




}
</script>

<style scoped>

.singleProductCollectedButton {
        display: block;
    }
    .singleProductCollectedButton2 {
        display: none;
    }
@media (max-width:768px) {

    .singleProductCollectedButton {
        display: none;
    }
    .singleProductCollectedButton2 {
        display: block;
    }

}

</style>>
