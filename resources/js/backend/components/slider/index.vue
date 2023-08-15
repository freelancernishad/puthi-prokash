<template>
    <div>


        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>


        <Breadcrumbs brename="Slider List"/>


        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Slider Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(list,index) in lists" :key="index">
                                <td>{{ index+pageNO }}</td>
                                <td>{{ list.title }}</td>
                                <td><img :src="$asseturl+list.image" width="50px" alt=""></td>
                                <td>
                                    <router-link class="btn btn-info" :to="{name:'sliderEdit',params:{id:list.id}}">Edit</router-link>
                                    <button class="btn btn-danger" @click="DeleteAction('Are you sure?','Delete this slider',`/api/sliders/${list.id}`,'Slider Deleted',getLists)">Delete</button>

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
            preLooding:false
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

            var res = await this.callApiPaginate(`/api/sliders?page=${page}`,page);
            // console.log(res)
            this.lists = res
            this.preLooding = false



        }
    },
    mounted() {
        this.getLists();
    },
}
</script>
