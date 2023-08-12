<template>
    <div>

        <div class="mainHeadSlider">

    <b-carousel v-if="homePage"
        id="carousel-1"
        fade
        :interval="4000"
        controls
        indicators
        background="#ababab"
        img-width="1024"
        img-height="480"
        :prev-icon="prevIcon"
      :next-icon="nextIcon"
    >
     <b-carousel-slide v-for="(slider,index) in preload_data.sliders" :key="'slider'+index" :img-src="$asseturl+slider.image"></b-carousel-slide>

      <!-- <b-carousel-slide :img-src="$asseturl+'assets/image/banner/3.jpg?v=1'"></b-carousel-slide>
      <b-carousel-slide :img-src="$asseturl+'assets/image/banner/puthi-cover-banner.jpg'"></b-carousel-slide> -->

    </b-carousel>



        <!-- <img  v-if="homePage" width="100%" :src="$asseturl+'assets/image/Banner_Comp.gif'" alt=""> -->



        </div>

    <header class="header" style="background-color: #ced9df" :class="{ 'fixed-header': isFixed }">

      <nav class="navbar navbar-expand-lg p-0 mt-0" style="    height: var(--headerHight);" v-if="homePage">

        <div class="container">
        <!-- <div class="container-fluid" style="padding-right:0px !important;"> -->
          <router-link  to="/">
            <img
              :src="$asseturl+'assets/image//logo.png'"
              alt=""
              class="puthi-logo"
              srcset=""
              width="145px"
            />
          </router-link>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
          <i class="fa-solid fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul
              class="navbar-nav ms-auto justify-content-end align-items-center">
              <li class="nav-item">
                <router-link class="fs-5 nav-link text-dark" aria-current="page" :to="{name:'cart'}">
                  <img width="35px" :src="$asseturl+'assets/image/cart-icon.png'"/>
                </router-link>
              </li>
              <!-- <li class="border-3 border-start border-white nav-item nav-item-menu">
                <a style="    padding: 4px 13px !important;"
                  class="fw-light my-choice fs-5 nav-link text-dark px-3 py-2 shadow text-dark"
                  href="#"
                  >আমার পছন্দ</a
                >
              </li> -->

              <li class="border-3 nav-item nav-item-menu position-relative DropItem d-flex align-items-center">
                <a class="fs-5 text-dark border-start border-white px-2" href="javascript:void(0)">ভাষা</a>
                <ul class="DownItems list-unstyled"  style="list-style: inside;">
                    <li>বাংলা</li>
                    <li>English</li>
                </ul>
              </li>


              <li class="border-3 nav-item nav-item-menu  d-flex align-items-center"  v-if="loginStatus">
                <router-link class="fs-5 text-dark border-start border-white px-2" :to="{name:'orders'}">অ্যাকাউন্ট</router-link>
              </li>

              <li class="border-3 nav-item nav-item-menu  d-flex align-items-center" v-if="loginStatus">
                <router-link class="fs-5 text-dark border-start border-white px-2" :to="{name:'logout'}"
                  >লগ আউট
                  <i class="fa-sharp fa-regular fa-arrow-right-to-arc"></i
                ></router-link>
              </li>


              <li class="border-3 nav-item nav-item-menu  d-flex align-items-center"  v-if="!loginStatus">
                <router-link class="fs-5 text-dark border-start border-white px-2" :to="{name:'register'}">রেজিস্টার</router-link>
              </li>
              <li class="border-3 nav-item nav-item-menu  d-flex align-items-center" v-if="!loginStatus">
                <router-link class="fs-5 text-dark border-start border-white px-2" :to="{name:'login'}"
                  >সাইন ইন
                  <i class="fa-sharp fa-regular fa-arrow-right-to-arc"></i
                ></router-link>
              </li>


              <li class="border-3 nav-item nav-item-menu  d-flex align-items-center" @click="MainSearchFun">
                <a class="fs-5 text-dark border-start border-white px-2" href="javascript:void(0)"
                  >অনুসন্ধান <i class="fa-solid fa-magnifying-glass"></i
                ></a>
              </li>
              <li class="nav-item  position-relative DropItem" >

                <span class="nav-link dark-bars text-dark text-white">
                  <i class="fa-solid fa-bars fs-3"></i>
                </span>

                <ul class="DownItems list-unstyled" style="list-style: inside;">
                    <li><router-link :to="{name:'pages',params:{slug:'amader-kotah'}}" class="text-dark">আমাদের কথা</router-link></li>
                    <li><router-link :to="{name:'writer'}" class="text-dark">লেখক পরিচিতি</router-link></li>
                    <li><router-link :to="{name:'categoryProduct',params:{category:'ekaaddemik-bi'}}" class="text-dark">একাডেমিক বই</router-link></li>
                    <li><router-link :to="{name:'categoryProduct',params:{category:'srjnshiil-bi'}}" class="text-dark">সৃজনশীল বই</router-link></li>
                    <li><router-link :to="{name:'multimedia'}" class="text-dark">মাল্টিমিডিয়া</router-link></li>

                </ul>



              </li>
            </ul>
          </div>
        </div>
        <!-- </div> -->
      </nav>

      <section class="container" v-if="MainSearch">
        <form class="mainSearchBox d-flex" @submit.stop.prevent="searchItem">
          <input type="text" placeholder="আপনার কাঙ্ক্ষিত বইটি খুজে বের করুন" v-model="form.search" class="book-search-input">
          <button type="submit" class="book-search-button" ><i class="fa-regular fa-magnifying-glass"></i></button>
        </form>

      </section>

    <section style="background-color: #CED9DF;height: var(--headerHight);" v-if="submenu1">


        <div class="container">

            <div class="d-flex" style="justify-content: space-between;" v-if="mobileMenu">




            <router-link class="navbar-brand" to="/" >
                <img
                :src="$asseturl+'assets/image//logo.png'"
                alt=""
                class="puthi-logo"
                srcset=""
                width="180px"
                />
            </router-link>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown1"
                aria-controls="navbarNavDropdown1"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
            <i class="fa-solid fa-bars"></i>
            </button>
        </div>





            <div class="navbar-collapse collapse" id="navbarNavDropdown1">


                <ul class="nav row row-cols-1 row-cols-sm-1 row-cols-md-5 row-cols-lg-5 row-cols-xl-5">
                    <li class="nav-item  col d-flex align-items-baseline"><router-link :to="{name:'pages',params:{slug:'amader-kotah'}}" class="border-3  text-dark d-flex align-item" style="padding-left: 16px;    padding-top: 9px;">আমাদের কথা</router-link></li>
                    <li class="nav-item  col d-flex align-items-baseline"><router-link :to="{name:'writer'}" class="border-3 border-start border-white text-dark" style="padding-left: 16px;    padding-top: 9px;">লেখক পরিচিতি</router-link></li>


                    <li v-if="mobileMenu" class="nav-item  col submenu1 submenuhave"><router-link :to="{name:'categories'}" class="border-3 border-start border-white text-dark">একাডেমিক বই </router-link></li>

                    <li v-else class="nav-item  col submenu1 submenuhave position-relative DropItem">

                        <a href="javascript:void(0)" class="border-3 border-start border-white text-dark">একাডেমিক বই <i class="fa-light fa-arrow-down-long"></i></a>

                        <ul class="DownItems"  style="width: 183px;">
                            <li><router-link :to="{name:'categoryProduct',params:{category:'childish'}}" class="text-dark">শিশুতোষ</router-link></li>
                            <li><router-link :to="{name:'categoryProduct',params:{category:'books-for-adults'}}" class="text-dark">বড়দের বই</router-link></li>
                        </ul>
                    </li>






                    <li v-if="mobileMenu" class="nav-item  col submenu1 submenuhave"><router-link :to="{name:'categories'}" class="border-3 border-start border-white text-dark">সৃজনশীল বই </router-link></li>

                    <li v-else class="nav-item  col submenu1 submenuhave"><a href="javascript:void(0)" class="border-3 border-start border-white text-dark" @click="level2Submenu" >সৃজনশীল বই <i class="fa-light fa-arrow-down-long"></i></a></li>


                    <li class="nav-item  col  d-flex align-items-baseline"><router-link :to="{name:'multimedia'}" class="border-3 border-start border-white text-dark" style="padding-left: 16px;    padding-top: 9px;">মাল্টিমিডিয়া</router-link></li>
                </ul>



            </div>



        </div>
    </section>

  <div aria-labelledby="menuthree" class="dropdown-menus" style="left: 0;" v-if="submenu1 && submenu2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <ul class="nav row mt-2 row-cols-3 row-cols-sm-3 row-cols-md-5 row-cols-lg-5 row-cols-xl-5" style="margin-left: -7px;">
                    <li class="nav-item  col" v-for="(srjnshiilBi,index) in srjnshiilBis" :key="'srjnshiilBis'+index"><router-link :to="{name:'Products',query:{category:srjnshiilBi.id}}" class="nav-link">{{ srjnshiilBi.name }}</router-link></li>
                </ul>
            </div>
        </div>
    </div>
  </div>

  <div aria-labelledby="menuthree" class="dropdown-menus" v-if="submenu1 && submenu3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <ul class="nav row mt-2 nav-single">
                    <li class="nav-item  col-12"><router-link to="/product/cat1" class="nav-link">শ্রেষ্ঠ প্রবন্ধ সিরিজ</router-link></li>
                    <li class="nav-item  col-12"><a href="#" class="nav-link">ক্রীড়াজগৎ</a></li>
                    <li class="nav-item  col-12"><a href="#" class="nav-link">নির্বাচিত প্রবন্ধ</a></li>
                    <li class="nav-item  col-12"><a href="#" class="nav-link">শিশু-কিশোর</a></li>
                    <li class="nav-item  col-12"><a href="#" class="nav-link">শ্রেষ্ঠ কবিতা</a></li>
                    <li class="nav-item  col-12"><a href="#" class="nav-link">বিবিধ সমগ্র</a></li>
                    <li class="nav-item  col-12"><a href="#" class="nav-link">গবেষণা</a></li>
                    <li class="nav-item  col-12"><a href="#" class="nav-link">উপন্যাস</a></li>
                    <li class="nav-item  col-12"><a href="#" class="nav-link">প্রবন্ধ</a></li>

                </ul>
            </div>
        </div>
    </div>
  </div>


    </header>




    <a class="btn border-0 text-base text-white font-bold bg-[#F85559]">Shop Now</a>

    </div>
</template>


<script>
export default {



    created() {


        // 1. Create a new CSS class dynamically
const css = `a.carousel-control-prev {
    width: 3% !important;
}

.carousel-control-prev-icon {
    background-image: url(${this.$asseturl}assets/image/preIcon.svg);
    padding: 45px 18px;
    background-size: cover;
}

a.carousel-control-next {
    width: 3% !important;
}

.carousel-control-next-icon {
    background-image: url(${this.$asseturl}assets/image/preIcon.svg);
    padding: 45px 18px;
    background-size: cover;
    transform: rotate(180deg);
}`;

// 2. Append the newly created CSS class to the <head> element
const style = document.createElement('style');
style.type = 'text/css';
style.appendChild(document.createTextNode(css));

// Append the <style> element to the <head> element
document.head.appendChild(style);















        this.checkLogin();
        this.StoreUID();
    },

    data() {
        return {
            storageKey: 'userid',
            uniqueId: null,
            homePage:true,
            mobileMenu:false,
            submenu1:false,
            submenu2:false,
            submenu3:false,
            isFixed: false,
            MainSearch: false,
            lastScrollPosition: 0,
            form:{

                search:''
            },
            loginStatus:false,
            srjnshiilBis:{},

        }
    },
    watch: {
        '$route': async function (to, from) {
            this.StoreUID();
            this.checkLogin();
            this.submenu1 = false
              this.submenu2 = false
              this.submenu3 = false
              this.isFixed = false;
              this.$nextTick(() => {
                this.resizeWindow();
            });


    if(this.$router.history.current.path=='/'){
        this.homePage = true;
        this.submenu1 = false;

      }else{
        this.homePage = false
        this.submenu1 = true
      }





        }
    },

    computed: {
    prevIcon() {
      return 'fas fa-chevron-left'; // Replace with the Font Awesome class name for the previous icon
    },
    nextIcon() {
      return 'fas fa-chevron-right'; // Replace with the Font Awesome class name for the next icon
    },
  },
    methods: {


        generateUUID() {
      let timestamp = new Date().getTime().toString(16);
      let randomPart = ((Math.random() * 1000000000) | 0).toString(16);
      return timestamp + randomPart;
    },


        StoreUID() {
            this.uniqueId = localStorage.getItem(this.storageKey);
            if (!this.uniqueId) {
            this.uniqueId = this.generateUUID();
            localStorage.setItem(this.storageKey, this.uniqueId);
            }
        },







        checkLogin(){
            if(User.loggedIn()){
                this.loginStatus = true
            }else{
                this.loginStatus = false
            }
        },

        searchItem(){
            console.log(this.$route.query.search)
            console.log(this.form.search)

            this.$router.push({name:'Products',query:{search:this.form.search}});
        },




        level1Submenu(){
            if(this.submenu1==false){
                this.submenu1 = true
            }else{
                this.submenu1 = false
                this.submenu2 = false
                this.submenu3 = false
            }
        },
        level2Submenu(){
            if(this.submenu2==false){
              this.submenu3 = false
                this.submenu2 = true
            }else{
              this.submenu3 = false
                this.submenu2 = false
            }
        },

        level3Submenu(){
            if(this.submenu3==false){
                this.submenu3 = true
                this.submenu2 = false
            }else{
                this.submenu3 = false
                this.submenu2 = false
            }
        },
        MainSearchFun(){
            if(this.MainSearch==false){
                this.MainSearch = true
            }else{
                this.MainSearch = false
            }
        },
        handleScroll() {



            if(this.homePage){



            const mainHeadSlider = this.$el.querySelector('.mainHeadSlider');
            const rect1 = mainHeadSlider.getBoundingClientRect();
            const mainHeadSliderOffsetTop = rect1.bottom;





            const header = this.$el.querySelector('.header');
            const rect = header.getBoundingClientRect();
            const headerOffsetTop = rect.top + window.pageYOffset;


            const scrollPosition = window.pageYOffset;
            if(mainHeadSliderOffsetTop>0){
                this.isFixed = false;
            }else if(scrollPosition >= headerOffsetTop){

                this.isFixed = scrollPosition >= headerOffsetTop;

            }
        }else{
            this.isFixed = true;
        }







        },


        resizeWindow() {
    //   const windowWidth = window.screen.width;
      const windowWidth = window.innerWidth;
    //   console.log(windowWidth)

      const navbarNavDropdown1 = document.getElementById('navbarNavDropdown1');


      if (navbarNavDropdown1) {
      if (windowWidth < 768) {
        this.submenu2 = false
        this.submenu3 = false
        this.mobileMenu = true;
        navbarNavDropdown1.classList.remove('show');
      } else {
        this.mobileMenu = false;
        navbarNavDropdown1.classList.add('show');
      }
    }

    },


    async srjnshiilBi(){
        var res = await this.callApi('get',`/api/category/list/srjnshiil-bi`,[]);
        this.srjnshiilBis = res.data.children;

    },



    },
    mounted() {


        window.addEventListener("resize", () => {
            this.resizeWindow()
        });

        this.$nextTick(() => {
            this.resizeWindow();
        });

this.srjnshiilBi();



    window.addEventListener('scroll', this.handleScroll);

      if(this.$router.history.current.path=='/'){
        this.homePage = true;
        this.submenu1 = false;

      }else{
        this.homePage = false
        this.submenu1 = true
      }


  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
  },
}
</script>

style

<style >












.nav {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}

button.navbar-toggler {
    border: 1px solid #a9a6a6 !important;
    box-shadow: 0 0 0 0 !important;
    padding: 5px 14px;
}
button.navbar-toggler:focus {
    border: 1px solid #a9a6a6 !important;
    box-shadow: 0 0 0 0 !important;
}
li.submenu1 {
    width: 20%;
}

ul.navbar-nav.ms-auto.justify-content-end.align-items-center li a {
    font-size: 15px !important;
}

.submenu1.submenuhave{
    display: flex;
    justify-content: space-between;
    align-items: baseline;
}
.submenu1 a {
    padding: 10px 16px;
}
.submenu1.submenuhave a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 16px;
    padding-top: 9px;
    width: 100%;
}

header.fixed-header {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 9999;
}
.dropdown-menus {
    position: absolute;
    width: 100%;
    background: white;
    z-index: 9999;
    height: 78vh;
    overflow: scroll;
}


.nav-single{
    width: 25%;
    margin: 0 auto;
}

ul.DownItems {
    position: absolute;
    top: var(--headerHight);
    left: 0;
    background: wheat;
    width: 140px;
    display: none;
    z-index: 999;
}
.DropItem:hover .DownItems {
    display: block;
}

ul.DownItems li {
    padding: 5px 8px;
    border-bottom: 1px solid white;
    cursor: pointer;
}

ul.DownItems li:hover {
    background: #f5c263;
}



.mainSearchBox{
  display: flex!important;
    box-shadow: 0px 0px 16px -3px #0000008a;
    background: white;
    margin: 11px auto;
    padding: 2px 3px;
    width: 50%;

}
input.book-search-input {
    width: 90%;
    /* margin: 6px 0px; */
    padding: 8px 6px;
    border: 0px solid #F05C41;
    border-right: 0px;
    background: transparent;
}

button.book-search-button {
    width: 10%;
    /* margin: 6px 0; */
    background: transparent;
    border: 0px solid #F05C41;
    border-left: 0px;
    position:  relative;
}

.book-search-button .fa-regular.fa-magnifying-glass {
    position: absolute;
    top: 3px;
    right: -7px;
    font-size: 45px;
    color: var(--red);
}
.desktopDisplayNone{
    display: none;
}
@media (max-width: 992px){
        li.nav-item a {
            font-size: 13px !important;
        }
        li.nav-item.col .nav-link {
            font-size: 13px !important;
        }
    }
@media (max-width: 767px){
    .desktopDisplayNone{
        display: block;
    }
    div#navbarNavDropdown1 {
    background: #CED9DF;
    z-index: 999999;

}
div#navbarNavDropdown1 ul {
    padding: 0 !important;
}
div#navbarNavDropdown1 ul li {
    border-bottom: 2px solid white;
}
li.submenu1 {
    width: 100%;
}
}


header.header.fixed-header.othersMenu.container {
    left: 41px;
    box-shadow: 0px 2px 2px 0px #4e4e4e85;
    min-width: 95%;
}
</style>
