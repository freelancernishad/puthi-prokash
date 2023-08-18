<template>
    <div>
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
        <Breadcrumbs brename="Category List"/>

        <div class="card">
            <div class="card-header">


                <form @submit.stop.prevent="SearchTable" class="d-flex" style="width:300px">

                        <input type="text" class="form-control" v-model="searchItem">
                    <button v-if="tableSerching" type="button" class="btn btn-info" disabled>Searching.....</button>
                    <button v-else type="submit" class="btn btn-info">Search</button>

                </form>


            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>image</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Parent</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(list,index) in lists" :key="index">
                                <td>{{ index+pageNO }}</td>
                                <td> <img :src="$asseturl+list.icon" width="50px" alt=""></td>
                                <td>{{ list.name }}</td>
                                <td><span v-if="list.parent">Child category</span><span v-else>Parent category</span></td>
                                <td><span v-if="list.parent">{{ list.parent.name }}</span></td>
                                <td>


                                    <router-link class="btn btn-info" :to="{name:'categoryimages',params:{id:list.id}}">Image Upload</router-link>
                                    <router-link class="btn btn-info" :to="{name:'categoryEdit',params:{id:list.id}}">Edit</router-link>



                                        <button class="btn btn-danger"  v-if="list.product_count.length<1" @click="DeleteAction('Are you sure?','Delete this category',`/api/categories/${list.id}`,'Category Deleted',getLists)">Delete</button>
                                   





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
            tableSerching:false,
            searchItem:'',
            lists:{},
            pageNO:1,
            preLooding:true
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
            var res = await this.callApiPaginate(`/api/all/categories?page=${page}`,page);
            this.lists = res
            this.preLooding = false
        },

        async SearchTable(){
            this.tableSerching = true
            var page=1;
            if(this.$route.query.page){
                page = this.$route.query.page;
            }
            var res = await this.callApiPaginate(`/api/serach/categories?page=${page}&searchItem=${this.searchItem}`,page);
            this.lists = res
            this.tableSerching = false
        }
    },
    mounted() {
        this.getLists();
    },
}
</script>
