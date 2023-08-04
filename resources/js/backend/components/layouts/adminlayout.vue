<template>
    <div id="wrapper" class="wrapper bg-ash"
        :class="{ 'sidebar-collapsed': sidebarstatus, 'sidebar-collapsed-mobile': mobileSidebar }">
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40"
            objectbg="#999793" opacity="80" name="circular"></loader>


        <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light" id='topnavbar'>
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <h3 style="    margin-bottom: 0;">
                        <router-link :to="{ name: 'Dashboard' }" class="text-white">
                            {{ changeName(user.position) }}
                            <!-- <img width="80%" src="http://esoft4u.tmscedu.com/asset/img/Logo123.png" alt="logo"> -->
                        </router-link>
                    </h3>
                </div>
                <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link" @click="sidebarstatus = !sidebarstatus">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="d-md-none mobile-nav-bar">
                <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse"
                    data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button type="button" class="navbar-toggler sidebar-toggle-mobile"
                    @click="mobileSidebar = !mobileSidebar">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                <ul class="navbar-nav">
                    <li class="navbar-item header-search-bar">
                        <div class="input-group stylish-input-group">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <!-- <span class="flaticon-search" aria-hidden="true"></span> -->
                                </button>
                            </span>
                            <!-- <input type="text" class="form-control" placeholder="Find Something . . ."> -->
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title">{{ user.name }}</h5>
                                <span>{{ changeName(user.position) }}</span>
                            </div>
                            <div class="admin-img">
                                <img :src="$asseturl + 'dashboard_asset/img/figure/admin.jpg'" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">{{ $localStorage.getItem('user') }}</h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li>
                                        <router-link class="dropdown-item" :to="{ name: 'profile' }">
                                            <img :src="$asseturl + 'dashboard_asset/img/figure/admin.jpg'" alt="Admin">
                                            Profile
                                        </router-link>
                                    </li>

                                    <li>
                                        <router-link class="dropdown-item" :to="{ name: 'logout' }">
                                            <i class="flaticon-turn-off"></i> Logout
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
                <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="/" style="    padding: 10px !important;">
                            {{ user.position }} Panel
                            <!-- <img width="80%" src="http://esoft4u.tmscedu.com/asset/img/Logo123.png" alt="logo"> -->

                        </a>
                    </div>
                </div>
                <div class="sidebar-menu-content" id="dashboardheight">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view navBar">






                        <li class="nav-item" @click="submenu(0)">
                            <router-link :to="{ name: 'Dashboard' }" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>ড্যাশবোর্ড</span></router-link>
                        </li>








                        <li class="nav-item sidebar-nav-item" :class="{ active: selected == 101 }">
                            <a href="javascript:void(0)" class="nav-link" @click="submenu(101)"><i
                                    class="flaticon-technological"></i><span>Category</span>
                            </a>
                            <transition name="slide">
                                <ul class="nav sub-group-menu menu-open child" v-if="selected == 101"
                                    style="display:block">
                                    <li class="nav-item" v-if="this.$localStorage.getItem('position') == 'admin'">
                                        <router-link :to="{ name: 'categoryAdd' }" class="nav-link"><i
                                                class="fas fa-angle-right"></i> New Category </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link :to="{ name: 'categoryIndex' }" class="nav-link"><i
                                                class="fas fa-angle-right"></i> Category List </router-link>
                                    </li>
                                </ul>
                            </transition>
                        </li>


                        <li class="nav-item sidebar-nav-item" :class="{ active: selected == 102 }">
                            <a href="javascript:void(0)" class="nav-link" @click="submenu(102)"><i
                                    class="flaticon-technological"></i><span>Products</span>
                            </a>
                            <transition name="slide">
                                <ul class="nav sub-group-menu menu-open child" v-if="selected == 102"
                                    style="display:block">
                                    <li class="nav-item" v-if="this.$localStorage.getItem('position') == 'admin'">
                                        <router-link :to="{ name: 'productsAdd' }" class="nav-link"><i
                                                class="fas fa-angle-right"></i> New Products </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link :to="{ name: 'productsIndex' }" class="nav-link"><i
                                                class="fas fa-angle-right"></i> Products List </router-link>
                                    </li>
                                </ul>
                            </transition>
                        </li>



                        <li class="nav-item sidebar-nav-item" :class="{ active: selected == 1030 }">
                            <a href="javascript:void(0)" class="nav-link" @click="submenu(1030)"><i
                                    class="flaticon-technological"></i><span>Slider</span>
                            </a>
                            <transition name="slide">
                                <ul class="nav sub-group-menu menu-open child" v-if="selected == 1030"
                                    style="display:block">
                                    <li class="nav-item" v-if="this.$localStorage.getItem('position') == 'admin'">
                                        <router-link :to="{ name: 'sliderAdd' }" class="nav-link"><i
                                                class="fas fa-angle-right"></i> New Slider </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link :to="{ name: 'sliderIndex' }" class="nav-link"><i
                                                class="fas fa-angle-right"></i> Slider List </router-link>
                                    </li>
                                </ul>
                            </transition>
                        </li>




                        <li class="nav-item sidebar-nav-item" :class="{ active: selected == 103 }">
                            <a href="javascript:void(0)" class="nav-link" @click="submenu(103)"><i
                                    class="flaticon-technological"></i><span>Gallery</span>
                            </a>
                            <transition name="slide">
                                <ul class="nav sub-group-menu menu-open child" v-if="selected == 103"
                                    style="display:block">
                                    <li class="nav-item" v-if="this.$localStorage.getItem('position') == 'admin'">
                                        <router-link :to="{ name: 'galleryAdd' }" class="nav-link"><i
                                                class="fas fa-angle-right"></i> New Gallery </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link :to="{ name: 'galleryIndex' }" class="nav-link"><i
                                                class="fas fa-angle-right"></i> Gallery List </router-link>
                                    </li>
                                </ul>
                            </transition>
                        </li>




                        <li class="nav-item sidebar-nav-item" :class="{ active: selected == 104 }" v-if="this.$localStorage.getItem('position') == 'admin'">
                            <a href="javascript:void(0)" class="nav-link" @click="submenu(104)"><i
                                    class="flaticon-technological"></i><span>Orders</span>
                            </a>
                            <transition name="slide">
                                <ul class="nav sub-group-menu menu-open child" v-if="selected == 104"
                                    style="display:block">
                                    <li class="nav-item" >
                                        <router-link :to="{ name: 'ordersIndex',params:{status:'pending'} }" class="nav-link"><i
                                                class="fas fa-angle-right"></i> Pending </router-link>
                                    </li>


                                    <li class="nav-item">
                                        <router-link :to="{ name: 'ordersIndex',params:{status:'processing'} }" class="nav-link"><i
                                                class="fas fa-angle-right"></i> Processing </router-link>
                                    </li>

                                    <li class="nav-item">
                                        <router-link :to="{ name: 'ordersIndex',params:{status:'completed'} }" class="nav-link"><i
                                                class="fas fa-angle-right"></i> Completed </router-link>
                                    </li>

                                    <li class="nav-item">
                                        <router-link :to="{ name: 'ordersIndex',params:{status:'canceled'} }" class="nav-link"><i
                                                class="fas fa-angle-right"></i> Canceled </router-link>
                                    </li>



                                </ul>
                            </transition>
                        </li>









                        <li class="nav-item" @click="submenu(0)" v-if="this.$localStorage.getItem('position') == 'admin'">
                                <router-link :to="{ name: 'Customerlist' }" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>Customers</span></router-link>
                        </li>





                        <li class="nav-item" @click="submenu(0)" v-if="this.$localStorage.getItem('position') == 'admin'">
                                <router-link :to="{ name: 'userlist' }" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>Writer</span></router-link>
                        </li>



                        <li class="nav-item" @click="submenu(0)" v-if="this.$localStorage.getItem('position') == 'admin'">
                                <router-link :to="{ name: 'feature_categories' }" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>বই সর্বোত্তম উপহার</span></router-link>
                        </li>


                        <li class="nav-item" @click="submenu(0)" v-if="this.$localStorage.getItem('position') == 'admin'">
                                <router-link :to="{ name: 'settings' }" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>Settings</span></router-link>
                        </li>


                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <slot></slot>
                <!-- Footer Area Start Here -->
                <!-- <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">Company name</a> 2019. All rights reserved.
                        Developed by <a target="_blank"
                            href="https://api.whatsapp.com/send?phone=8801909756552&text=I%27m%20interested%20in%20your%20services">Freelancer
                            Nishad</a></div>
                </footer> -->
                <!-- Footer Area End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
</template>
<script>
export default {
    props: ['user'],
    async created() {


        localStorage.setItem('position',this.user.position)


        if (!User.loggedIn()) {
            window.location.href = '/login'
        }else{

            if(localStorage.getItem('position')=='user'){
                 window.location.href = "/";
            }
        }



        this.$store.commit('setUpdateUser', this.user)



        if (localStorage.getItem('selectedMenu')) {
            this.selected = localStorage.getItem('selectedMenu')
        }
        window.addEventListener("resize", this.myEventHandler);
        window.addEventListener("scroll", this.myscroll);

    },
    watch: {
        '$route': async function (to, from) {


        }
    },
    destroyed() {
        window.removeEventListener("resize", this.myEventHandler);
        window.removeEventListener("scroll", this.myscroll);
    },
    data() {
        return {
            selected: 0,
            preLooding: false,
            sidebarstatus: false,
            mobileSidebar: false,
            SonodNamesAdmin:{},
            allSonodCount: {
                Pending: {},
                Secretary_approved: {},
                approved: {},
            },
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                this.sidebarstatus = false
                this.mobileSidebar = false


            },
            deep: true



        }
    },
    methods: {




        myscroll() {



            // Get the header
            var header = document.getElementById("topnavbar");

            var sticky = header.offsetTop;


            if (window.pageYOffset > sticky) {
                header.classList.add("fixednav");
            } else {
                header.classList.remove("fixednav");
            }



        },




        myEventHandler() {


        },
        submenu(ref) {

            if (this.selected > 0) {
                if (ref == this.selected) {
                    this.selected = 0
                    localStorage.setItem('selectedMenu', 0)
                } else {
                    this.selected = ref
                    localStorage.setItem('selectedMenu', ref)
                }
            } else {
                this.selected = ref
                localStorage.setItem('selectedMenu', ref)
            }
        }
    },
    mounted() {

    }
}
</script>
<style>

.form_title {
    border-bottom: 2px solid #159513;
    color: #159513;
    margin: 23px 0;
}
.form_title h5 {
    color: #159513 !important;
}

ul.nav.sub-group-menu.menu-open.child {
    padding: 0 !important;
}

ul.nav.sub-group-menu.menu-open.child li {
    padding: 10px 0;
}

.slide-enter-active {
    -moz-transition-duration: 0.3s;
    -webkit-transition-duration: 0.3s;
    -o-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -moz-transition-timing-function: ease-in;
    -webkit-transition-timing-function: ease-in;
    -o-transition-timing-function: ease-in;
    transition-timing-function: ease-in;
}

.slide-leave-active {
    -moz-transition-duration: 0.3s;
    -webkit-transition-duration: 0.3s;
    -o-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -moz-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
    -webkit-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
    -o-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
    transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
}

.slide-enter-to,
.slide-leave {
    max-height: 100px;
    overflow: hidden;
}

.slide-enter,
.slide-leave-to {
    overflow: hidden;
    max-height: 0;
}

a.nav-link span {
    font-size: 14px !important;
}
textarea.form-control {
    background: #b9b9b9 !important;
}




/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}


</style>
