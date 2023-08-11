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


           <div v-for="(latestProduct,sl) in preload_data.categories" :key="'latestProduct'+sl">
          <div class="position-relative homeBooks">
            <div class="slideProductHome">
              <p class="booktitle">{{ latestProduct.name }}</p>
              <img
                :src="$asseturl+latestProduct.icon"
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

          <!-- <div class="d-flex gap-3 justify-content-center flex-wrap mt-4 text-center">
            <router-link v-for="(academicbooksChild,slNo) in academicbooksChilds" :key="'academicbooksChild'+slNo" :to="{name:'Products',query:{category:academicbooksChild.id}}" class="border border-dark btn fs-5 px-4 rounded-0 text-white">{{ academicbooksChild.name }}</router-link>
          </div> -->

          <div class="d-flex gap-3 justify-content-center flex-wrap mt-4 text-center">
            <router-link v-for="(academicbooksChild,slNo) in firstLineItems" :key="'academicbooksChild1'+slNo" :to="{name:'Products',query:{category:academicbooksChild.category.id}}" class="border border-dark btn fs-5 px-4 rounded-0 text-white">{{ academicbooksChild.category.name }}</router-link>
          </div>

          <div class="d-flex gap-3 justify-content-center flex-wrap mt-4 text-center">
            <router-link v-for="(academicbooksChild,slNo) in secondLineItems" :key="'academicbooksChild2'+slNo" :to="{name:'Products',query:{category:academicbooksChild.category.id}}" class="border border-dark btn fs-5 px-4 rounded-0 text-white">{{ academicbooksChild.category.name }}</router-link>
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
          },


          academicbooksChilds:{},
          firstLineItems:{},
          secondLineItems:{},


        }



    },
    methods: {

        async childCategoryAcademicbooks(){
            var res = await this.callApi('get',`/api/feature-categories`,[]);

            this.academicbooksChilds = res.data
            this.firstLineItems = this.academicbooksChilds.slice(0, 7);
            this.secondLineItems = this.academicbooksChilds.slice(7);

        }


    },
    mounted() {
        this.childCategoryAcademicbooks();


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


