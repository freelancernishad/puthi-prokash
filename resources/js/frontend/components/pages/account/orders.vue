<template>
    <div style="padding-top: 75px;">

<Breadcrumb :pages="[{'route':'home','text':'হোম'},{'route':'','text':'Orders'}]"/>


        <section>
    <div class="container">
      <div class="row">





        <Accountsidebar/>







        <div class="col-lg-9 col-md-8 col-12">
          <div class="py-6 p-md-6 p-lg-10">
            <!-- heading -->
            <h2 class="mb-6">Your Orders</h2>

            <div class="table-responsive-xxl border-0">
              <!-- Table -->
              <table class="table mb-0 text-nowrap table-centered ">
                <!-- Table Head -->
                <thead class="bg-light">
                  <tr>

                    <th>Order</th>
                    <th>Date</th>
                    <th>Items</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th></th>

                    <th></th>
                  </tr>
                </thead>


                <tbody v-if="orders.message=='No orders found for the user'">


                  <tr>
                    <td class="align-middle border-top-0" colspan="5">{{ orders.message }}</td>
                  </tr>



                </tbody>

                <tbody v-else>


                  <tr v-for="(order,index) in orders" :key="'order'+index">


                    <td class="align-middle border-top-0">#{{ order.orderId }}</td>
                    <td class="align-middle border-top-0">{{ dateformatGlobal(order.created_at)[6] }}</td>
                    <td class="align-middle border-top-0">{{ order.total_quantity }}</td>
                    <td class="align-middle border-top-0">
                      <span class="badge bg-warning" v-if="order.status=='pending'">{{ order.status }}</span>
                      <span class="badge bg-warning" v-else-if="order.status=='processing'">{{ order.status }}</span>
                      <span class="badge bg-success" v-else-if="order.status=='completed'">{{ order.status }}</span>
                      <span class="badge bg-danger" v-else-if="order.status=='canceled'">{{ order.status }}</span>
                    </td>
                    <td class="align-middle border-top-0">{{ order.total_amount }}</td>
                    <td class="text-muted align-middle border-top-0">
                        <button @click="showPopup(order)" class="btn btn-info">Show Order Products</button>
                    </td>
                  </tr>



                </tbody>



              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- Popup component -->
    <popup-order-products
      v-if="isPopupVisible"
      :orderProducts="order"
      @close="closePopup"
    ></popup-order-products>
    </div>
</template>

<script>
import Accountsidebar from './sidebar.vue'
import PopupOrderProducts from "./PopupOrderProducts.vue";
export default {
    components:{Accountsidebar, PopupOrderProducts},
    data() {
        return {
            orders:{},
            order: {},
            isPopupVisible: false,
        }
    },
    methods: {
        async getOrders(){
            var res = await this.callApi('get',`/api/users/${this.$localStorage.getItem('userid')}/orders`);
            this.orders = res.data
        },
        showPopup(order) {


            this.order = order
        this.isPopupVisible = true;
        },
        closePopup() {
        this.isPopupVisible = false;
        },
    },
    mounted() {
        this.getOrders();
    },

}
</script>




<style scoped>

</style>
