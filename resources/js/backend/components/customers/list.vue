<template>
    <div>
 <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>

<div class="breadcrumbs-area">
    <h3>Customers List</h3>
    <ul>
        <li>
            <router-link :to="{name:'Dashboard'}">Home</router-link>
        </li>
        <li>Customers List</li>
    </ul>
</div>




        <div class="card">
            <div class="card-header">


                <div class="d-flex justify-content-between" @submit.stop.prevent="sonodname">
                    <div></div>
                    <form class="d-flex">

                        <select class="form-control" placeholder="Search district" v-model="search">
                            <option value="">Select</option>
                            <option v-for="(district,dIn) in districts" :key="`dIn${dIn}`" :value="district.name">{{ district.name }}</option>
                        </select>

                        <input type="text" class="form-control" placeholder="Search district" v-model="search">
                        <button type="submit" class="btn btn-danger">Search</button>
                    </form>
                </div>

            </div>
        <div class="card-body">


            <table class="table">
            <thead>

                <tr>
                    <th>নাম</th>

                    <th>ইমেইল</th>
                    <th>মোবাইল</th>
                    <th>District</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>
                <tr v-for="(item,index) in items" :key="''+item.id">
                    <td>{{ item.name }}</td>
                    <td>{{ item.email }}</td>
                    <td>{{ item.phone }}</td>
                    <td>
                        <span v-if="item.user_addresses">
                            <span v-if="item.user_addresses.user_district">{{ item.user_addresses.user_district.name }}</span>
                        </span>
                    </td>
                    <td>
                        <router-link size="sm" :to="{ name: 'ordersCustomer', params: { customer: item.id } }" class="btn btn-info mr-1 mt-1"> orders </router-link>
                    </td>

                </tr>
            </tbody>

         </table>



    </div>

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
            search:'',
            preLooding:true,
            access:'',
            sortstatus:false,
            Filter:true,
            addNew:'userlistadd',
            FilterOn:false,
            PerPage:false,
            deleteRoute:'/api/get/users/delete',
            editRoute:'userlistedit',
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
            districts: {},



        }
    },


  watch: {
        '$route':  {
            handler(newValue, oldValue) {




      },
      deep: true



        }
    },

    methods: {



        async getDistrict(){
            var res = await this.callApi('get',`/api/districts`);
            this.districts = res.data;
        },



        sonodname(){
            var position = this.Users.position
            var thana = this.Users.thana
            var s = '';
            if(this.search){
                s = `?district=${this.search}`;
            }


              axios.get(`/api/users/position/user${s}`)
                .then(({ data }) => {
                  this.items = data.data
                  this.TotalRows = `${this.items.length}`;
                  this.preLooding = false
                })
                .catch()
        },

        deleteUser(id){
            Swal.fire({
                        title: 'আপনি কি নিশ্চিত?',
                        text: `এই ইউজার কে ডিলিট করতে চান`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: `হা নিশ্চিত`,
                        cancelButtonText: `বাতিল`
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            var res = await this.callApi('get', `/api/get/users/delete/${id}`, []);
                            Notification.customSuccess(`ইউজার সফল ভাবে ডিলিট হয়েছে`);
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


        this.getDistrict();



    }


}
</script>
