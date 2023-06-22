<template>
    <main>

<section class="mx-2 px-2" style="padding-top: 50px;">

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb ms-5 mt-3">

          <li class="breadcrumb-item active" aria-current="page">হোম</li>
          <li class="breadcrumb-item active" aria-current="page">পুথি প্রকাশের বই</li>
          <li class="breadcrumb-item active text-dark" aria-current="page">প্রাক-প্রাথমিক</li>
        </ol>
      </nav>
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

    <div class="row ">
        <div class="col-md-3 cursor-pointer" @click="showDetialsFun(1)">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/pre-view.png'" alt="" width="200px"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-75">
                <p class="mb-0 fs-5 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0">Price : 150</p>
                <p class="mb-0">Regular Price : 200</p>
            </div>
            </div>
        </div>
        <div class="col-md-3 cursor-pointer" @click="showDetialsFun(1)">
            <div class="text-decoration-none">
            <img :src="$asseturl+'assets/image/pre-view.png'" alt=""width="200px"  srcset="" class="my-3 shadow">
           <div class="category-book-details text-center w-75">
            <p class="mb-0 fs-5 text-dark">এসো বাংলা শিখি</p>
            <p class="mb-0">Price : 150</p>
            <p class="mb-0">Regular Price : 200</p>
           </div>
            </div>
        </div>
        <div class="col-md-3 cursor-pointer" @click="showDetialsFun(1)">
            <div class="text-decoration-none">
            <img :src="$asseturl+'assets/image/pre-view.png'" alt=""width="200px"  srcset="" class="my-3 shadow">
           <div class="category-book-details text-center w-75">
            <p class="mb-0 fs-5 text-dark">এসো বাংলা শিখি</p>
            <p class="mb-0">Price : 150</p>
            <p class="mb-0">Regular Price : 200</p>
           </div>
            </div>
        </div>
        <div class="col-md-3 cursor-pointer" @click="showDetialsFun(1)">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/pre-view.png'" alt=""width="200px"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-75">
                    <p class="mb-0 fs-5 text-dark">এসো বাংলা শিখি</p>
                    <p class="mb-0">Price : 150</p>
                    <p class="mb-0">Regular Price : 200</p>
                </div>
            </div>
        </div>



        <div class="align-items-center border d-flex flex-wrap  mb-5 py-4" style="grid-gap:15px" v-if="showDetials==1">
                    <div>
                        <img :src="$asseturl+'assets/image/pre-view.png'"
                            alt="" style="width: 195px;  height: 210px">
                    </div>
                    <div>
                        <h3 class="fs-5" style="color: #007185;"> এসো বাংলা শিখি</h3>
                        <p class="mb-0" style="color: #B12704;">150</p>
                        <div class="my-2 text-warning">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span style="color: #007185;">118,954</span>
                        </div>
                        <button class="btn btn-danger btn-sm mt-2">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart
                        </button>
                        <router-link to="/product/single/1" class="btn btn-info btn-sm mt-2">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Details
                        </router-link>


                    </div>
                </div>



        <a class="fs-5 mb-0 mb-2 my-2 text-center text-decoration-none text-dark" href="">পরবর্তী  <i class="fa-regular fa-chevron-right ms-2 text-danger"></i></a>
    </div>
    </section>
    <!-- aaaaaaaaaaaaaaaaaaaaaaaaa -->
    <section class="container mb-3">
      <div class="align-items-center  d-flex fs-3 gap-2 text-white py-1" style="width: 200px; background-color: #F35B43;">
          <i class="ms-4 fa-solid fa-bars fs-3"></i> <p class="mb-0">নার্সারি শ্রেণী</p>
      </div>

    <div class="row ">
      <div class="col-md-3">
            <router-link to="/product/single/1" class="text-decoration-none">
          <img :src="$asseturl+'assets/image/pre-view.png'" alt=""width="200px"  srcset="" class="my-3 shadow">
         <div class="category-book-details text-center w-75">
          <p class="mb-0 fs-5 text-dark">এসো বাংলা শিখি</p>
          <p class="mb-0">Price : 150</p>
          <p class="mb-0">Regular Price : 200</p>
         </div>
            </router-link>
      </div>
      <div class="col-md-3">
            <router-link to="/product/single/1" class="text-decoration-none">
          <img :src="$asseturl+'assets/image/pre-view.png'" alt=""width="200px"  srcset="" class="my-3 shadow">
         <div class="category-book-details text-center w-75">
          <p class="mb-0 fs-5 text-dark">এসো বাংলা শিখি</p>
          <p class="mb-0">Price : 150</p>
          <p class="mb-0">Regular Price : 200</p>
         </div>
            </router-link>
      </div>
      <div class="col-md-3">
            <router-link to="/product/single/1" class="text-decoration-none">
          <img :src="$asseturl+'assets/image/pre-view.png'" alt=""width="200px"  srcset="" class="my-3 shadow">
         <div class="category-book-details text-center w-75">
          <p class="mb-0 fs-5 text-dark">এসো বাংলা শিখি</p>
          <p class="mb-0">Price : 150</p>
          <p class="mb-0">Regular Price : 200</p>
         </div>
            </router-link>
      </div>
      <div class="col-md-3">
            <router-link to="/product/single/1" class="text-decoration-none">
          <img :src="$asseturl+'assets/image/pre-view.png'" alt=""width="200px"  srcset="" class="my-3 shadow">
         <div class="category-book-details text-center w-75">
          <p class="mb-0 fs-5 text-dark">এসো বাংলা শিখি</p>
          <p class="mb-0">Price : 150</p>
          <p class="mb-0">Regular Price : 200</p>
         </div>
            </router-link>
      </div>

      <a class="fs-5 mb-0 mb-2 my-2 text-center text-decoration-none text-dark" href="">পরবর্তী  <i class="fa-regular fa-chevron-right ms-2 text-danger"></i></a>
    </div>
    </section>
    <section class="container mb-3">
      <div class="align-items-center  d-flex fs-3 gap-2 text-white py-1" style="width: 200px; background-color: #F35B43;">
          <i class="ms-4 fa-solid fa-bars fs-3"></i> <p class="mb-0">কেজি শ্রেণী</p>
      </div>

    <div class="row">
      <div class="col-md-3">
            <router-link to="/product/single/1" class="text-decoration-none">
          <img :src="$asseturl+'assets/image/pre-view.png'" alt=""width="200px"  srcset="" class="my-3 shadow">
         <div class="category-book-details text-center w-75">
          <p class="mb-0 fs-5 text-dark">এসো বাংলা শিখি</p>
          <p class="mb-0">Price : 150</p>
          <p class="mb-0">Regular Price : 200</p>
         </div>
            </router-link>
      </div>
      <div class="col-md-3">
            <router-link to="/product/single/1" class="text-decoration-none">
          <img :src="$asseturl+'assets/image/pre-view.png'" alt=""width="200px"  srcset="" class="my-3 shadow">
         <div class="category-book-details text-center w-75">
          <p class="mb-0 fs-5 text-dark">এসো বাংলা শিখি</p>
          <p class="mb-0">Price : 150</p>
          <p class="mb-0">Regular Price : 200</p>
         </div>
            </router-link>
      </div>
      <div class="col-md-3">
            <router-link to="/product/single/1" class="text-decoration-none">
          <img :src="$asseturl+'assets/image/pre-view.png'" alt=""width="200px"  srcset="" class="my-3 shadow">
         <div class="category-book-details text-center w-75">
          <p class="mb-0 fs-5 text-dark">এসো বাংলা শিখি</p>
          <p class="mb-0">Price : 150</p>
          <p class="mb-0">Regular Price : 200</p>
         </div>
            </router-link>
      </div>
      <div class="col-md-3">
            <router-link to="/product/single/1" class="text-decoration-none">
          <img :src="$asseturl+'assets/image/pre-view.png'" alt=""width="200px"  srcset="" class="my-3 shadow">
         <div class="category-book-details text-center w-75">
          <p class="mb-0 fs-5 text-dark">এসো বাংলা শিখি</p>
          <p class="mb-0">Price : 150</p>
          <p class="mb-0">Regular Price : 200</p>
         </div>
            </router-link>
      </div>

      <a class="fs-5 mb-0 mb-2 my-2 text-center text-decoration-none text-dark" href="">পরবর্তী  <i class="fa-regular fa-chevron-right ms-2 text-danger"></i></a>
    </div>
    </section>

    </main>

</template>



<script>
export default {
    data() {
        return {
            showDetials:0,
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
