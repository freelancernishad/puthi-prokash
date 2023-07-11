<template>
    <main  style="padding-top: 75px;">

        <Breadcrumb :pages="[{'route':'home','text':'হোম'},{'route':'','text':'কার্ট'}]"/>



        <div class="container">
        <div class="container-fluid">
        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col" width="40%">Product</th>
                                    <th scope="col" width="25%">Quantity</th>
                                    <th scope="col" width="15%">Price</th>
                                    <th scope="col" width="15%">Total Price</th>
                                    <th scope="col" width="20%" class="text-right d-none d-md-block"></th>
                                </tr>
                            </thead>
                            <tbody>



                                <tr v-for="(cart,index) in carts" :key="'cart'+index">
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside"><img :src="$asseturl+cart.product.image" class="img-sm"></div>
                                            <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">{{ cart.product.name }}</a>
                                                <p class="text-muted small">
                                                    লেখক: {{ cart.product.author.name }}
                                                    <!-- SIZE: L  -->
                                                    <!-- <br>  -->
                                                    <!-- Brand: MAXTRA -->
                                                </p>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-around align-items-center" style="grid-gap:10px;" v-if="cartUpdate==index+1">
                                            <input type="Number" v-model="cart.quantity" class="form-control" min="1" >
                                            <i class="fa-regular fa-check text-success" role="button" @click="cartUpdateConfirmFun(cart.id)"></i>
                                            <i class="fa-regular fa-xmark text-danger" role="button" @click="cartUpdateCancelFun"></i>
                                        </div>

                                        <div class="d-flex justify-content-around align-items-center" style="grid-gap:10px;" v-else>
                                           <span>{{ cart.quantity }}</span>
                                           <i class="fa-solid fa-pen text-info" role="button" @click="cartUpdateEnablefun(index+1)"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price-wrap">


                                            <div v-if="cart.product.discount_status">

                                                <var class="price">{{ getDiscountedPrice(cart) }}</var>



                                                <p class="text-muted small">
                                                <del class="text-danger">{{ cart.product.price }}</del>
                                                </p>
                                            </div>


                                        <div v-else>
                                            <var class="price">{{ cart.product.price }}</var>
                                        </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="price-wrap"> <var class="price">{{ getDiscountedPrice(cart)*cart.quantity }}</var> </div>
                                    </td>
                                    <td class="text-right d-none d-md-block">
                                        <!-- <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip" data-abc="true"> <i class="fa fa-heart"></i></a>  -->
                                        <span @click="DeleteCartFromDb(cart.id)" class="btn btn-light" data-abc="true"> Remove</span> </td>
                                </tr>




                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>


            <aside class="col-lg-3">

                <!-- <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group"> <label>Have coupon?</label>
                                <div class="input-group"> <input type="text" class="form-control coupon" name="" placeholder="Coupon code"> <span class="input-group-append"> <button class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
                            </div>
                        </form>
                    </div>
                </div> -->


                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right ml-3"> {{ subtotal }}</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger ml-3"> -{{ subtotalDiscount }}</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right text-dark b ml-3"><strong> {{ finalSubtotal }}</strong></dd>
                        </dl>
                        <hr>
                        <router-link :to="{name:'checkout'}" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Make Purchase </router-link>
                        <router-link :to="{name:'home'}" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</router-link>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    </div>

    </main>

</template>



<script>
export default {
    data() {
        return {

            cartUpdate:0,
            carts:{},
            cartUpdateForm:{

                quantity:'',
                user_id:'',
            }
        }
    },
    computed:{

        subtotal() {
            return this.carts.reduce((total, cart) => total + (cart.product.price*cart.quantity), 0);
        },

        finalSubtotal() {
            return this.carts.reduce((total, cart) => total + (this.getDiscountedPrice(cart)*cart.quantity), 0);
        },

        subtotalDiscount() {
            return this.carts.reduce((total, cart) => total + (this.getProductDiscount(cart)*cart.quantity), 0);
        },

        hasDiscount() {
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

        async getCartFromDb(){
            var res = await this.callApi('get',`/api/cart?userid=1`,[]);
            this.carts = res.data
        },
        async DeleteCartFromDb(id){

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then(async (result) => {
            if (result.isConfirmed) {
                var res = await this.callApi('delete',`/api/cart/${id}`,[]);
                this.carts = res.data

                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })





        },
        cartUpdateEnablefun(id){
            this.cartUpdate = id
        },
        async cartUpdateConfirmFun(id){
            this.cartUpdate = 0
            const filteredData = this.carts.find(cart => cart.id === id);


            this.cartUpdateForm.quantity = filteredData.quantity
            this.cartUpdateForm.user_id = filteredData.user_id

            var res = await this.callApi('put',`/api/cart/${id}`,this.cartUpdateForm)

            this.carts = res.data

        },
        cartUpdateCancelFun(id){
            this.cartUpdate = 0
            this.getCartFromDb();
        },
    },
    mounted() {
        this.getCartFromDb();
    },
}
</script>
<style scoped>


.container-fluid {
    margin-top: 70px;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.4rem;
}
.img-sm {
    width: 80px;
    height: 80px;
}
.itemside .info {
    padding-left: 15px;
    padding-right: 7px;
}
.table-shopping-cart .price-wrap {
    line-height: 1.2;
}
.table-shopping-cart .price {
    font-weight: bold;
    margin-right: 5px;
    display: block;
}
.text-muted {
    color: #969696 !important;
}
a {
    text-decoration: none !important;
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0px;
}
.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
}
.dlist-align {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
[class*="dlist-"] {
    margin-bottom: 5px;
}
.coupon {
    border-radius: 1px;
}
.price {
    font-weight: 600;
    color: #212529;
}
.btn.btn-out {
    outline: 1px solid #fff;
    outline-offset: -5px;
}
.btn-main {
    border-radius: 2px;
    text-transform: capitalize;
    font-size: 15px;
    padding: 10px 19px;
    cursor: pointer;
    color: #fff;
    width: 100%;
}
.btn-light {
    color: #ffffff;
    background-color: #f44336;
    border-color: #f8f9fa;
    font-size: 12px;
}
.btn-light:hover {
    color: #ffffff;
    background-color: #f44336;
    border-color: #f44336;
}
.btn-apply {
    font-size: 11px;
}


</style>
