<template>
    <div>

        <div class="mainHeadSlider">
<!--

            <b-carousel
      id="carousel-1"
      fade
      :interval="4000"
      controls
      indicators
      background="#ababab"
      img-width="1024"
      img-height="480"
    >

      <b-carousel-slide
        caption="First slide"
        text="Nulla vitae elit libero, a pharetra augue mollis interdum."
        img-src="https://picsum.photos/1024/480/?image=52"
      ></b-carousel-slide>


      <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=54">
        <h1>Hello world!</h1>
      </b-carousel-slide>


      <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=58"></b-carousel-slide>


      <b-carousel-slide>
        <template #img>
          <img
            class="d-block img-fluid w-100"
            width="1024"
            height="480"
            src="https://picsum.photos/1024/480/?image=55"
            alt="image slot"
          >
        </template>
      </b-carousel-slide>

      <b-carousel-slide caption="Blank Image" img-blank img-alt="Blank image">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eros felis, tincidunt
          a tincidunt eget, convallis vel est. Ut pellentesque ut lacus vel interdum.
        </p>
      </b-carousel-slide>
    </b-carousel> -->



        <img width="100%" :src="$asseturl+'assets/image/Banner-compress.gif'" alt="">



        </div>




        <header class="header" style="background-color: #ced9df" :class="{ 'fixed-header': isFixed }">
      <nav class="navbar navbar-expand-lg p-0 mt-0" style="    height: 63px;">
        <div class="container-fluid" style="padding-right:0px !important;">
          <router-link class="navbar-brand" to="/">
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
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul
              class="navbar-nav ms-auto justify-content-end align-items-center"
            >
              <li class="nav-item">
                <a class="fs-5 nav-link text-dark" aria-current="page" href="#">
                  <img
                    :src="$asseturl+'assets/image/cart-icon.png'"
                    alt=""
                    srcset=""
                    width="50px"
                  />
                </a>
              </li>
              <li class="border-3 border-start border-white nav-item px-2">
                <a style="    padding: 4px 13px !important;"
                  class="fw-light my-choice fs-5 nav-link text-dark px-3 py-2 shadow text-dark"
                  href="#"
                  >আমার পছন্দ</a
                >
              </li>
              <li class="border-3 border-start border-white nav-item px-2">
                <a class="fs-5 nav-link text-dark" href="#">রেজিস্টার</a>
              </li>
              <li class="border-3 border-start border-white nav-item px-2">
                <a class="fs-5 nav-link text-dark" href="#"
                  >সাইন ইন
                  <i class="fa-sharp fa-regular fa-arrow-right-to-arc"></i
                ></a>
              </li>
              <li class="border-3 border-start border-white nav-item px-2">
                <a class="fs-5 nav-link text-dark" href="#"
                  >অনুসন্ধান <i class="fa-solid fa-magnifying-glass"></i
                ></a>
              </li>
              <li class="nav-item dark-bars px-3 py-2" @click="level1Submenu">
                <span
                  class="nav-link text-dark text-white"

                >
                  <i class="fa-solid fa-bars fs-3"></i>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </nav>


      <section style="background-color: #CED9DF" class="mt-4" v-if="submenu1">
        <nav class="navbar navbar-expand-lg d-flex justify-content-center p-0">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav d-flex justify-content-between w-100">
                  <li class="submenu1">
                    <a class="fs-5 nav-link text-dark" href="#">হোম</a>
                  </li>
                  <li class="submenu1">
                  <a class="border-3 border-start border-white fs-5 nav-link ps-3 text-dark" href="#">লেখক</a>

                  <li class="submenu1 submenuhave">
                    <a class="border-3 border-start border-white fs-5 nav-link ps-3 text-dark" @click="level3Submenu" href="javascript:void(0)" >পুথিপ্রকাশের বই <i class="fa-light fa-arrow-down-long"></i></a>
                  </li>

                  <li class="submenu1 submenuhave">

                  <a class="border-3 border-start border-white fs-5 nav-link ps-3 text-dark" @click="level2Submenu" href="javascript:void(0)" >বিষয় <i class="fa-light fa-arrow-down-long"></i></a>

                </li>
                  <li class="submenu1">
                  <a class="border-3 border-start border-white fs-5 nav-link ps-3 text-dark" href="#">মাল্টিমিডিয়া</a>
                </li>
                </ul>
              </div>
            </div>
          </nav>
    </section>


  <div aria-labelledby="menuthree" class="dropdown-menus" v-if="submenu1 && submenu2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <ul class="nav row mt-2">
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><router-link to="/product/cat1" class="nav-link">শ্রেষ্ঠ প্রবন্ধ সিরিজ</router-link></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">ক্রীড়াজগৎ</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">নির্বাচিত প্রবন্ধ</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">শিশু-কিশোর</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">শ্রেষ্ঠ কবিতা</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">বিবিধ সমগ্র</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">গবেষণা</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">উপন্যাস</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">প্রবন্ধ</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">ভৌতিক গল্প</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">প্রবন্ধ সংকলন</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">কাব্য সমালোচনা</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">কমিকস্</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">ভাষা আন্দোলন</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">অভিধান</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">জীবনী গ্রন্থমালা</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">নাটক</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">গণিত ও বিজ্ঞান</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">প্যারাসাইকোলজি</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">সাহিত্যসমালোচনা</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">জীবন দর্শন</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">আন্তর্জাতিক রাজনীতি</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">কিশোর উপন্যাস</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">ব্যক্তিত্ব</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">বইমেলা ২০২২</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">শিক্ষা</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">সমাজ সংস্কৃতি রাজনীতি</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">শিশু-শিক্ষা</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">ধর্মবিষয়ক</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">ভ্রমণ</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">রচনাবলি</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">কবিতা</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">মুক্তিযুদ্ধ</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">সম্পাদিত গ্রন্থ</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">প্রবন্ধ-নিবন্ধ-গবেষণা</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">রেফারেন্স/চিরায়ত</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">রবীন্দ্র-নজরুল</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">বঙ্গবন্ধু : নানাপ্রসঙ্গ</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">অনুবাদ গ্রন্থ</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">ভাষা ও সাহিত্য</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">আত্মজীবনী/স্মৃতিকথা</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">সম্মাননা সংকলন/স্মরণগ্রন্থ</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">গণমাধ্যম ও চলচ্চিত্র</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">স্বাস্থ্য ও চিকিৎসা</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">গল্প</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">বিজ্ঞান/সাধারণ জ্ঞান</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">সাক্ষাৎকার/নাটক</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">প্রকৃতি ও পরিবেশ</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">ইতিহাস</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">রম্যরচনা</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">রান্না</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">কিশোর গল্প</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">কিশোর রহস্য</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">শিশিলিন কিশোর গোয়েন্দা সিরিজ</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">গোয়েন্দা কাহিনি</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">রূপকথা সিরিজ</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">ভৌতিক উপন্যাস</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">সায়েন্স ফিকশন</a></li>
                    <li class="nav-item  col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"><a href="#" class="nav-link">ক্যারিয়ার</a></li>
                </ul>
            </div>
        </div>
    </div>
  </div>



  <div aria-labelledby="menuthree" class="dropdown-menus" v-if="submenu1 && submenu3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <ul class="nav row mt-2">
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







    </div>
</template>


<script>
export default {
    data() {
        return {
            submenu1:false,
            submenu2:false,
            submenu3:false,
            isFixed: false,
            lastScrollPosition: 0
        }
    },
    watch: {
        '$route': async function (to, from) {
              this.submenu1 = false
              this.submenu2 = false
              this.submenu3 = false

        }
    },
    methods: {
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
        handleScroll() {





            const mainHeadSlider = this.$el.querySelector('.mainHeadSlider');
            const rect1 = mainHeadSlider.getBoundingClientRect();
            const mainHeadSliderOffsetTop = rect1.bottom;





            const header = this.$el.querySelector('.header');
            const rect = header.getBoundingClientRect();
            const headerOffsetTop = rect.top + window.pageYOffset;


            const scrollPosition = window.pageYOffset;
            if(mainHeadSliderOffsetTop>0){
              console.log('ssss')
                this.isFixed = false;
            }else if(scrollPosition >= headerOffsetTop){

                this.isFixed = scrollPosition >= headerOffsetTop;

            }








        }

    },
    mounted() {
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
  },
}
</script>

<style scoped>
.nav {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
li.submenu1 {
    width: 20%;
}
.submenu1.submenuhave{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.submenu1.submenuhave a{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 16px;
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
</style>
