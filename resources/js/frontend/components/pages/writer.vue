<template>
    <main>

<section class="mx-2 px-2" style="padding-top: 50px;">

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb ms-5 mt-3">

          <li class="breadcrumb-item active" aria-current="page">হোম</li>
          <li class="breadcrumb-item active text-dark" aria-current="page">লেখক</li>
        </ol>
      </nav>
    <div class=" my-4 row w-100">
    <div class="align-items-center col-md-6 d-flex justify-content-between">
        <img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px">
    <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4">লেখক</p>
    <p  class="border-3 border-bottom border-top d-inline fs-4 mb-0 px-4">৬০</p>
    </div>

    <div class="col-md-6 d-flex gap-5 py-2">
        <select class="form-select" aria-label="Default select example">
        <option selected>বাছাইয়ের ধরণ</option>

        <option value="1">  কবি</option>
        <option value="2">সাহিত্যিক</option>
        <option value="3">গল্পকার</option>
        <option value="3">প্রাবন্ধিক</option>
        <option value="3">জীবন-আদশ</option>
        <option value="3">ধম</option>
      </select>
    <select class="form-select" aria-label="Default select example">
        <option selected>ফিল্টার </option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select></div>
    </div>
    </section>



    <section>
            <div class="d-flex flex-wrap me-2 text-capitalize justify-content-end gap-2">
                <span style="background-color:#D1D2D4 ;" class="p-2">a</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">b</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">c</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">d</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">e</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">f</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">g</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">h</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">i</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">j</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">k</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">l</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">m</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">n</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">o</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">p</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">q</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">r</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">s</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">t</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">u</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">v</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">w</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">x</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">y</span>
                <span style="background-color:#D1D2D4 ;" class="p-2">z</span>
            </div>
        </section>




<section class="row w-100 mx-auto my-4">


    <div class="col-md-2 text-center"  v-for="writer in writers">



        <div v-if="writer=='<'" class="writerArrow" >
            <i class="fa-thin fa-angles-left"></i>
        </div>

        <div v-else-if="writer=='>'" class="writerArrow" >
            <i class="fa-thin fa-angles-right"></i>
        </div>
        <div v-else-if="writer" style="background-color: #d1d2d4;padding: 9px;margin: 11px 0px;">
            <img width="100%" :src="$asseturl+'assets/image/man.png'" alt="" srcset="" class="img-fluid mt-1" />
            <h5 class="fs-6 mt-2 text-end w-100">লেখকের নাম</h5>
        </div>
    </div>


</section>

<!-- <nav aria-label="...">
  <ul class="pagination  justify-content-center">
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item">
      <span class="page-link">
        2
        <span class="sr-only">(current)</span>
      </span>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav> -->

    </main>

</template>

<script>
export default {
    data() {
        return {
            writers:{}
        }
    },
    methods: {

        processItem() {
            const data = [1, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26];
            const result = [];
            result.push('');
            data.forEach((item, index) => {
            result.push(item);


            // if ((index + 1) % 2 === 0 && index < data.length - 1) {
            //     result.push('');
            // }


                if (index==15) {
                    result.push('');
                }
                if (index==21) {
                    result.push('<');
                }



            });
            result.push('>');
            this.writers = result;
            }

},
mounted() {
    this.processItem();

},

}
</script>
<style scoped>
.writerArrow{
    padding: 9px;
    margin: 11px 0px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 100%;
    font-size: 3em;
    color: var(--red);
}
</style>
