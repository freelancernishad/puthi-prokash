<template>

<div   style="padding-top: 50px;">
    <Breadcrumb :pages="Breadcrumb"/>


    <div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                </div>

                                <h6 class="h5 mb-0">Welcome back!</h6>
                                <p class="text-muted mt-2 mb-5">Enter your email address and password to access admin panel.</p>

                                <form @submit.prevent="login">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" v-model="form.email" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" v-model="form.password" id="exampleInputPassword1">
                                    </div>
                                    <button type="button" disabled class="btn btn-theme" v-if="loadLogin">Loading....</button>
                                    <button type="submit" class="btn btn-theme" v-else>Login</button>
                                    <a href="#l" class="forgot-link float-right text-primary">Forgot password?</a>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">This  beautiful theme yours!</h4>
                                    <p class="lead text-white">"Best investment i made for a long time. Can only recommend it for other users."</p>
                                    <p>- Admin User</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="register.html" class="text-primary ml-1">register</a></p>

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
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

</style>
