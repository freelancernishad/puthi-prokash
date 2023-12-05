<template>
    <div>


        <!-- <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>-->

        <preloader  v-if="preLooding"/>

        <Breadcrumbs brename="Products List"/>

        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Categories</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(list,index) in lists" :key="index">
                                <td>{{ index+pageNO }}</td>
                                <td><img :src="$asseturl+list.image" width="50px" alt=""></td>
                                <td>{{ list.name }}</td>
                                <td>{{ list.price }}</td>
                                <td>{{ list.stock }} <br> <span class="btn btn-warning" @click="addStock(list)">Add Stock</span></td>
                                <td>
                                    <span v-for="(categorie,indexSL) in list.categories" :key="categorie.id">{{ categorie.name }}<span v-if="indexSL != Object.keys(list.categories).length - 1">, </span> </span>
                                </td>
                                <td>{{ list.release_date }}</td>
                                <td>



                                    <router-link class="btn btn-info" :to="{name:'flipingbooksqr',params:{id:list.id}}">Flipping Book and QR Code</router-link>

                                    <router-link class="btn btn-info" :to="{name:'flipingbooks',params:{id:list.id}}">Fliping Books</router-link>

                                    <!-- <router-link class="btn btn-info" :to="{name:'productsimages',params:{id:list.id}}">Image Upload</router-link> -->

                                    <router-link class="btn btn-info" :to="{name:'productsEdit',params:{id:list.id}}">Edit</router-link>
                                    <button class="btn btn-danger" @click="DeleteAction('Are you sure?','Delete this products',`/api/products/${list.id}`,'Product Deleted',getLists)">Delete</button>

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

        <stockAdd v-if="isPopupOpen" @close_popup="closePopup" @call_data="getLists" :items="list"  />


    </div>
</template>

<script>
  import stockAdd from "./stockAdd.vue";
export default {
    components: {
        stockAdd,
    },
    data() {
        return {
            lists:{},
            pageNO:1,
            preLooding:false,
            isPopupOpen: false,
            list: {},
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


        addStock(list){
            this.list = list;

            this.isPopupOpen = true;
        },

        closePopup(){
            this.isPopupOpen = false;
        },



        async getLists(page=1){
            this.preLooding = true
            if(this.$route.query.page){
                page = this.$route.query.page;
            }

            var res = await this.callApiPaginate(`/api/products?page=${page}`,page);
            this.lists = res

            this.preLooding = false

        }
    },
    mounted() {
        this.getLists();
    },
}
</script>
