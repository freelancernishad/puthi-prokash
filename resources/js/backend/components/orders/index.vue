<template>
    <div>
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
        <Breadcrumbs brename="Orders List"/>

        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Phone</th>
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
                                <td>{{ list.user.name }}</td>
                                <td>{{ list.user.email }}</td>
                                <td>{{ list.user.phone }}</td>
                                <td>{{ list.orderId }}</td>
                                <td>{{ dateformatGlobal(list.created_at)[6] }}</td>
                                <td>{{ list.total_quantity }}</td>

                                <td class="align-middle border-top-0">

                                <span class="badge bg-warning text-dark" v-if="list.status=='pending'">{{ list.status }}</span>
                                <span class="badge bg-warning text-dark" v-else-if="list.status=='processing'">{{ list.status }}</span>
                                <span class="badge bg-success text-white" v-else-if="list.status=='completed'">{{ list.status }}</span>
                                <span class="badge bg-danger text-white" v-else-if="list.status=='canceled'">{{ list.status }}</span>

                                </td>
                                <td class="align-middle border-top-0">{{ list.total_amount }}</td>

                                <td class="text-muted align-middle border-top-0">
                                    <button @click="openUserPopup(list.user)" class="btn btn-danger">Customer Info</button>

                                    <button @click="openStatusPopup(list)" class="btn btn-success">Change Status</button>
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


        <!-- Add the popup div for status selection -->
        <div v-if="showStatusPopup" id="statusPopup">
            <div class="popup-overlay2">
                <div class="popup2">
                    <h3>Select Status</h3>
                    <select v-model="selectedStatus">
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="completed">Completed</option>
                        <option value="canceled">Canceled</option>
                    </select>
                    <button @click="updateOrderStatus">Save</button>
                    <button @click="closeStatusPopup">Cancel</button>
                </div>
            </div>
        </div>



<!-- Add the popup container -->
<div v-if="showUserPopup" class="user-popup">
    <div class="popup-overlay2">
                <div class="popup2">
    <div class="user-popup-content">
        <h3>{{ user.name }}</h3>
        <p><b>Email:</b> {{ user.email }}</p>
        <p><b>Address:</b> {{ user.user_addresses.address }}</p>
        <p><b>City:</b> {{ user.user_addresses.city }}</p>
        <p><b>Country:</b> {{ user.user_addresses.country }}</p>
        <p><b>State:</b> {{ user.user_addresses.state }}</p>
        <p><b>Zip:</b> {{ user.user_addresses.zip }}</p>
        <button @click="closeUserPopup" class="close-button bg-danger">Close</button>
    </div>
    </div>
    </div>
</div>




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

            preLooding:false,


            showStatusPopup: false,
            selectedStatus: '',
            form: {
                id: '',
                status: ''
            },
            showUserPopup: false,
            user:{}
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
            this.preLooding = true
            if(this.$route.query.page){
                page = this.$route.query.page;
            }

            if(this.$route.params.status){

                var res = await this.callApiPaginate(`/api/orders?page=${page}&status=${this.$route.params.status}`,page);
            }else if(this.$route.params.customer){
                var res = await this.callApiPaginate(`/api/orders?page=${page}&customer=${this.$route.params.customer}`,page);

            }

            this.lists = res
            this.preLooding = false
        },

        showPopup(order) {
            this.order = order
            this.isPopupVisible = true;
        },
        closePopup() {
            this.isPopupVisible = false;
        },







            openStatusPopup(order) {
                this.showStatusPopup = true;
                this.form.id = order.id;
                this.selectedStatus = order.status;
            },
            closeStatusPopup() {
                this.showStatusPopup = false;
            },
           async updateOrderStatus() {
            this.preLooding = true
                const orderId = this.form.id;
                const newStatus = this.selectedStatus;
                var res = await this.callApi('put',`/api/orders/${orderId}/status`,{ status: newStatus });

                if(res.status==200){
                    this.showStatusPopup = false;
                    this.getLists();
                    Notification.customSuccess(`Status changed`);
                }else{
                    Notification.customError(`Can't change same status`);
                }
                this.preLooding = false
            },




            openUserPopup(user) {
                console.log(user)
                this.showUserPopup = true;
                this.user = user
            },
            closeUserPopup() {
                this.showUserPopup = false;
            }








    },
    mounted() {
        this.getLists();
    },
}
</script>

<style scoped>
 #statusPopup {

        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    /* Styles for the popup content */
    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }
    .popup-overlay2 {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999999;
    overflow: auto;
}

/* Popup content styles */
.popup2 {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  width: 90%;
}

    /* Styles for the select dropdown */
    select {
        margin-bottom: 10px;
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    /* Styles for the buttons */
    button {
        padding: 5px 10px;
        margin-right: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    /* Style for the Cancel button */
    button.cancel {
        background-color: #ccc;
    }





/* Styles for the user info popup container */
.user-popup {

    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
}

/* Styles for the user info popup content */
/* .user-popup-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
} */

/* Styles for the user info button */
.user-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

/* Styles for the close button */
.close-button {
    margin-top: 10px;
    padding: 5px 10px;
    background-color: #ccc;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}





</style>
