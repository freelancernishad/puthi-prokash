<template>
    <div>
        <main>














      <!-- ABout section -->
      <section class="w-100 container">
        <div class="row my-5 py-2">
          <div class="col-md-6">
            <h3>আমাদের সম্পর্কে</h3>
            <h4>
              সপ্তাহে ১৫ মিনিটের রেডিও অনুষ্ঠান দিয়ে যাত্রা শুরু করে বিবিসি
              ওয়ার্ল্ড সার্ভিসের বাংলা বিভাগ। এখন প্রতিদিন মোট এক ঘণ্টার সংবাদ
              ও সাময়িক প্রসঙ্গের অনুষ্ঠান প্রচারিত হয়, যেখানে থাকে সংবাদ, নানা
              ধরনের ম্যাগাজিন, শ্রোতাদের চিঠিপত্রের আয়োজন এবং লাইভ ফোন-ইন
              অনুষ্ঠান।
            </h4>
          </div>
          <div class="col-md-6">
            <p>
              রেডিও-টিভির পর বিবিসি নিউজ বাংলা যোগ দিয়েছে ডিজিটাল ভুবনে। বিবিসি
              বাংলার অনলাইন সাইট, ফেসবুক পেজ আর ইউটিউব চ্যানেল প্রতিদিন পরিবেশন
              করছে বিভিন্ন রকমের খবর, বিশ্লেষণ আর শিক্ষণীয় প্রতিবেদন, অডিও
              ভিডিও এবং টেক্সট ফরম্যাটে। বিবিসি নিউজ বাংলা থেকে প্রচারিত উন্নত
              মানের ও বিশ্বাসযোগ্য পরিবেশনা বাংলাদেশ ও ভারত ছাড়াও মধ্যপ্রাচ্য,
              দূরপ্রাচ্য, আমেরিকা এবং ইয়োরোপের বহু শ্রোতা এখন ইন্টারনেটের
              মাধ্যমে শোনেন, পড়েন এবং দেখেন। বিবিসি নিউজ বাংলার কর্মকাণ্ড
              পরিচালিত হয় লন্ডনে নিউ ব্রডকাস্টিং হাউজের সদর দপ্তর থেকে। ঢাকা,
              দিল্লি এবং কলকাতায় আমাদের নিজস্ব ব্যুরোতে কর্মরত সংবাদদাতারা
              ছাড়াও লন্ডনে বিবিসি অফিসে কাজ করছেন একদল সাংবাদিক/প্রযোজক।
            </p>
            <button
              class="bg-white border border-dark fs-5 p-3 px-5 text-secondary"
            >
              বিস্তারিত
            </button>
          </div>
        </div>
      </section>
      <!-- পুথিপ্রকাশ কার্য সমগ -->
      <section class="top-header">
        <h2 class="py-4 text-center">পুথিপ্রকাশ কার্য সমগ্র</h2>
        <!--  -->
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row gx-0">
                <div class="col-sm-3"><img :src="$asseturl+'assets/image/img_1.jpg'" class="d-block w-100" alt="Image 1"/></div>
                <div class="col-sm-3"><img :src="$asseturl+'assets/image/img_2.jpg'" class="d-block w-100" alt="Image 2"/></div>
                <div class="col-sm-3"><img :src="$asseturl+'assets/image/img_3.jpg'" class="d-block w-100" alt="Image 3"/> </div>
                <div class="col-sm-3">
                  <img
                    :src="$asseturl+'assets/image/img_4.jpg'"
                    class="d-block w-100"
                    alt="Image 4"
                  />
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row gx-0">
                <div class="col-sm-3">
                  <img
                    :src="$asseturl+'assets/image/img_5.jpg'"
                    class="d-block w-100"
                    alt="Image 5"
                  />
                </div>
                <div class="col-sm-3">
                  <img
                    :src="$asseturl+'assets/image/img_6.jpg'"
                    class="d-block w-100"
                    alt="Image 6"
                  />
                </div>
                <div class="col-sm-3">
                  <img
                    :src="$asseturl+'assets/image/img_1.jpg'"
                    class="d-block w-100"
                    alt="Image 7"
                  />
                </div>
                <div class="col-sm-3">
                  <img
                    :src="$asseturl+'assets/image/img_5.jpg'"
                    class="d-block w-100"
                    alt="Image 8"
                  />
                </div>
              </div>
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#myCarousel"
            data-bs-slide="prev"
          >

          <i class="fa-solid fa-angle-left fs-1 fw-bold me-auto text-dark"></i>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#myCarousel"
            data-bs-slide="next"
          >
          <i class="fa-angle-right fa-solid fs-1 fw-bold ms-auto text-dark"></i>

            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <div class="py-3 text-end w-100 pe-3">
          <h4 class="d-inline">
            আমাদের কার্যসমূহ সম্পর্কে বিশদ ধারণা পেতে ক্লিক করুন
          </h4>
          <button class="btn-details d-inline px-4 py-2 ms-3">বিস্তারিত</button>
        </div>
        <!--  -->
      </section>
      <!-- নতুন সংস্করণ -->
      <section class="container">
        <h2 class="mt-3 text-center">নতুন সংস্করণ</h2>
        <p class="mx-auto text-center">
          জীবের মধ্যে সবচেয়ে সম্পূর্ণতা মানুষের। কিন্তু সবচেয়ে অসম্পূর্ণ হয়ে
          সে জন্মগ্রহণ করে। বাঘ ভালুক তার জীবনযাত্রার পনেরো- আনা মূলধন নিয়ে আসে
          প্রকৃতির মালখানা থেকে। জীবরঙ্গভূমিতে মানুষ এসে দেখা দেয় দুই শূন্য
          হাতে মুঠো বেঁধে। মানুষ আসবার পূর্বেই জীবসৃষ্টিযজ্ঞে প্রকৃতির
          ভূরিব্যয়ের পালা শেষ হয়ে এসেছে।
        </p>
      </section>
      <div class="row container mx-auto">
      <div class="col-6 col-lg-2">
          <div class="card-body position-relative">
            <div class="overlay position-absolute "></div>
            <p class="text-white text-center position-absolute book-badge">গল্প </p>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm33lv0W92j2lTEfjP-AkuRKY1z7vPlKfYbQ&usqp=CAU" alt="" class="img-fluid book-cover" srcset="" />
            <div class="text-center">
              <p class="book-name mb-0">ফক্সি জাম্প</p>
              <p class="book-version mb-0">সংঙ্করণ-১</p>
              <p class="book-price mb-0">১০০ টাকা</p>
            </div>
          </div>
        </div>


        <div class="col-6 col-lg-2">
          <div class="card-body position-relative">
            <div class="overlay position-absolute "></div>
            <p class="text-white text-center position-absolute book-badge">গল্প </p>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm33lv0W92j2lTEfjP-AkuRKY1z7vPlKfYbQ&usqp=CAU" alt="" class="img-fluid book-cover" srcset="" />
            <div class="text-center">
              <p class="book-name mb-0">ফক্সি জাম্প</p>
              <p class="book-version mb-0">সংঙ্করণ-১</p>
              <p class="book-price mb-0">১০০ টাকা</p>
            </div>
          </div>
        </div>


        <div class="col-12 col-lg-4 text-center">
          <div class="card-body position-relative">
            <div class="overlay position-absolute "></div>
            <p class="text-white text-center position-absolute book-badge2">গল্প </p>
            <img
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm33lv0W92j2lTEfjP-AkuRKY1z7vPlKfYbQ&usqp=CAU"
              alt=""
              class="img-fluid book-cover"
              srcset=""
            />
            <div class="text-center">
              <p class="book-name mb-0">ফক্সি জাম্প</p>
              <p class="book-version mb-0">সংঙ্করণ-১</p>
              <p class="book-price mb-0">১০০ টাকা</p>
            </div>
          </div>
        </div>

      <div class="col-6 col-lg-2">
          <div class="card-body position-relative">
            <div class="overlay position-absolute "></div>
            <p class="text-white text-center position-absolute book-badge">গল্প </p>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm33lv0W92j2lTEfjP-AkuRKY1z7vPlKfYbQ&usqp=CAU" alt="" class="img-fluid book-cover" srcset="" />
            <div class="text-center">
              <p class="book-name mb-0">ফক্সি জাম্প</p>
              <p class="book-version mb-0">সংঙ্করণ-১</p>
              <p class="book-price mb-0">১০০ টাকা</p>
            </div>
          </div>
        </div>
      <div class="col-6 col-lg-2">
          <div class="card-body position-relative">
            <div class="overlay position-absolute "></div>
            <p class="text-white text-center position-absolute book-badge">গল্প </p>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm33lv0W92j2lTEfjP-AkuRKY1z7vPlKfYbQ&usqp=CAU" alt="" class="img-fluid book-cover" srcset="" />
            <div class="text-center">
              <p class="book-name mb-0">ফক্সি জাম্প</p>
              <p class="book-version mb-0">সংঙ্করণ-১</p>
              <p class="book-price mb-0">১০০ টাকা</p>
            </div>
          </div>
        </div>
      </div>
    </main>



    <swiper class="swiper" :options="swiperOption">
    <swiper-slide>
      <div class="swiper-zoom-container">
        <img width="100%" :src="$asseturl+'assets/image/img_1.jpg'">
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
    </swiper-slide>
    <swiper-slide>
      <div class="swiper-zoom-container">
        <img width="100%" :src="$asseturl+'assets/image/img_2.jpg'">
      </div>
    </swiper-slide>
    <swiper-slide>
      <div class="swiper-zoom-container">
        <img width="100%" :src="$asseturl+'assets/image/img_3.jpg'">
      </div>
    </swiper-slide>
    <div class="swiper-pagination swiper-pagination-white" slot="pagination"></div>
    <div class="swiper-button-prev" slot="button-prev"></div>
    <div class="swiper-button-next" slot="button-next"></div>
  </swiper>






    </div>
</template>
<script>


export default {


    created() {

    },

    data() {
        return {



            swiperOption: {
            speed: 600,
            parallax: true,
            pagination: {
              el: '.swiper-pagination',
              clickable: true
            },
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev'
            }
          }



        }



    },
    methods: {


    },
    mounted() {




    }
};
</script>






