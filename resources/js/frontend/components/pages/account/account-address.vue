<template>
    <div style="padding-top: 75px;">

<Breadcrumb :pages="[{'route':'home','text':'হোম'},{'route':'','text':'Address'}]"/>


        <section>
    <div class="container">
      <div class="row">



        <Accountsidebar/>



        <div class="col-lg-9 col-md-8 col-12">
          <div class="py-6 p-md-6 p-lg-10">
            <div class="d-flex justify-content-between mb-6">
              <!-- heading -->
              <h2 class="mb-0">Address</h2>

            </div>
            <div class="row">



              <!-- col -->
              <div class="col-lg-12 col-xxl-12 col-12 mb-4">
                <!-- form -->
                <div class="card">
                  <div class="card-body p-6">

                    <form  @submit.stop.prevent="updateProfile">


                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" v-model="form.address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" v-model="form.city" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">State</label>
                            <input type="text" v-model="form.state" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Country</label>
                            <input type="text" v-model="form.country" class="form-control">
                        </div>




                        <div class="form-group">
                            <label for="">Divisions</label>
                            <select v-model="form.division" class="form-control" @change="changeDivision">
                                <option value="">Select</option>
                                <option v-for="(division,index) in divisions" :key="`division${index}`" :value="division.id">{{ division.name }}</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="">Districts</label>
                            <select v-model="form.district" class="form-control" @change="changeDistrict">
                                <option value="">Select</option>
                                <option v-for="(district,index) in districts" :key="`district${index}`" :value="district.id">{{ district.name }}</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="">Thanas</label>
                            <select v-model="form.thana" class="form-control" @change="changeThana">
                                <option value="">Select</option>
                                <option v-for="(thana,index) in thanas" :key="`thana${index}`" :value="thana.id">{{ thana.name }}</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="">Unions</label>
                            <select v-model="form.union" class="form-control">
                                <option value="">Select</option>
                                <option v-for="(union,index) in unions" :key="`union${index}`" :value="union.id">{{ union.name }}</option>
                            </select>
                        </div>




                        <div class="form-group">
                            <label for="">Zip</label>
                            <input type="text" v-model="form.zip" class="form-control">
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-info">Save </button>

                        </div>
                    </form>





                  </div>
                </div>
              </div>




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
            form:{
                address:'',
                city:'',
                state:'',
                country:'',
                division:'',
                district:'',
                thana:'',
                union:'',
                zip:'',
            },

            divisions:{},
            districts:{},
            thanas:{},
            unions:{},

        }
    },
    methods: {


        async getGeoList(){
            var res = await this.callApi('get',`/api/all/geo`,[]);
            this.divisions = res.data;
            this.getFromDb();
        },

        changeDivision(){
            this.districts = this.divisions
            .filter(division => division.id == this.form.division)
            .map(division => division.districts)[0];
        },

        changeDistrict(){
            this.thanas = this.districts
            .filter(district => district.id == this.form.district)
            .map(district => district.thanas)[0];
        },


        changeThana(){
            this.unions = this.thanas
            .filter(thana => thana.id == this.form.thana)
            .map(thana => thana.unions)[0];
        },

        async getFromDb(){
            var userRes = await this.callApi('get',`/api/users/${this.$localStorage.getItem('userid')}`,[]);
            var user = userRes.data
            if(user.user_addresses.address) this.form.address = user.user_addresses.address
            if(user.user_addresses.city) this.form.city = user.user_addresses.city
            if(user.user_addresses.state) this.form.state = user.user_addresses.state
            if(user.user_addresses.country) this.form.country = user.user_addresses.country
            if(user.user_addresses.zip) this.form.zip = user.user_addresses.zip


            if(user.user_addresses.division){
                this.form.division = user.user_addresses.division
            }

            if(user.user_addresses.district) {
                this.changeDivision();
                    this.form.district = user.user_addresses.district

            }
            if(user.user_addresses.thana) {
                this.changeDistrict();
                this.form.thana = user.user_addresses.thana
            }
            if(user.user_addresses.union){
                this.changeThana();

                this.form.union = user.user_addresses.union
            }





        },
        async updateProfile(){

                var res = await this.callApi(`post`,`/api/users/${this.$localStorage.getItem('userid')}/addresses`,this.form);
                if(res.status==200){
                    Notification.customSuccess(`Address Updated Successfull`);
                    if(this.$route.query.redirect){
                        this.$router.push({name:'checkout'});
                    }else{
                        this.getFromDb()
                    }
                }else if(res.status==201){
                    Notification.customSuccess(`Address added Successfull`);
                    if(this.$route.query.redirect){
                        this.$router.push({name:'checkout'});
                    }else{
                        this.getFromDb()
                    }
                }else{
                    Notification.customError(res.data.message);
                    this.errors = res.data.errors
                }
            },
    },
    mounted() {
        this.getGeoList();


    },

}
</script>




<style scoped>

</style>



