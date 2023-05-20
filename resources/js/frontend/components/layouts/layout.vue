<template>
    <div>


        <header class="top-header">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img :src="$asseturl+'assets/image/logo.png'" alt="" srcset="" />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a
                class="mx-1 nav-link pb-1 text-dark my-auto"
                aria-current="page"
                href="#"
                >যোগাযোগ</a
              >
              <div class="border-left-right d-flex flex-column my-auto px-2">
                <a
                  class="text-decoration-none font-size14px my-0 py-0 text-dark"
                  href="#"
                  >লগিন
                </a>
                <a
                  class="font-size14px my-0 text-decoration-none py-0 text-dark"
                  href="#"
                  >রেজিস্টার</a
                >
              </div>
              <a class="mx-1 nav-link pb-1 text-dark" href="#"
                ><img
                  class="cart-icon"
                  :src="$asseturl+'assets/image/cart-icon.png'"
                  alt=""
                  srcset=""
              /></a>
            </div>
          </div>
        </div>
      </nav>
      <!-- menu 2 -->

      <nav
        class="navbar navbar-expand-md navbar-light"
        style="background-color: #cbcbcb"
      >
        <div class="container">
          <button
            class="mb-2 navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse justify-content-center"
            id="navbarNav"
          >
            <ul class="navbar-nav max-width-search-nav">
              <li class="nav-item">
                <a class="mx-1 nav-link pb-1 home px-3" href="#">হোম </a>
              </li>
              <li class="nav-item px-2">
                <a class="active-link mx-1 nav-link pb-1 text-dark" href="#"
                  >নতুন প্রকাশ</a
                >
              </li>
              <li class="nav-item px-2">
                <a class="mx-1 nav-link pb-1 text-dark" href="#">বই ঘর</a>
              </li>
              <li class="nav-item px-2">
                <a class="mx-1 nav-link pb-1 text-dark" href="#">কিডস জোন</a>
              </li>
              <li class="nav-item px-2">
                <a class="mx-1 nav-link pb-1 text-dark" href="#">লেখক</a>
              </li>
              <li class="nav-item px-2">
                <a class="mx-1 nav-link pb-1 text-dark" href="#"
                  >মাল্টিমিডিয়া</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- search bar -->
      <div class="text-center">
        <div class="max-width-search-nav mx-auto">
          <div class="position-relative">
            <input
              class="border-0 my-2 p-1 shadow-lg text-center w-100 py-2 pl-5"
              type="search"
              placeholder="আপনার কাঙ্খিত বইটি খুঁজে বের করুন"
              id=""
            />
            <i class="position-absolute" style="right: -12px; top: 7px">
              <img
                :src="$asseturl+'assets/image/search.png'"
                draggable="false"
                class="search-icon"
                alt=""
                srcset=""
              />
            </i>
          </div>
        </div>
      </div>
      <!-- slider -->

      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active position-relative border-0">
            <img
              src="https://images.unsplash.com/photo-1509021436665-8f07dbf5bf1d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80"
              class="d-block w-100"
              alt="..."
              height="400px"
            />
            <div class="social-container">
              <div class="d-flex flex-column">
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
              </div>
            </div>
            <div class="text-container">
              <p class="banner-details p-2 rounded-4 text-center">
                সপ্তাহে ১৫ মিনিটের রেডিও অনুষ্ঠান দিয়ে যাত্রা শুরু করে বিবিসি
                ওয়ার্ল্ড সার্ভিসের বাংলা বিভাগ। এখন প্রতিদিন মোট এক ঘণ্টার
                সংবাদ ও সাময়িক প্রসঙ্গের অনুষ্ঠান প্রচারিত হয়, যেখানে থাকে
                সংবাদ এবং লাইভ ফোন-ইন অনুষ্ঠান।
                <br />
                <br />
                অফারটি পেতে নিচের বাটনে ক্লিক করুন
              </p>
              <div class="text-center">
                <button class="border-0 click-btn rounded p-2">
                  এখানে ক্লিক করুন
                </button>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="https://images.unsplash.com/photo-1414124488080-0188dcbb8834?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
              class="d-block w-100"
              alt="..."
              height="400px"
            />
            <div class="social-container">
              <div class="d-flex flex-column">
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
              </div>
            </div>
            <div class="text-container">
              <p class="banner-details p-2 rounded-4 text-center">
                সপ্তাহে ১৫ মিনিটের রেডিও অনুষ্ঠান দিয়ে যাত্রা শুরু করে বিবিসি
                ওয়ার্ল্ড সার্ভিসের বাংলা বিভাগ। এখন প্রতিদিন মোট এক ঘণ্টার
                সংবাদ ও সাময়িক প্রসঙ্গের অনুষ্ঠান প্রচারিত হয়, যেখানে থাকে
                সংবাদ এবং লাইভ ফোন-ইন অনুষ্ঠান।
                <br />
                <br />
                অফারটি পেতে নিচের বাটনে ক্লিক করুন
              </p>
              <div class="text-center">
                <button class="border-0 click-btn rounded p-2">
                  এখানে ক্লিক করুন
                </button>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="https://images.unsplash.com/photo-1466386460451-cbc548bf581b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
              class="d-block w-100"
              alt="..."
              height="400px"
            />
            <div class="social-container">
              <div class="d-flex flex-column">
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
                <i
                  class="fa-brands fa-square-facebook fs-4 px-2 py-1 fa-facebook"
                ></i>
              </div>
            </div>
            <div class="text-container">
              <p class="banner-details p-2 rounded-4 text-center">
                সপ্তাহে ১৫ মিনিটের রেডিও অনুষ্ঠান দিয়ে যাত্রা শুরু করে বিবিসি
                ওয়ার্ল্ড সার্ভিসের বাংলা বিভাগ। এখন প্রতিদিন মোট এক ঘণ্টার
                সংবাদ ও সাময়িক প্রসঙ্গের অনুষ্ঠান প্রচারিত হয়, যেখানে থাকে
                সংবাদ এবং লাইভ ফোন-ইন অনুষ্ঠান।
                <br />
                <br />
                অফারটি পেতে নিচের বাটনে ক্লিক করুন
              </p>
              <div class="text-center">
                <button class="border-0 click-btn rounded p-2">
                  এখানে ক্লিক করুন
                </button>
              </div>
            </div>
          </div>
        </div>

        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </header>


                <slot></slot>

    <footer>
      <!-- place footer here -->
    </footer>


    </div>
</template>
<script>
export default {
    props: ['user'],
    async created() {
        localStorage.setItem('position',this.user.position)
        this.$store.commit('setUpdateUser', this.user)
    },
    data() {
        return {

        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {

            },
            deep: true
        }
    },
    methods: {



    },
    mounted() {


    }
}
</script>
