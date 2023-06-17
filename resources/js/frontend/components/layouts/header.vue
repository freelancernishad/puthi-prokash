<template>
    <div>
        <header class="" style="background-color: #ced9df">
      <nav class="navbar navbar-expand-lg container p-0 mt-0">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img
              :src="$asseturl+'assets/image//logo.png'"
              alt=""
              class="puthi-logo"
              srcset=""
              width="180px"
            />
          </a>
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
                <a
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
              <li class="nav-item dropdown dark-bars px-3 py-2" @click="level1Submenu">
                <span
                  class="nav-link text-dark dropdown-toggle text-white"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="fa-solid fa-bars fs-3"></i>
                </span>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">Menu Item 1</a></li>
                  <li><a class="dropdown-item" href="#">Menu Item 2</a></li>
                  <li><a class="dropdown-item" href="#">Menu Item 3</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>



    <section style="background-color: #CED9DF" class="mt-4" v-if="submenu1">
        <nav class="navbar navbar-expand-lg d-flex justify-content-center p-0">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav justify-content-between w-100">
                  <a class="fs-5 nav-link text-dark" href="#">হোম</a>
                  <a class="border-3 border-start border-white fs-5 nav-link ps-3 text-dark" href="#">লেখক</a>
                  <a class="border-3 border-start border-white fs-5 nav-link ps-3 text-dark" href="#">পুথিপ্রকাশের বই</a>
                  <a class="border-3 border-start border-white fs-5 nav-link ps-3 text-dark" @click="level2Submenu" href="#">বিষয়</a>
                  <a class="border-3 border-start border-white fs-5 nav-link ps-3 text-dark" href="#">মাল্টিমিডিয়া</a>
                </div>
              </div>
            </div>
          </nav>
    </section>
<section class="px-2" v-if="submenu1 && submenu2">
<table class="table mb-0">
    <tbody>
        <tr >
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
        </tr>
        <tr >
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
        </tr>
        <tr >
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
        </tr>
        <tr >
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
        </tr>
        <tr >
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
        </tr>
        <tr >
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
            <td class="table-data">ভাষা ও সাহিত্য</td>
        </tr>
    </tbody>
</table>

</section>
    </div>
</template>


<script>
export default {
    data() {
        return {
            submenu1:false,
            submenu2:false,
        }
    },
    methods: {
        level1Submenu(){
            if(this.submenu1==false){
                this.submenu1 = true
            }else{
                this.submenu1 = false
                this.submenu2 = false
            }
        },
        level2Submenu(){
            if(this.submenu2==false){
                this.submenu2 = true
            }else{
                this.submenu2 = false
            }
        }
    },
}
</script>
