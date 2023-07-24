<template>
    <div style="padding-top: 75px;">

<Breadcrumb :pages="[{'route':'home','text':'হোম'},{'route':'','text':'অ্যাকাউন্ট সেটিং'}]"/>


        <section>
    <div class="container">
      <div class="row">




        <Accountsidebar/>



        <div class="col-lg-9 col-md-8 col-12">
          <div class="py-6 p-md-6 p-lg-10">
            <div class="mb-6">
              <!-- heading -->
              <h2 class="mb-0">Account Setting</h2>
            </div>
            <div>
              <!-- heading -->
              <h5 class="mb-4">Account details</h5>
              <div class="row">
                <div class="col-lg-5">
                  <!-- form -->
                  <form @submit.stop.prevent="updateProfile">
                    <!-- input -->
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" v-model="form.name" placeholder="jitu chauhan">
                    </div>
                    <!-- input -->
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" v-model="form.email" placeholder="example@gmail.com" disabled>
                    </div>
                    <!-- input -->
                    <div class="mb-5">
                      <label class="form-label">Phone</label>
                      <input type="text" class="form-control" v-model="form.phone" placeholder="Phone number">
                    </div>
                    <!-- button -->
                    <div class="mb-3">
                      <button class="btn btn-primary">Save Details</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <hr class="my-10">
            <div class="pe-lg-14">

              <h5 class="mb-4">Password</h5>
              <form class=" row row-cols-1 row-cols-lg-2" @submit.stop.prevent="updatePassword">

                <div class="mb-3 col">
                  <label class="form-label">Current Password</label>
                  <input type="password" class="form-control" v-model="PassForm.old_password" placeholder="**********">
                </div>

                <div class="mb-3 col">
                  <label class="form-label">New Password</label>
                  <input type="password" class="form-control" v-model="PassForm.new_password" placeholder="**********">
                </div>


                <div class="mb-3 col">
                  <label class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" v-model="PassForm.new_password_confirmation" placeholder="**********">
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Save Password</button>
                </div>
              </form>
            </div>
            <hr class="my-10">
            <div>





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
                user_id:'',
                name:'',
                email:'',
                phone:''
            },
            PassForm:{
                old_password:'',
                new_password:'',
                new_password_confirmation:'',
            }
        }
    },
    methods: {

        async getCartFromDb(){
            var userRes = await this.callApi('get',`/api/users/${this.$localStorage.getItem('userid')}`,[]);
            var user = userRes.data
            this.form.user_id = user.id
            this.form.name = user.name
            this.form.email = user.email
            this.form.phone = user.phone
        },

        async updateProfile(){
                var res = await this.callApi(`put`,`/api/users/${this.form.user_id}`,this.form);
                if(res.status==200){
                    Notification.customSuccess(`User Updated Successfull`);
                    this.getCartFromDb()
                }else{
                    Notification.customError(res.data.message);
                    this.errors = res.data.errors
                }
            },

        async updatePassword(){
                var res = await this.callApi(`post`,`/api/users/password/change/${this.form.user_id}`,this.PassForm);
                if(res.status==200){
                    Notification.customSuccess(`Password Updated Successfull`);
                    this.getCartFromDb()
                }else{
                    Notification.customError(res.data.message);
                    this.errors = res.data.errors
                }
            }



    },
    mounted() {
        this.getCartFromDb();
    },

}
</script>




<style scoped>

</style>
