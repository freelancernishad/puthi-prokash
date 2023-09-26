<template>


<div v-if="car_modal_open"  class="modal-overlay">
                        <div class="modal-container" style="min-width: 80% !important;" >


                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between" style="background: #5C636A;color: white;">
                                    <div class="d-flex align-items-center gap-2">
                                        <img width="40px" :src="$asseturl+'assets/image/only_Logo.png'" alt="">
                                        <h3 class="mb-0">Cart Summary</h3>
                                    </div>

                                    <span class="CartCloseButton" @click="$emit('CartCloseModal')"><i class="fa-regular fa-xmark"></i></span>
                                </div>
                                <div class="card-body">


                                    <div v-for="(cart,index) in getCarts" :key="'cart'+index">
                                        <div class="d-flex gap-3">
                                        <img width="70px" :src="$asseturl+cart.product.image" class="img-sm">
                                        <figcaption style="text-align: left;">
                                            <a href="#" class="title text-dark" data-abc="true">{{ cart.product.name }}</a>
                                            <p class="text-muted small" >
                                                TK {{ getDiscountedPrice(cart) }} X {{ cart.quantity }} = TK {{ getDiscountedPrice(cart)*cart.quantity }}
                                            </p>
                                        </figcaption>
                                    </div>

                                        <hr v-if="getCarts.length>1">

                                    </div>



                                </div>
                                <div class="card-footer">
                                    <h3>Total = TK. {{ finalSubtotal }}</h3>
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <router-link :to="{name:'home'}" class="btn btn-secondary"><i class="fa-solid fa-bags-shopping"></i> Shop More</router-link>
                                        <router-link :to="{name:'cart'}" class="btn btn-success"><i class="fa-solid fa-cart-circle-check"></i> Go to Cart</router-link>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
</template>



<script>
export default {


    props: {
        car_modal_open: {
            type: Boolean,
            default: false
        },
    },


    computed:{

subtotal() {
    if (!Array.isArray(this.getCarts)) {
        return 0;
    }
    return this.getCarts.reduce((total, cart) => total + (cart.product.price*cart.quantity), 0);
},

finalSubtotal() {
    if (!Array.isArray(this.getCarts)) {
        return 0;
    }
    return this.getCarts.reduce((total, cart) => total + (this.getDiscountedPrice(cart)*cart.quantity), 0);
},

subtotalDiscount() {
    if (!Array.isArray(this.getCarts)) {
        return 0;
    }
    return this.getCarts.reduce((total, cart) => total + (this.getProductDiscount(cart)*cart.quantity), 0);
},

hasDiscount() {
    if (!Array.isArray(this.getCarts)) {
        return false;
    }
return function (cart) {
    return cart.product.discount_status==1;
};
}

},

methods: {
    getDiscountedPrice(cart) {
        if (this.hasDiscount(cart)) {
            if(cart.product.discount_type=='Fixed'){
                return cart.product.price-cart.product.discount
            }else
            if(cart.product.discount_type=='percent'){
                return cart.product.price-((cart.product.discount*cart.product.price)/100);
            }
        }
        return cart.product.price;

        },

        getProductDiscount(cart) {
        if (this.hasDiscount(cart)) {
            if(cart.product.discount_type=='Fixed'){
                return cart.product.discount
            }else
            if(cart.product.discount_type=='percent'){
                return (cart.product.discount*cart.product.price)/100;
            }
        }
        return 0;
        },

},




}
</script>
