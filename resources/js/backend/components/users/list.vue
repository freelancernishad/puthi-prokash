<template>
    <div>
 <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>

<div class="breadcrumbs-area">
    <h3>Users List</h3>
    <ul>
        <li>
            <router-link :to="{name:'Dashboard'}">Home</router-link>
        </li>
        <li>Users List</li>
    </ul>
</div>




        <div class="card">
            <div class="card-header">
                <router-link :to="{ name: 'userslistadd' }" class="btn btn-info">Add New</router-link>
            </div>
        <div class="card-body">


            <table class="table">
            <thead>

                <tr>
                    <th>SL</th>
                    <th>ছবি</th>
                    <th>নাম (বাংলা)</th>
                    <th>নাম (ইংলিশ্‌)</th>
                    <th>ধরণ</th>

                    <th>ইমেইল</th>
                    <th>মোবাইল</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>
                <tr v-for="(item,index) in items" :key="''+item.id">
                    <td>{{ index+pageNO }}</td>
                    <td><img :src="$asseturl+item.image" width="50px" alt=""></td>
                    <td>{{ item.nameBN }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.position_type }}</td>
                    <td>{{ item.email }}</td>
                    <td>{{ item.phone }}</td>

                    <td>
                        <span class="btn btn-danger" @click="deleteUser(item.id)">Delete</span>
                        <router-link size="sm" :to="{ name: 'userslistedit', params: { id: item.id } }"
                    class="btn btn-info mr-1 mt-1">
                    Edit
                </router-link></td>

                </tr>
            </tbody>

         </table>



    </div>



    <Paginate :Paginaterowsprops="PaginateRows" :Totalrowsprops="Totalrows" :Totalpageprops="Totalpage" Routenameprops="userslist" :Routeparamsprops="Routeparams"/>


            </div>
        </div>
</template>

<script>

export default {

     computed: {



    },
    created() {


    },
    data() {
        return {
            pageNO:1,

            preLooding:true,

            access:'',
            sortstatus:false,
            Filter:true,
            addNew:'userslistadd',
            FilterOn:false,
            PerPage:false,
            deleteRoute:'/api/get/users/delete',
            editRoute:'userslistedit',
            applicationRoute:'',
            viewRoute:'',
            approveRoute:'',
            cancelRoute:'',
            approveType:'',
            approveData:'',
            payRoute:'',
            PerPageData:'10',
            TotalRows:'1',
            Type:'',
            items: [],



        }
    },


  watch: {
        '$route':  {
            handler(newValue, oldValue) {


                this.sonodname();


      },
      deep: true



        }
    },

    methods: {


       async sonodname(){
            var position = this.Users.position
            var thana = this.Users.thana
            var page = 1;
            if(this.$route.query.page){
                page = this.$route.query.page;
            }
            var res = await this.callApiPaginate(`/api/users/position/users?page=${page}`,page);
            this.items = res
        this.preLooding = false
        },

        deleteUser(id){
            Swal.fire({
                        title: 'আপনি কি নিশ্চিত?',
                        text: `এই লেখক কে ডিলিট করতে চান`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: `হা নিশ্চিত`,
                        cancelButtonText: `বাতিল`
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            var res = await this.callApi('delete', `/api/users/${id}`, []);
                            Notification.customSuccess(`লেখক সফল ভাবে ডিলিট হয়েছে`);
                            this.preLooding = false
                            this.sonodname()
                        } else {
                            this.preLooding = false
                        }
                    })
        }









    },
    mounted() {
        setTimeout(()=>{

            this.sonodname();
        }, 2000);


    }


}
</script>
