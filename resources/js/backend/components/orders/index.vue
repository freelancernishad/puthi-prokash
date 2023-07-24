<template>
    <div>
        <Breadcrumbs brename="Products List"/>

        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Items</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th></th>

                            </tr>
                        </thead>

                        <tbody>


                            <tr v-for="(list,index) in lists" :key="index">
                                <td>{{ index+pageNO }}</td>
                                <td>{{ list.orderId }}</td>
                                <td>{{ dateformatGlobal(list.created_at)[6] }}</td>
                                <td>{{ list.total_quantity }}</td>

                                <td class="align-middle border-top-0">

                                <span class="badge bg-warning" v-if="list.status=='pending'">{{ list.status }}</span>
                                <span class="badge bg-warning" v-else-if="list.status=='processing'">{{ list.status }}</span>
                                <span class="badge bg-success" v-else-if="list.status=='completed'">{{ list.status }}</span>
                                <span class="badge bg-danger" v-else-if="list.status=='canceled'">{{ list.status }}</span>

                                </td>
                                <td class="align-middle border-top-0">{{ list.total_amount }}</td>
                                <td class="text-muted align-middle border-top-0">
                                    <button @click="showPopup(list)" class="btn btn-info">Show Order Products</button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">

                <Paginate :Paginaterowsprops="PaginateRows" :Totalrowsprops="Totalrows" :Totalpageprops="Totalpage" :Routenameprops="Routename" :Routeparamsprops="Routeparams"/>

            </div>
        </div>


   <!-- Popup component -->
   <popup-order-products
      v-if="isPopupVisible"
      :orderProducts="order"
      @close="closePopup"
    ></popup-order-products>
    </div>
</template>

<script>
import PopupOrderProducts from "./PopupOrderProducts.vue";
export default {
    components:{PopupOrderProducts},
    data() {
        return {
            lists:{},
            pageNO:1,
            order: {},
            isPopupVisible: false,
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                this.getLists();
            },
            deep: true
        }
    },
    methods: {
        async getLists(page=1){
            if(this.$route.query.page){
                page = this.$route.query.page;
            }
            var res = await this.callApiPaginate(`/api/orders?page=${page}`,page);
            this.lists = res
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
        this.getLists();
    },
}
</script>
