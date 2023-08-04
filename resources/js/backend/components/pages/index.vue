<template>
    <div>
        <Breadcrumbs brename="Pages List"/>


        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Page Name</th>
                                <th>Page slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(list,index) in lists" :key="index">
                                <td>{{ index+pageNO }}</td>
                                <td>{{ list.page_name }}</td>
                                <td>{{ list.slug }}</td>
                                <td>

                                    <router-link class="btn btn-info" :to="{name:'pagesEdit',params:{id:list.id}}">Edit</router-link>
                                    <!-- <button class="btn btn-danger" @click="DeleteAction('Are you sure?','Delete this pages',`/api/galleries/${list.id}`,'Pages Deleted',getLists)">Delete</button> -->

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

            var res = await this.callApiPaginate(`/api/pages?page=${page}`,page);
            // console.log(res)
            this.lists = res



        }
    },
    mounted() {
        this.getLists();
    },
}
</script>
