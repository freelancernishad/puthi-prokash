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
                <span class="writerFilter">a</span>
                <span class="writerFilter">b</span>
                <span class="writerFilter">c</span>
                <span class="writerFilter">d</span>
                <span class="writerFilter">e</span>
                <span class="writerFilter">f</span>
                <span class="writerFilter">g</span>
                <span class="writerFilter">h</span>
                <span class="writerFilter">i</span>
                <span class="writerFilter">j</span>
                <span class="writerFilter">k</span>
                <span class="writerFilter">l</span>
                <span class="writerFilter">m</span>
                <span class="writerFilter">n</span>
                <span class="writerFilter">o</span>
                <span class="writerFilter">p</span>
                <span class="writerFilter">q</span>
                <span class="writerFilter">r</span>
                <span class="writerFilter">s</span>
                <span class="writerFilter">t</span>
                <span class="writerFilter">u</span>
                <span class="writerFilter">v</span>
                <span class="writerFilter">w</span>
                <span class="writerFilter">x</span>
                <span class="writerFilter">y</span>
                <span class="writerFilter">z</span>
            </div>
        </section>




<section class="row w-100 mx-auto my-4">


    <div class="col-2 text-center" ></div>
    <div class="col-2 text-center" >
        <div style="background-color: #d1d2d4;margin: 11px 0px;">
            <img width="100%" :src="$asseturl+'assets/image/P.png'" alt="" srcset="" class="img-fluid" />
        </div>
    </div>
    <div class="col-2 text-center" >
        <div style="background-color: #d1d2d4;margin: 11px 0px;">
            <img width="100%" :src="$asseturl+'assets/image/t.png'" alt="" srcset="" class="img-fluid" />
        </div>
    </div>
    <div class="col-2 text-center" >
        <div style="background-color: #d1d2d4;margin: 11px 0px;">
            <img width="100%" :src="$asseturl+'assets/image/pr.png'" alt="" srcset="" class="img-fluid" />
        </div>
    </div>
    <div class="col-2 text-center" >
        <div style="background-color: #d1d2d4;margin: 11px 0px;">
            <img width="100%" :src="$asseturl+'assets/image/k.png'" alt="" srcset="" class="img-fluid" />
        </div>
    </div>
    <div class="col-2 text-center" >
        <div style="background-color: #d1d2d4;margin: 11px 0px;">
            <img width="100%" :src="$asseturl+'assets/image/s.png'" alt="" srcset="" class="img-fluid" />
        </div>
    </div>


    </section>

<section class="row w-100 mx-auto my-4">




    <div class="col-md-2 text-center"  v-for="(writer,indexN) in writers" :key="'writer'+indexN">

        <div v-if="writer=='<'"  class="writerArrow" >

            <i @click="prePage" v-if="page>1"  role="button" class="fa-thin fa-angles-left"></i>

        </div>

        <div v-else-if="writer=='>'"  class="writerArrow" >

            <i @click="nextPage" v-if="last_page>page" role="button" class="fa-thin fa-angles-right"></i>

        </div>
        <div v-else-if="writer" style="background-color: #d1d2d4;margin: 11px 0px;">
            <router-link class="text-dark" :to="{name:'Products',query:{author:writer.id}}">
            <img width="100%" :src="$asseturl+'assets/image/man.png'" alt="" srcset="" class="img-fluid" />
            <h5 class="fs-6 mt-2 text-end w-100" style="padding: 3px 6px;">  {{ writer.name }}</h5>
        </router-link>
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
            writers:{},
            page:1,
            last_page:1,
        }
    },
    methods: {

        nextPage(){
            this.page = Number(this.page)+Number(1);
            this.$router.push({name:'writer',query:{page:this.page}})
            this.processItem();

        },

        prePage(){
            this.page =Number(this.page)-Number(1);
            this.$router.push({name:'writer',query:{page:this.page}})
            this.processItem();
        },



       async processItem() {
            if(this.$route.query.page) this.page = this.$route.query.page


            var res = await this.callApi('get',`/api/users/position/writer?page=${this.page}`,[]);
            const data = res.data.data;



            const totalItem = res.data.total;


            const per_page = res.data.per_page;
            const current_page = res.data.current_page-1;




            const CurrentPageItem = totalItem-(per_page*current_page);



            this.last_page = res.data.last_page;





            const result = [];
            // result.push('');
            if(CurrentPageItem<21){
                result.push('<');
                    }

            data.forEach((item, index) => {
                result.push(item);



                if (index==10) {
                    result.push('');
                }


                if(totalItem>21){



                    if (index==16) {
                        if(CurrentPageItem<21){

                            }else{

                                result.push('<');
                            }
                    }



                }






            });



            if(totalItem>21){

                result.push('>');

            }

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
.writerFilter{
    background-color: rgb(209, 210, 212);
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 0 !important;
    cursor: pointer;
}
</style>
