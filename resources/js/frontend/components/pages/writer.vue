<template>
    <main>

<section class="container px-2" style="padding-top: 50px;">

    <Breadcrumb :pages="[{'route':'home','params':{},'text':'হোম'},{'route':'','params':{},'text':'লেখক'}]"/>




    <div class=" my-4 row w-100"   style="margin: 0;">
    <div class="align-items-center col-md-6 d-flex justify-content-between">
        <img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px">
    <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4">লেখক</p>
    <p  class="border-3 border-bottom border-top d-inline fs-4 mb-0 px-4">{{ int_en_to_bn(totalItems) }}</p>
    </div>

    <div class="col-md-6 d-flex gap-3 py-2 mobilePageHead">
        <select class="form-select" v-model="userType" @change="userTypeChange" style="width: 45%;" aria-label="Default select example">
            <option value=''>ধরণ</option>
            <option>কবি</option>
            <option>কথাসাহিত্যক</option>
            <option>গল্পকার</option>
            <option>প্রাবন্ধিক</option>
            <option>জীবন-আদর্শ</option>
            <option>ধর্ম</option>
            <option>অঙ্কন শিল্পী</option>
            <option>ছড়াকার</option>
            <option>ঔপন্যাসিক</option>
            <option>গবেষক</option>
            <option>কথা শিল্পী</option>
            <option>শিশু সাহিত্যক</option>
            <option>অনুবাদক</option>
            <option>কলামিষ্ট</option>




      </select>





      <button type="button" class="writer-search-button mobileSearchButton" v-if="!mobileSearch" @click="mobileSearch = !mobileSearch" ><i class="fa-regular fa-magnifying-glass"></i></button>

        <form class="d-flex" style="width: 45%;" @submit.stop.prevent="searchItem" v-if="mobileSearch">
          <input type="text" placeholder="আপনার পছন্দের লেখক খুঁজুন" v-model="form.search" class="form-control writer-search-input">
          <button type="submit" class="writer-search-button" ><i class="fa-regular fa-magnifying-glass"></i></button>
        </form>



        <router-link class="fs-5 nav-link text-dark position-relative" aria-current="page" :to="{name:'cart'}" style="    margin-left: 25px;">
                  <img width="35px" :src="$asseturl+'assets/image/cart-icon.png'"/><span class="CartQuantity2">{{ getCartQuantity  }}</span>
                </router-link>


    </div>
    </div>
    </section>




    <section class="row w-100 mx-auto my-4">


<div class="col-md-2 col-1 text-center"></div>
<div class="col-md-10 col-10 text-center" >
            <div class="d-flex flex-wrap me-2 text-capitalize justify-content-between gap-2">

                <span v-for="letter in letters" :key="'letter-'+letter" class="writerFilter" :class="{ active: letter === $route.query.name }" @click="clickname(letter)">{{ letter }}</span>


            </div>
            </div>

            <div class="col-md-0 col-1 text-center"></div>


        </section>




<section class="row w-100 mx-auto my-4">


    <div class="col-md-2 col-1 text-center"></div>


    <div class="col-2 text-center" >
        <div style="background-color: #d1d2d4;margin: 11px 0px;">
            <img width="100%" :src="$asseturl+'assets/image/P-1.png'" alt="" srcset="" class="img-fluid" />
        </div>
    </div>
    <div class="col-2 text-center" >
        <div style="background-color: #d1d2d4;margin: 11px 0px;">
            <img width="100%" :src="$asseturl+'assets/image/P-2.png'" alt="" srcset="" class="img-fluid" />
        </div>
    </div>
    <div class="col-2 text-center" >
        <div style="background-color: #d1d2d4;margin: 11px 0px;">
            <img width="100%" :src="$asseturl+'assets/image/P-3.png'" alt="" srcset="" class="img-fluid" />
        </div>
    </div>
    <div class="col-2 text-center" >
        <div style="background-color: #d1d2d4;margin: 11px 0px;">
            <img width="100%" :src="$asseturl+'assets/image/P-4.png'" alt="" srcset="" class="img-fluid" />
        </div>
    </div>
    <div class="col-2 text-center" >
        <div style="background-color: #d1d2d4;margin: 11px 0px;">
            <img width="100%" :src="$asseturl+'assets/image/P-5.png'" alt="" srcset="" class="img-fluid" />
        </div>
    </div>

    <div class="col-md-0 col-1 text-center"></div>


    </section>

<section class="row w-100 mx-auto my-4">




    <div class="col-6 col-md-2 text-center"  v-for="(writer,indexN) in writers" :key="'writer'+indexN">

        <div v-if="writer=='<'"  class="writerArrow" >

            <i @click="prePage" v-if="page>1"  role="button" class="fa-thin fa-angles-left"></i>

        </div>

        <div v-else-if="writer=='>'"  class="writerArrow" >

            <i @click="nextPage" v-if="last_page>page" role="button" class="fa-thin fa-angles-right"></i>

        </div>
        <div v-else-if="writer" style="background-color: #d1d2d4;margin: 11px 0px;">
            <router-link class="text-dark" :to="{name:'Products',query:{author:writer.id}}">
            <img width="100%" :src="$asseturl+writer.image+'?v=1.0'" alt="" srcset="" class="img-fluid" />
            <h5 class="fs-6 mt-2 text-end w-100" style="    padding: 6px 6px;border-top: 3px solid white;margin: 0 !important;">  {{ writer.nameBN }}</h5>
        </router-link>
        </div>
    </div>


</section>


    </main>

</template>

<script>
export default {
    data() {
        return {
            letters: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'],
            writers:{},
            page:1,
            last_page:1,
            totalItems:0,
            form:{
                search:''
            },
            userType:'',
            name:'',
            mobileSearch:false,
        }
    },
    methods: {

        searchItem(){
            this.processItem();

        },


        userTypeChange(){

            this.processItem();
        },

        clickname(name){
            this.name = name

            this.processItem();
        },


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
        var page = 1;

        var apiQuery = '';
            if(this.$route.query.page){
                this.page = this.$route.query.page
                apiQuery += `page=${this.$route.query.page}`

            }




            const query = { page: page };

            if (this.name) {
                query.name = this.name;
                apiQuery += `&name=${this.name}`
            }

            if (this.userType) {
                query.userType = this.userType;
                apiQuery += `&userType=${this.userType}`
            }
            if (this.form.search) {
                query.search = this.form.search;
                apiQuery += `&search=${this.form.search}`
            }

            this.$router.push({ name: 'writer', query: query });








            var res = await this.callApi('get',`/api/users/position/writer?${apiQuery}`,[]);
            const data = res.data.data;

            this.totalItems =   res.data.total


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


            const windowWidth = window.innerWidth;
            if (windowWidth > 767) {
                this.mobileSearch = true
            }else{
                this.mobileSearch = false
            }



            }

},
mounted() {

    if(this.$route.query.search){
        this.form.search = this.$route.query.search;
    }
    this.name = this.$route.query.name;
    this.userType = this.$route.query.userType;

    this.processItem();

},

}
</script>
<style scoped>
span.writerFilter.active {
    background: var(--defaultColor);
    color: white;
}
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

@media (max-width:768px) {
    .mobilePageHead{
        justify-content: space-around;
    }
}

</style>
