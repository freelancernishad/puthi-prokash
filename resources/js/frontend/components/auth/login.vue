<template>
    <section class="vh-100 defaultBg" style="    padding: 23px 7px;overflow: hidden;">



        <div class="container-fluid h-custom">

            <router-link  to="/">
            <img
              :src="$asseturl+preload_data.settings.header_logo"
              alt=""
              class="puthi-logo"
              srcset=""
              width="200px"
            />
          </router-link>


            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="col-md-12 col-lg-12 col-xl-12 offset-xl-1">
                    <form @submit.prevent="login" class="loginForm">
                        <div class="form">
                            <h1 class="text-center mb-5 defaultColor">Login</h1>
                            <div class="form-item" id="inputEmail">
                                <input type="text" id="email" v-model="form.email" @blur="blur('email')"
                                    @input="blur('email')" autocomplete="on" required />
                                <label for="Email">Email</label>
                            </div>

                            <div class="form-item">
                                <input type="password" id="password" v-model="form.password" @blur="blur('password')"
                                    @input="blur('password')" autocomplete="off" required />
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2 defaultColor" type="checkbox" v-model="rememberme"
                                    id="form2Example3" />
                                <label class="form-check-label defaultColor" for="form2Example3">
                                    Remember me
                                </label>
                            </div>

                            <!-- <a class="btn btn-link" href="/password/reset">for?</a> -->


                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-danger btn-lg defaultBg2" v-if="!loadLogin"
                                style="padding-left: 2.5rem; padding-right: 2.5rem">
                                Login
                            </button>

                            <span class="btn btn-danger btn-lg defaultBg2" v-else
                                style="padding-left: 2.5rem; padding-right: 2.5rem">Looding.....</span>
                        </div>


                        <!-- <div class="text-center mt-3">
                                    <img width="50px" :src="$asseturl+'assets/img/bangladesh-govt.png'" alt="">
                                    <h4 style="margin: 0;    margin-top: 10px;">উপজেলা প্রশাসন</h4>
                                    তেঁতুলিয়া, পঞ্চগড়।
								</div> -->

                    </form>




                </div>
            </div>
        </div>
    </section>
</template>

<script>

export default {
    created() {
        if (User.loggedIn()) {

            if(this.Users.position=='user'){

                this.$router.push({ name: "home" });
            }else{
                window.location.href = "/dashboard";

            }


        }
        if (localStorage.getItem("login")) {
            this.form = JSON.parse(localStorage.getItem("login"));
            this.rememberme = true;
        }
    },

    data() {
        return {
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
                    .post("/login", this.form)
                    .then((res) => {


                        if (res.data == 0) {
                            Notification.customError("Please Enter Valid Email and Password");
                            this.loadLogin = false;
                        } else {
                            User.responseAfterLogin(res);
                            Notification.customSuccess("Signed in successfully Complete");
                            this.loadLogin = false;
                            if(res.data.position=='user'){
                                this.$router.push({ name: "home" });
                            }else{
                                window.location.href = "/dashboard";
                            }


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

<style lang="css" scoped>

body{
    background: var(--defaultBg) !important;
}
section.vh-100 {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
}

.blurerror input {
    border: 2px solid red !important;
}

.blurerror label {
    color: red !important;
}

.blursuccess input {
    border: 2px solid var(--defaultColor) !important;
}

.blursuccess label {
    color: var(--defaultColor) !important;
}

.divider:after,
.divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
}

*,
*:focus {
    outline: none;
}

/* .form{
  width: 500px;
  margin: 0 auto;
  margin-top: 150px;
  font-family: sans-serif;
  background: #fff
} */
.form-item {
    position: relative;
    margin-bottom: 15px;
}

.form-item input {
    display: block;
    width: 100%;
    height: 40px;
    background: transparent;
    border: solid 2px var(--defaultColor);
    transition: all 0.3s ease;
    padding: 0 15px;
}

.form-item input:focus {
    border-color: blue;
}

.form-item label {
    position: absolute;
    cursor: text;
    z-index: 2;
    top: 13px;
    left: 10px;
    font-size: 12px;
    font-weight: bold;
    background: var(--defaultBg);
    padding: 0 10px;
    color: var(--defaultColor);
    transition: all 0.3s ease;
}

.form-item input:focus+label,
.form-item input:valid+label {
    font-size: 11px;
    top: -5px;
}

.form-item input:focus+label {
    color: blue;
}

.loginForm {
    width: 370px !important;
    margin: 0 auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
}
.col-md-12.col-lg-12.col-xl-12.offset-xl-1 {
    height: 100vh;
}

.form-check-input:checked {
    background-color: var(--defaultColor);
    border-color: var(--defaultColor);
}

</style>

