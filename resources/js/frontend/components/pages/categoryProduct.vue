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
        <div class="col-md-2 cursor-pointer" @click="showDetialsFun(1)">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>


        <div class="col-md-2 cursor-pointer" @click="showDetialsFun(1)">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>


        <div class="col-md-2 cursor-pointer" @click="showDetialsFun(1)">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>


        <div class="col-md-2 cursor-pointer" @click="showDetialsFun(1)">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>


        <div class="col-md-2 cursor-pointer" @click="showDetialsFun(1)">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>


        <div class="col-md-2 cursor-pointer" @click="showDetialsFun(1)">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="align-items-center border d-flex flex-wrap  mb-5 py-4" style="grid-gap:15px" v-if="showDetials==1">


                    <div>
                        <img :src="$asseturl+'assets/image/sample_book.png'"
                            alt="" style="width: 195px;  height: 210px">
                    </div>
                    <div>
                        <p class="mb-0">Product Code : </p>
                        <p class="mb-0">বাছাই গল্প</p>
                        <p class="d-inline mb-0 me-2"> ১৫০ টাকা <span class="text-decoration-line-through">৩০০
                                টাকা</span></p>
                        <span class="text-success">৫০% ছাড়</span>
                        <p class="mb-0 text-secondary">Regular Shipping</p>
                        <div>
                            <router-link to="/product/single/1" class="border-0 btn-details my-1  text-white">Details</router-link>
                            <button class="bg-secondary border-0 btn-wishlist my-1 text-nowrap text-white ms-3">Add to
                                wishlist</button>

                            <div class="btn-share d-inline dropdown ms-3 py-2 rounded">
                                <button class="btn text-white dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-share"></i> Share this book
                                </button>

                                <!-- Dropdown menu -->
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
                                    <a class="dropdown-item" href="#"><i class="fab fa-twitter"></i> Twitter</a>
                                    <a class="dropdown-item" href="#"><i class="fab fa-instagram"></i> Instagram</a>
                                    <!-- Add more social media icons and links as needed -->
                                </div>
                            </div>
                            </br>
                            <button class=" border-0 my-1 text-nowrap text-white btn-cart">Add to
                                cart</button>
                        </div>
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


        <div class="col-md-2 cursor-pointer">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 cursor-pointer">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 cursor-pointer">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 cursor-pointer">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 cursor-pointer">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 cursor-pointer">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



      <a class="fs-5 mb-0 mb-2 my-2 text-center text-decoration-none text-dark" href="">পরবর্তী  <i class="fa-regular fa-chevron-right ms-2 text-danger"></i></a>
    </div>
    </section>
    <section class="container mb-3">
      <div class="align-items-center  d-flex fs-3 gap-2 text-white py-1" style="width: 200px; background-color: #F35B43;">
          <i class="ms-4 fa-solid fa-bars fs-3"></i> <p class="mb-0">কেজি শ্রেণী</p>
      </div>

    <div class="row">


        <div class="col-md-2 cursor-pointer">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 cursor-pointer">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 cursor-pointer">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 cursor-pointer">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 cursor-pointer">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 cursor-pointer">
            <div class="text-decoration-none">
                <img :src="$asseturl+'assets/image/sample_book.png'" alt="" width="100%"  srcset="" class="my-3 shadow">
                <div class="category-book-details text-center w-100">
                <p class="mb-0 fs-7 text-dark">এসো বাংলা শিখি</p>
                <p class="mb-0 fs-9 product-lebel-text">Price : 150</p>
                <p class="mb-0  fs-8 product-lebel-text orgPrice">Regular Price : 200</p>
            </div>
            </div>
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
</style>
