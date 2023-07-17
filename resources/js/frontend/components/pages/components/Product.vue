<template>

            <div class="col cursor-pointer"  @click="$emit('show_details')">
                    <div class="text-decoration-none productimage">


                        <div class="position-relative">
                            <img :src="$asseturl+product.image" alt="" width="100%"  srcset="" class="my-3 shadow">
                            <img :src="$asseturl+'assets/image/Preview-icon.png'" class="ProductPreviewIcon" alt="">
                        </div>

                        <div class="category-book-details text-center w-100">
                            <p class="mb-0 fs-7 text-dark">{{ product.name }}</p>

                            <p class="mb-0 fs-9 product-lebel-text">Price : {{ product.price-product.discount }}</p>

                            <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : {{ product.price }}</p>
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
}
</script>

<style scoped>
.ProductPreviewIcon{
    position: absolute;
    z-index: 9;
    bottom: 0;
    right: -14px;
    width: 44px;
}
</style>
