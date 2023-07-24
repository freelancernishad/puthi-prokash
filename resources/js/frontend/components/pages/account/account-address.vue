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
                zip:'',
            }
        }
    },
    methods: {
        async getFromDb(){
            var userRes = await this.callApi('get',`/api/users/${this.$localStorage.getItem('userid')}`,[]);
            var user = userRes.data
            if(user.user_addresses.address) this.form.address = user.user_addresses.address
            if(user.user_addresses.city) this.form.city = user.user_addresses.city
            if(user.user_addresses.state) this.form.state = user.user_addresses.state
            if(user.user_addresses.country) this.form.country = user.user_addresses.country
            if(user.user_addresses.zip) this.form.zip = user.user_addresses.zip


        },
        async updateProfile(){
                var res = await this.callApi(`post`,`/api/users/${this.$localStorage.getItem('userid')}/addresses`,this.form);
                if(res.status==200){
                    Notification.customSuccess(`Address Updated Successfull`);
                    this.getFromDb()
                }else if(res.status==201){
                    Notification.customSuccess(`Address added Successfull`);
                    this.getFromDb()
                }else{
                    Notification.customError(res.data.message);
                    this.errors = res.data.errors
                }
            },
    },
    mounted() {
        this.getFromDb();
    },

}
</script>




<style scoped>

</style>
