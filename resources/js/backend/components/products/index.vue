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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Categories</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(list,index) in lists" :key="index">
                                <td>{{ index+pageNO }}</td>
                                <td><img :src="$asseturl+list.image" width="50px" alt=""></td>
                                <td>{{ list.name }}</td>
                                <td>{{ list.price }}</td>
                                <td>
                                    <span v-for="(categorie,indexSL) in list.categories" :key="categorie.id">{{ categorie.name }}<span v-if="indexSL != Object.keys(list.categories).length - 1">, </span> </span>
                                </td>
                                <td>


                                    <router-link class="btn btn-info" :to="{name:'flipingbooksqr',params:{id:list.id}}">Fliping Books Download</router-link>

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



    </div>
</template>

<script>
export default {
    data() {
        return {
            lists:{},
            pageNO:1,
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

            var res = await this.callApiPaginate(`/api/products?page=${page}`,page);
            this.lists = res



        }
    },
    mounted() {
        this.getLists();
    },
}
</script>
