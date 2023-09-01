<template>
    <main  style="padding-top: 75px;">

        <Breadcrumb :pages="[{'route':'home','text':'হোম'},{'route':'','text':'কার্ট'}]"/>



        <div class="container">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form  @submit.stop.prevent="onSubmit">


              <div class="mb-3">
                <label for="firstName">Name</label>
                <input type="text" class="form-control" v-model="form.name" id="name" placeholder="" required >
              </div>



            <div class="mb-3">
              <label for="username">Eamil</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="email" class="form-control" v-model="form.email" id="email" placeholder="Email" required >
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" v-model="form.address" id="address" placeholder="1234 Main St" required >
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" v-model="form.address2" id="address2" placeholder="Apartment or suite" wfd-id="id6">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <input type="text" class="form-control w-100" v-model="form.country" >
                <!-- <select class="form-control d-block w-100" v-model="form.country" id="country" required>
                  <option>Choose...</option>
                  <option>United States</option>
                </select> -->
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <input type="text" class="form-control w-100" v-model="form.state" >
                <!-- <select class="form-control d-block w-100" v-model="form.state" id="state" required>
                  <option>Choose...</option>
                  <option>California</option>
                </select> -->
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" v-model="form.zip" id="zip" placeholder="" required >
              </div>
            </div>
            <hr class="mb-4">


            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" v-model="form.paymentMethod" value="Cash on Delivery" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="credit">Cash on Delivery</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" v-model="form.paymentMethod" value="Ekpay" name="paymentMethod" type="radio" class="custom-control-input" required >
                <label class="custom-control-label" for="debit">Ekpay</label>
              </div>

            </div>


            <hr class="mb-4">





            <button class="btn btn-primary btn-lg btn-block" type="submit" v-if="carts && $localStorage.getItem('token')">Continue to checkout</button>

            <router-link :to="{name:'login'}" v-else-if="!$localStorage.getItem('token')" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Login or Create an account First </router-link>


          </form>
        </div>


            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>

          </h4>
                <!-- <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group"> <label>Have coupon?</label>
                                <div class="input-group"> <input type="text" class="form-control coupon" name="" placeholder="Coupon code"> <span class="input-group-append"> <button class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
                            </div>
                        </form>
                    </div>
                </div> -->

                <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Total Quantity</h6>

              </div>
              <span class="text-muted">{{ subquantity }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Total price</h6>
              </div>
              <span class="text-muted">{{ subtotal }}</span>
            </li>

            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Discount</h6>
                <!-- <small class="text-muted">Brief description</small> -->
              </div>
              <span class="text-muted">-{{ subtotalDiscount }}</span>
            </li>

            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Delivery Charage</h6>
                <!-- <small class="text-muted">Brief description</small> -->
              </div>
              <span class="text-muted">{{ deliveryCharge }}</span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>{{ finalSubtotal }}</strong>
            </li>
          </ul>



            </div>
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
            form:{
                'name':'',
                'email':'',
                'address':'',
                'address2':'',
                'country':'',
                'state':'',
                'zip':'',
                'paymentMethod':'Cash on Delivery',
            },
            carts:[],

            cartUpdateForm:{

                quantity:'',
                user_id:'',
            },
            deliveryCharges:[]
        }
    },
    computed:{



        totalWeight() {
            if (this.carts.length === 0) {
                return 0;
            }
            return this.carts.reduce((sum, product) => sum + product.product.weight * product.quantity, 0);
        },
        deliveryCharge() {

            if(this.deliveryCharges){
                const applicableCharge = this.deliveryCharges.find(
                charge => this.totalWeight >= charge.weight_from && this.totalWeight <= charge.weight_to
            );
            return applicableCharge ? applicableCharge.charge : 0;
            }else{
                return 0;
            }



        },

        subquantity() {
            if (this.carts.length === 0) {
                return 0;
            }
            return this.carts.reduce((total, cart) => total + cart.quantity, 0);
        },

        subtotal() {
            if (this.carts.length === 0) {
                return 0;
            }
            return this.carts.reduce((total, cart) => total + (cart.product.price*cart.quantity), 0);
        },

        finalSubtotal() {
            if (this.carts.length === 0) {
                return 0;
            }
            return this.carts.reduce((total, cart) => total + (this.getDiscountedPrice(cart)*cart.quantity), 0)+Number(this.deliveryCharge);
        },

        subtotalDiscount() {
            if (this.carts.length === 0) {
                return 0;
            }
            return this.carts.reduce((total, cart) => total + (this.getProductDiscount(cart)*cart.quantity), 0);
        },

        hasDiscount() {
        return function (cart) {
            if (this.carts.length === 0) {
                return false;
            }
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

            var deli = await this.callApi('get',`/api/delivery-charges`,[]);
            this.deliveryCharges = deli.data

            var userRes = await this.callApi('get',`/api/users/${this.$localStorage.getItem('userid')}`,[]);

            var res = await this.callApi('get',`/api/cart?userid=${this.$localStorage.getItem('userid')}`,[]);

            this.carts = res.data
            var user = userRes.data



            this.form.user_id = user.id
            this.form.name = user.name
            this.form.email = user.email



            if(userRes.data.user_addresses){

                var user_addresses = userRes.data.user_addresses

                if(user_addresses.address) this.form.address = user_addresses.address
                if(user_addresses.city) this.form.city = user_addresses.city
                if(user_addresses.state) this.form.state = user_addresses.state
                if(user_addresses.country) this.form.country = user_addresses.country
                if(user_addresses.zip) this.form.zip = user_addresses.zip
            }







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

        async onSubmit(){

            if(this.carts && this.$localStorage.getItem('token')){
                var res = await this.callApi('post',`/api/orders`,this.form);

                //   console.log(res)

                // if(res.status==201){
                //     Notification.customSuccess(`${res.data.message}`);
                //     this.$router.push({ name: "home" });
                // }else{
                //     Notification.customError(`${res.data.message}`);
                //     this.$router.push({ name: "home" });
                // }
            }else{
                Notification.customError("Login or Create an account First");
            }







        }



    },
    mounted() {
        this.getCartFromDb();
    },
}
</script>
<style scoped>
.dlist-align {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
[class*="dlist-"] {
    margin-bottom: 5px;
}

</style>
