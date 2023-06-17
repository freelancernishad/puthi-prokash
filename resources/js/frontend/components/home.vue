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

        <div class="d-flex gap-2">
          <div class="position-relative">
            <div style="background-color: #ebeff2">
              <p class="booktitle">পাঠ্যবই</p>
              <img
                :src="$asseturl+'assets/image/book-img-work.png'"
                alt=""
                srcset=""
                class="img-fluid px-4 py-5"
              />
            </div>
          </div>
          <div class="position-relative">
            <div style="background-color: #ebeff2">
              <p class="booktitle">পাঠ্যবই</p>
              <img
                :src="$asseturl+'assets/image/book-img-work.png'"
                alt=""
                srcset=""
                class="img-fluid px-4 py-5"
              />
            </div>
          </div>
          <div class="position-relative">
            <div style="background-color: #ebeff2">
              <p class="booktitle">পাঠ্যবই</p>
              <img
                :src="$asseturl+'assets/image/book-img-work.png'"
                alt=""
                srcset=""
                class="img-fluid px-4 py-5"
              />
            </div>
          </div>
          <div class="position-relative">
            <div style="background-color: #ebeff2">
              <p class="booktitle">পাঠ্যবই</p>
              <img
                :src="$asseturl+'assets/image/book-img-work.png'"
                alt=""
                srcset=""
                class="img-fluid px-4 py-5"
              />
            </div>
          </div>
          <div class="position-relative">
            <div style="background-color: #ebeff2">
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
      </section>
    </main>
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






