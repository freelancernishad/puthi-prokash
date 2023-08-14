<template>
    <div   style="padding-top: 50px;">
    <Breadcrumb :pages="Breadcrumb"/>
 <div class="register-page bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <h3 class="mb-3 defaultColor">Register Now</h3>
          <div class="bg-white shadow rounded">
            <div class="row">
              <div class="col-md-7 pe-0">
                <div class="form-left h-100 py-5 px-5">
                  <form class="row g-4" @submit.prevent='register'>



                    <div class="col-12 defaultColor">
                      <label>Name<span class="text-danger">*</span></label>
                      <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                        <input type="text" class="form-control" v-model="form.name" placeholder="Enter Name" required>
                      </div>
                    </div>




                    <div class="col-12 defaultColor">
                      <label>Phone Number<span class="text-danger">*</span></label>
                      <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-telephone-fill"></i></div>
                        <input type="text" class="form-control" v-model="form.phone" placeholder="Enter Phone Number">
                      </div>
                    </div>

                    <div class="col-12 defaultColor">
                      <label>Email<span class="text-danger">*</span></label>
                      <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                        <input type="email" class="form-control" v-model="form.email" placeholder="Enter Email">
                      </div>
                    </div>
<!--
                    <div class="col-12">
                      <label>Address<span class="text-danger">*</span></label>
                      <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-house-door-fill"></i></div>
                        <input type="text" class="form-control" placeholder="Enter Address">
                      </div>
                    </div> -->
                    <div class="col-12 defaultColor">
                      <label>Password<span class="text-danger">*</span></label>
                      <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                        <input type="password" class="form-control" v-model="form.password" placeholder="Enter Password">
                      </div>
                    </div>
                    <div class="col-12">


                      <!-- <button type="submit" class="btn btn-danger px-4 float-end mt-4 defaultBg2">Register</button> -->

                      <button type="button" disabled class="btn btn-danger px-4  mt-4 defaultBg2" v-if="loadLogin">Loading....</button>
                    <button type="submit" class="btn btn-danger px-4  mt-4 defaultBg2" v-else>Register</button>

                    <router-link :to="{name:'login'}" type="button" class="btn btn-danger px-4  mt-4 ml-3 defaultBg2" style="    margin-left: 30px;">Go Login</router-link>






                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-5 d-md-block d-none my-auto ps-0 text-center py-5 px-5">
                <img :src="$asseturl+'assets/image/only_Logo.png'" alt="" class="w-40 m-auto">
                <img :src="$asseturl+'assets/image/Logo_text_Full .png'" alt="" class="w-100">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>


<script>
export default {

	created(){
		if (User.loggedIn()) {
			this.$router.push({name: 'home'})
		}
	},

	data () {
		return {
            Breadcrumb : [{'route':'home','params':{},'text':'হোম'},{'route':'','params':{},'text':'রেজিস্টার'}],
			form:{
				name: null,
				phone: null,
				email: null,
				password: null,
			},
			errors: {}
		}
	},
	methods:{
		register(){
			axios.post('api/auth/register', this.form)
			.then(res => {
				// User.responseAfterLogin(res)

                Notification.customSuccess("Registration Success");

                this.$router.push({ name: "login" });

			})
			.catch(error => this.errors = error.response.data.errors)
		}
	}
}
</script>
