<template>
    <main  style="padding-top: 75px;">

        <Breadcrumb :pages="[{'route':'home','text':'হোম'},{'route':'','text':'কার্ট'}]"/>



        <div class="container">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate="">


              <div class="mb-3">
                <label for="firstName">Name</label>
                <input type="text" class="form-control" id="name" placeholder="" value="" required="" wfd-id="id1">
                <div class="invalid-feedback">
                  Valid name is required.
                </div>
              </div>



            <div class="mb-3">
              <label for="username">Eamil</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="email" class="form-control" id="email" placeholder="Email" required="" wfd-id="id3">
                <div class="invalid-feedback" style="width: 100%;">
                  Your email is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="" wfd-id="id5">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" wfd-id="id6">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="form-control d-block w-100" id="country" required="">
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="form-control d-block w-100" id="state" required="">
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required="" wfd-id="id7">
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">


            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="" wfd-id="id10">
                <label class="custom-control-label" for="credit">Cash on Delivery</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="" wfd-id="id11">
                <label class="custom-control-label" for="debit">Ekpay</label>
              </div>

            </div>


            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
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
            carts:{},
            cartUpdateForm:{

                quantity:'',
                user_id:'',
            }
        }
    },
    computed:{

        subquantity() {
            if (!Array.isArray(this.carts)) {
                return 0;
            }
            return this.carts.reduce((total, cart) => total + cart.quantity, 0);
        },

        subtotal() {
            if (!Array.isArray(this.carts)) {
                return 0;
            }
            return this.carts.reduce((total, cart) => total + (cart.product.price*cart.quantity), 0);
        },

        finalSubtotal() {
            if (!Array.isArray(this.carts)) {
                return 0;
            }
            return this.carts.reduce((total, cart) => total + (this.getDiscountedPrice(cart)*cart.quantity), 0);
        },

        subtotalDiscount() {
            if (!Array.isArray(this.carts)) {
                return 0;
            }
            return this.carts.reduce((total, cart) => total + (this.getProductDiscount(cart)*cart.quantity), 0);
        },

        hasDiscount() {
        return function (cart) {
            if (!Array.isArray(this.carts)) {
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
.dlist-align {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
[class*="dlist-"] {
    margin-bottom: 5px;
}

</style>
