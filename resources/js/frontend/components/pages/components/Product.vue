<template>

            <div class="col cursor-pointer"  @click="$emit('show_details')">
                <div class="text-decoration-none productimage">
                    <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
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
