<template>

<div   style="padding-top: 50px;">
    <Breadcrumb :pages="Breadcrumb"/>



    <div class="login-page bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <h3 class="mb-3 defaultColor">Login Now</h3>
          <div class="bg-white shadow rounded">
            <div class="row">
              <div class="col-md-7 pe-0">
                <div class="form-left h-100 py-5 px-5">
                  <form @submit.prevent="login" class="row g-4">
                    <div class="col-12 defaultColor">
                      <label>Email<span class="text-danger">*</span></label>
                      <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                        <input type="email" class="form-control" v-model="form.email" placeholder="Enter Email">
                      </div>
                    </div>

                    <div class="col-12 defaultColor">
                      <label>Password<span class="text-danger">*</span></label>
                      <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                        <input type="password" class="form-control" v-model="form.password" placeholder="Enter Password">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                        <label class="form-check-label defaultColor" for="inlineFormCheck">Remember me</label>
                      </div>
                    </div>

                    <!-- <div class="col-sm-6">
                      <a href="#" class="float-end text-primary">Forgot Password?</a>
                    </div> -->

                    <div class="col-12">

                    <button type="button" disabled class="btn btn-danger px-4  mt-4 defaultBg2" v-if="loadLogin">Loading....</button>
                    <button type="submit" class="btn btn-danger px-4  mt-4 defaultBg2" v-else>Login</button>

                    <router-link :to="{name:'register'}" type="button" class="btn btn-danger px-4  mt-4 ml-3 defaultBg2" style="    margin-left: 30px;">Registration</router-link>

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
    created() {
        if (User.loggedIn()) {

                this.$router.push({ name: "home" });

        }
        if (localStorage.getItem("login")) {
            this.form = JSON.parse(localStorage.getItem("login"));
            this.rememberme = true;
        }
    },

    data() {
        return {
            Breadcrumb : [{'route':'home','params':{},'text':'হোম'},{'route':'','params':{},'text':'লগিন'}],
            loadLogin: false,
            emailLogin: "",
            passwordLogin: "",
            emailReg: "",
            passwordReg: "",
            confirmReg: "",
            rememberme: false,
            emptyFields: false,
            form: {
                email: "",
                password: "",
            },
            errors: {},
        };
    },
    methods: {
        async login() {
            this.loadLogin = true;

            if (this.form.email == "" || this.form.password == "") {
                this.emptyFields = true;
            } else {
                if (this.rememberme) {
                    localStorage.setItem("login", JSON.stringify(this.form));
                } else {
                    localStorage.removeItem("login");
                }


                axios
                    .post("/auth/login", this.form)
                    .then((res) => {

                        if (res.data == 0) {
                            Notification.customError("Please Enter Valid Email and Password");
                            this.loadLogin = false;
                        } else {
                            User.responseAfterLogin(res);
                            Notification.customSuccess("Signed in successfully Complete");
                            this.loadLogin = false;
                            this.$router.push({ name: "home" });



                        }

                    })
                    .catch((error) => (this.errors = error.response.data.errors));
            }
        },

        blur(id) {
            const child = document.getElementById(id);
            if (this.form[id] == "") {
                child.parentNode.classList.remove("blursuccess");
                child.parentNode.classList.add("blurerror");
            } else {
                child.parentNode.classList.remove("blurerror");
                child.parentNode.classList.add("blursuccess");
            }
        },
    },
};
</script>


<style scoped>
.form-check-input:checked {
    background-color: var(--defaultColor);
    border-color: var(--defaultColor);
}
input#inlineFormCheck {
    border: 1px solid var(--defaultColor);
}
</style>
