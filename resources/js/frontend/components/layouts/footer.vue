<template>

<div>


<footer>

<div id="footer"
  style="background-repeat: no-repeat;background-position: top;background-size:contain;">
  <div class="bg-white my-2 ">
    <div class="container d-flex flex-wrap justify-content-between align-items-center pb-3 pt-5">
      <div class="align-items-center  d-flex flex-wrap fs-5 gap-2 ">
        <span>অনুসরন করুনঃ </span>
        <div class="d-flex fs-5 gap-3 text-secondary">
          <i class="fa-brands fa-square-facebook linkHover"></i>
          <i class="fa-brands fa-twitter linkHover"></i>
          <i class="fa-brands fa-instagram linkHover"></i>
          <i class="fa-brands fa-youtube linkHover"></i>
          <i class="fa-brands fa-pinterest linkHover"></i>
        </div>
      </div>

      <div class="align-items-center d-flex flex-wrap fs-5 gap-2">
        <span>যোগাযোগঃ</span>
        <div class="d-flex fs-5 gap-3 text-secondary linkHover">
          <i class="fa-sharp fa-solid fa-envelope linkHover"></i>
          <i class="fa-brands fa-square-whatsapp linkHover"></i>
        </div>
      </div>
      <div>
        <span class="fs-5">আমাদের অন্যান্য প্রতিষ্ঠানঃ Bloomy</span>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="fWrapper mt-lg-4">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
          <div class="col-lg-3">
            <div class="footer_logo">
              <img :src="$asseturl+'assets/image/logo.png'" alt="" width="200px">
            </div>
            <div class="ftext pt-3">
              <div class="align-items-center d-flex"> <i class="fa-solid fa-quote-left fs-1 text-secondary"></i>
                <span class="fs-5 ms-2 mt-2">আমাদের কথাঃ</span>
              </div>
              <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error exercitationem eum necessitatibus </p>
              <div class="text-end text-secondary">
                <i class="fa-solid fa-quote-right fs-1"></i>
              </div>
            </div>

          </div>
          <div class="col-lg-6 ">
            <div class="row">
              <div class="col-md-12">
                <div class="fborder">
                  <h2>গুরুত্বপূর্ণ লিঙ্ক</h2>
                </div>
              </div>
            </div>
            <div class="fborder2">
              <div class="row">
                <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                  <h2 class="linkHover">আমাদের সম্পর্কে</h2>
                </div>
                <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                  <h2 class="linkHover">রেজিস্ট্রেশন</h2>
                </div>
              </div>
            </div>
            <div class="fborder2">
              <div class="row">
                <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                  <h2 class="linkHover">যোগাযোগ</h2>
                </div>
                <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                  <h2 class="linkHover">ডাউনলোড</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="fborder ">
              <div class="row">
                <div class="col-lg-12">
                  <h2>যোগাযোগ</h2>
                  <h5>৬১, দক্ষিন মালিবাগ,</h5>
                  <h5>ঢাকা- ১২১৭</h5>
                  <h5>Phone: +8800000000000</h5>
                  <div class="shareIcon">
                    <a href="#"><i class="fa-brands fa-facebook text-secondary linkHover"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube text-secondary linkHover"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp text-secondary linkHover"></i></a>
                    <a href="#"><i class="fa-sharp fa-regular fa-envelope text-secondary linkHover"></i></a>
                    <a href="#"><i class="fa-brands fa-square-instagram text-secondary linkHover"></i></a>
                  </div>
                  <img width="100%" style="margin:0 auto" :src="$asseturl+'assets/image/payment_baner.jpg'" alt=""/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="title_footer">
        <h5>copyright@2023 puthiprokash. All Right Reserved</h5> <img :src="$asseturl+'assets/images/bkash.png'" alt="">
      </div>
    </div>
  </div>
</div>




  </footer>
<div class="scroll-top-btn" :class="{ 'show': isScrolled }" @click="scrollToTop">
      <i class="fas fa-chevron-up linkHover"></i>
    </div>
</div>
</template>


<script>
export default {
  data() {
    return {
      isScrolled: false
    };
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
    handleScroll() {
      const scrollPosition = window.pageYOffset;
      this.isScrolled = scrollPosition > 0;
    },
    scrollToTop() {
      const scrollDuration = 500; // Adjust this value for the desired scroll duration
      const scrollStep = -window.scrollY / (scrollDuration / 15);

      const scrollInterval = setInterval(() => {
        if (window.scrollY !== 0) {
          window.scrollBy(0, scrollStep);
        } else {
          clearInterval(scrollInterval);
        }
      }, 15);
    }
  }
};
</script>

<style>
.scroll-top-btn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 40px;
  height: 40px;
  background-color: #333;
  color: #fff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s, visibility 0.3s;
}

.scroll-top-btn.show {
  opacity: 1;
  visibility: visible;
}

.scroll-top-btn i {
  font-size: 20px;
}

/* Add any additional styles as needed */
</style>
