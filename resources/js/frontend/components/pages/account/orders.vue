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
                  </tr>
                </thead>
                <tbody>
                  <!-- Table body -->




                  <tr v-for="(order,index) in orders" :key="'order'+index">


                    <td class="align-middle border-top-0">
                      <a href="#" class="text-inherit">#14899</a>

                    </td>
                    <td class="align-middle border-top-0">
                  {{ order.created_at }}

                    </td>
                    <td class="align-middle border-top-0">
                      {{ order.total_quantity }}

                    </td>
                    <td class="align-middle border-top-0">

                      <span class="badge bg-warning" v-if="order.status=='pending'">{{ order.status }}</span>
                      <span class="badge bg-warning" v-else-if="order.status=='processing'">{{ order.status }}</span>
                      <span class="badge bg-success" v-else-if="order.status=='completed'">{{ order.status }}</span>
                      <span class="badge bg-danger" v-else-if="order.status=='canceled'">{{ order.status }}</span>

                    </td>
                    <td class="align-middle border-top-0">
                      {{ order.total_amount }}
                    </td>
                    <td class="text-muted align-middle border-top-0">
                      <a href="#" class="text-inherit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View"><i class="feather-icon icon-eye"></i></a>
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
    </div>
</template>

<script>
import Accountsidebar from './sidebar.vue'
export default {
    components:{Accountsidebar},
    data() {
        return {
            orders:{}
        }
    },
    methods: {
        async getOrders(){
            var res = await this.callApi('get',`/api/users/${this.$localStorage.getItem('userid')}/orders`);
            this.orders = res.data
        }
    },
    mounted() {
        this.getOrders();
    },

}
</script>




<style scoped>

</style>
