<template>
 <main>
      <section class="container w-75 mx-auto my-5">
        <div>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsum
          asperiores, eligendi, velit aliquid dolorum doloribus quis eveniet
          adipisci inventore, dolor sapiente odio maiores laborum natus ut!
          Odio, assumenda atque. Lorem ipsum dolor sit amet consectetur
          adipisicing elit. Doloribus necessitatibus magni consequuntur suscipit
          aut tenetur. Quas maxime quaerat ipsa eaque beatae excepturi quod?
          Unde magnam quasi nesciunt? Quas, nobis aliquam?
        </div>
      </section>
      <section class=" mx-auto my-5">
        <h2 class="text-center">পুথি প্রকাশের বই</h2>

        <hr class="mx-auto  hr-1" />




        <VueSlickCarousel v-bind="Carouselsettings">

            <div>
          <div class="position-relative homeBooks">
            <div class="slideProductHome">
              <p class="booktitle">পাঠ্যবই</p>
              <img
                :src="$asseturl+'assets/image/book-img-work.png'"
                alt=""
                srcset=""
                class="img-fluid px-4 py-5"
              />
            </div>
          </div>
          </div>
          <div>
          <div class="position-relative homeBooks">
            <div class="slideProductHome">
              <p class="booktitle">পাঠ্যবই</p>
              <img
                :src="$asseturl+'assets/image/book-img-work.png'"
                alt=""
                srcset=""
                class="img-fluid px-4 py-5"
              />
            </div>
          </div>
          </div>
          <div>
          <div class="position-relative homeBooks">
            <div class="slideProductHome">
              <p class="booktitle">পাঠ্যবই</p>
              <img
                :src="$asseturl+'assets/image/book-img-work.png'"
                alt=""
                srcset=""
                class="img-fluid px-4 py-5"
              />
            </div>
          </div>
          </div>
          <div>
          <div class="position-relative homeBooks">
            <div class="slideProductHome">
              <p class="booktitle">পাঠ্যবই</p>
              <img
                :src="$asseturl+'assets/image/book-img-work.png'"
                alt=""
                srcset=""
                class="img-fluid px-4 py-5"
              />
            </div>
          </div>
          </div>

          <div>
          <div class="position-relative homeBooks">
            <div class="slideProductHome">
              <p class="booktitle">পাঠ্যবই</p>
              <img
                :src="$asseturl+'assets/image/book-img-work.png'"
                alt=""
                srcset=""
                class="img-fluid px-4 py-5"
              />
            </div>
          </div>
        </div>

          <div>
          <div class="position-relative homeBooks">
            <div class="slideProductHome">
              <p class="booktitle">পাঠ্যবই</p>
              <img
                :src="$asseturl+'assets/image/book-img-work.png'"
                alt=""
                srcset=""
                class="img-fluid px-4 py-5"
              />
            </div>
          </div>
        </div>



        </VueSlickCarousel>































      </section>



      <section :style="`padding: 55px 0px;background: url(${$asseturl}assets/image/uddomSection.jpg);background-size: cover;`">
      <div
        style=";background-repeat: no-repeat;background-size:contain;"
        class="py-3">
        <h1 class="text-center text-white"> <span style="font-size: 66px;">বই</span> সর্বোত্তম উপহার</h1>
        <p class="col-7 mx-auto text-white" style="padding-bottom: 30px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum, dolorem!
          Rem unde
          saepe eos et quas
          obcaecati. Mollitia placeat velit alias ratione porro tempora sequi iusto recusandae ducimus delectus ullam
          dolorem nihil soluta voluptates assumenda, provident asperiores illo sit sed ex cum quaerat! Hic</p>

        <div>
          <div class="text-center">
            <button style="background-color: #F25B43;" class="border-0 btn fs-4 p-2 px-4 rounded-0 text-white">অনুসন্ধান
              করুন</button>
          </div>

          <div class="d-flex gap-3 justify-content-center flex-wrap mt-4 text-center">
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
            <button class="border border-dark btn fs-5 px-4 rounded-0 text-white">শিশুতোষ</button>
          </div>

        </div>



      </div>

    </section>



    </main>
</template>
<script>

import VueSlickCarousel from 'vue-slick-carousel'
  // optional style for arrows & dots

  import 'vue-slick-carousel/dist/vue-slick-carousel.css';
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'


export default {
    components: { VueSlickCarousel },

    created() {

    },

    data() {
        return {
            Carouselsettings:{
  "dots": true,
  "infinite": true,
  "arrows":false,
  "autoplay":true,
  "speed": 500,
  "slidesToShow": 5,
  "slidesToScroll": 5,
  "initialSlide": 5,
  "responsive": [
    {
      "breakpoint": 1024,
      "settings": {
        "slidesToShow": 3,
        "slidesToScroll": 3,
        "infinite": true,
        "dots": true
      }
    },
    {
      "breakpoint": 600,
      "settings": {
        "slidesToShow": 2,
        "slidesToScroll": 2,
        "initialSlide": 2
      }
    },
    {
      "breakpoint": 480,
      "settings": {
        "slidesToShow": 1,
        "slidesToScroll": 1
      }
    }
  ]
},


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



<style>

.position-relative.homeBooks {
    /* width: 240px; */
}
.slideProductHome {
    background-color: rgb(235, 239, 242);
    margin: 6px 5px;
}
.slideProductHome:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #ff000000;
}
</style>


