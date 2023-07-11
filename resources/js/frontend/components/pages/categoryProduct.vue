<template>
    <main>

<section class="mx-2 px-2" style="padding-top: 50px;">



      <Breadcrumb :pages="[{'route':'home','text':'হোম'},{'route':'npx create-vite@latest .','text':'পুথি প্রকাশের বই'},{'route':'','text':'প্রাক-প্রাথমিক'}]"/>

    <div class=" my-4 row w-100">
    <div class="align-items-center col-md-6 d-flex justify-content-between">
        <img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px">
    <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4">প্রাক-প্রাথমিক</p>
    <p  class="border-3 border-bottom border-top d-inline fs-4 mb-0 px-4">৬০</p>
    </div>

    <div class="col-md-6 d-flex gap-5 py-2">
        <select class="form-select" aria-label="Default select example">
        <option selected>বাছাইয়ের ধরণ</option>
        <option value="1">  One</option>

        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    <select class="form-select" aria-label="Default select example">
        <option selected>ফিল্টার </option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select></div>
    </div>
    </section>
    <section class="container mb-3">
        <div class="align-items-center  d-flex fs-3 gap-2 text-white py-1" style="width: 200px; background-color: #F35B43;">
            <i class="ms-4 fa-solid fa-bars fs-3"></i> <p class="mb-0">প্লে শ্রেণী</p>
        </div>

        <div class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-6 row-cols-md-2 row-cols-sm-2 row-cols-2">

            <div class="col cursor-pointer" @click="showDetialsFun(1)">
                <div class="text-decoration-none productimage">
                    <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                    <div class="category-book-details text-center w-100">
                    <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                    <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                    <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
                </div>
                </div>
            </div>


            <div class="col cursor-pointer" @click="showDetialsFun(1)">
                <div class="text-decoration-none productimage">
                    <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                    <div class="category-book-details text-center w-100">
                    <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                    <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                    <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
                </div>
                </div>
            </div>


            <div class="col cursor-pointer" @click="showDetialsFun(1)">
                <div class="text-decoration-none productimage">
                    <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                    <div class="category-book-details text-center w-100">
                    <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                    <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                    <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
                </div>
                </div>
            </div>


            <div class="col cursor-pointer" @click="showDetialsFun(1)">
                <div class="text-decoration-none productimage">
                    <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                    <div class="category-book-details text-center w-100">
                    <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                    <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                    <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
                </div>
                </div>
            </div>


            <div class="col cursor-pointer" @click="showDetialsFun(1)">
                <div class="text-decoration-none productimage">
                    <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                    <div class="category-book-details text-center w-100">
                    <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                    <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                    <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
                </div>
                </div>
            </div>


            <div class="col cursor-pointer" @click="showDetialsFun(1)">
                <div class="text-decoration-none productimage">
                    <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                    <div class="category-book-details text-center w-100">
                    <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                    <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                    <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
                </div>
            </div>
        </div>



        <div class="align-items-center border d-flex flex-wrap  mb-5 py-4 w-100 position-relative" style="grid-gap:15px" v-if="showDetials==1">
            <button class="singleProductCollectedButton">সংগ্রহ করুন</button>

                    <div>
                        <img :src="$asseturl+' productimageassets/image/sample_book_Re.png'"
                            alt="" style="width: 195px;  height: 255px">
                    </div>
                    <div>

                        <router-link :to="{name:'productSingle',params:{id:1}}" class="mb-0" >এসো বাংলা শিখি</router-link>
                        <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                        <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>



                        <p class="mb-0  fs-8 mt-3">উল্লেখযোগ্য অংশবিশেষ</p>




                        <div>
                            <div class="d-flex">

                                <img :src="$asseturl+'assets/image/sample_book_Re.png'" @click="openModal($asseturl+'assets/image/sample_book_Re.png')"  class="img-thumbnail sampleBooks">

                                <img :src="$asseturl+'assets/image/sample_book_Re.png'" @click="openModal($asseturl+'assets/image/sample_book_Re.png')"  class="img-thumbnail sampleBooks">
                                <img :src="$asseturl+'assets/image/sample_book_Re.png'" @click="openModal($asseturl+'assets/image/sample_book_Re.png')"  class="img-thumbnail sampleBooks">
                                <img :src="$asseturl+'assets/image/sample_book_Re.png'" @click="openModal($asseturl+'assets/image/sample_book_Re.png')"  class="img-thumbnail sampleBooks">
                            </div>

                        </div>
                    </div>

                </div>



        <a class="fs-5 mb-0 mb-2 my-2 text-center text-decoration-none text-dark w-100" href="">পরবর্তী  <i class="fa-regular fa-chevron-right ms-2 text-danger"></i></a>
    </div>
    </section>
    <!-- aaaaaaaaaaaaaaaaaaaaaaaaa -->
    <section class="container mb-3">
      <div class="align-items-center  d-flex fs-3 gap-2 text-white py-1" style="width: 200px; background-color: #F35B43;">
          <i class="ms-4 fa-solid fa-bars fs-3"></i> <p class="mb-0">নার্সারি শ্রেণী</p>
      </div>

    <div class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-6 row-cols-md-2 row-cols-sm-2 row-cols-2">


        <div class="col cursor-pointer">
            <div class="text-decoration-none productimage">
                <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col cursor-pointer">
            <div class="text-decoration-none productimage">
                <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col cursor-pointer">
            <div class="text-decoration-none productimage">
                <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col cursor-pointer">
            <div class="text-decoration-none productimage">
                <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col cursor-pointer">
            <div class="text-decoration-none productimage">
                <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col cursor-pointer">
            <div class="text-decoration-none productimage">
                <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



      <a class="fs-5 mb-0 mb-2 my-2 text-center text-decoration-none text-dark w-100" href="">পরবর্তী  <i class="fa-regular fa-chevron-right ms-2 text-danger"></i></a>
    </div>
    </section>
    <section class="container mb-3">
      <div class="align-items-center  d-flex fs-3 gap-2 text-white py-1" style="width: 200px; background-color: #F35B43;">
          <i class="ms-4 fa-solid fa-bars fs-3"></i> <p class="mb-0">কেজি শ্রেণী</p>
      </div>

    <div class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-6 row-cols-md-2 row-cols-sm-2 row-cols-2">


        <div class="col cursor-pointer">
            <div class="text-decoration-none productimage">
                <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col cursor-pointer">
            <div class="text-decoration-none productimage">
                <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col cursor-pointer">
            <div class="text-decoration-none productimage">
                <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col cursor-pointer">
            <div class="text-decoration-none productimage">
                <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col cursor-pointer">
            <div class="text-decoration-none productimage">
                <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col cursor-pointer">
            <div class="text-decoration-none productimage">
                <img :src="$asseturl+'assets/image/sample_book_Re.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>


      <a class="fs-5 mb-0 mb-2 my-2 text-center text-decoration-none text-dark w-100" href="">পরবর্তী  <i class="fa-regular fa-chevron-right ms-2 text-danger"></i></a>
    </div>
    </section>



    <div v-if="modalOpen" @click="closeModal" class="modal-overlay">
      <div class="modal-container">
        <img :src="imageUrl" alt="Modal Image" />
      </div>
    </div>





    </main>

</template>



<script>
export default {
    data() {
        return {
            showDetials:0,
            modalOpen: false,
        imageUrl:'',
        }
    },
    methods: {
        showDetialsFun(id){
            console.log(id)
            if(this.showDetials==id){
                this.showDetials = 0;
            }else{
                this.showDetials = id;

            }
        }
    },
}
</script>
<style scoped>
        .btn-details {
            border-radius: 16px 5px 16px 5px;
            background: #030454;
            width: 100px;
            padding: 5px 20px;
        }

        .btn-wishlist {
            border-radius: 16px 5px 16px 5px;
            width: 130px;
        }

        .btn-cart {
            border-radius: 16px 5px 16px 5px;
            width: 100px;
            background-color: #EC593B;
        }

        .btn-share {
            background-color: #555F6A;

        }
        .product-lebel-text{
            font-size: calc(11pt + (12 - 11) * ((100vw - 300px) / (1600 - 300)));
        }
        .product-lebel-text.orgPrice{
            font-size: 9pt;
        }
        .productimage{
            padding: 5px 7px;
        }
</style>
