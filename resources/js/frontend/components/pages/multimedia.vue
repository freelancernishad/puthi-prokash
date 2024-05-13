<template>
    <main>
<section class="container px-2" style="padding-top: 50px;">
    <Breadcrumb :pages="[{'route':'home','params':{},'text':'হোম'},{'route':'','params':{},'text':'মাল্টিমিডিয়া'}]"/>
    <div class=" my-4 row w-100"  style="margin: 0;">
    <div class="align-items-center col-md-6 d-flex justify-content-between">
        <img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px">
    <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4">মাল্টিমিডিয়া</p>
    <!-- <p  class="border-3 border-bottom border-top d-inline fs-4 mb-0 px-4">0</p> -->
    </div>

    <div class="col-md-6 d-flex gap-5 py-2" style="flex-direction: row-reverse;">
<!--
        <form class="d-flex" style="width: 90%;" @submit.stop.prevent="searchItem">
          <input type="text" placeholder="আপনার কাঙ্খিত বই খুঁজুন" v-model="form.search" class="form-control writer-search-input">
          <button type="submit" class="writer-search-button" ><i class="fa-regular fa-magnifying-glass"></i></button>
        </form> -->



        <router-link class="fs-5 nav-link text-dark position-relative" aria-current="page" :to="{name:'cart'}">
                  <img width="35px" :src="$asseturl+'assets/image/cart-icon.png'"/><span class="CartQuantity2">{{ getCartQuantity  }}</span>
                </router-link>


    </div>
    </div>
    </section>

    <div class="multimidiaContainer position-relative">
        <div class="multimidiaHero text-center" :style="'background: linear-gradient(rgb(0 0 0) 0%, rgb(0 0 0 / 33%) 59%, rgb(0 0 0 / 61%) 100%), url('+$asseturl+'assets/image/multimedia_page_banner.jpg) no-repeat;background-size: cover;background-attachment: fixed;padding: 91px 0px;'">
            <h3 class="heroTitle text-white">Multimedia</h3>
            <p class="hereDescription text-white">"In multimedia, images, words, and film all come together. It makes us think about how we can make our lives more beautiful by watching and experiencing it." - George Lucas</p>
        </div>

        <div class="container boxContainer">
            <div class="row">


                <div class="col-md-4 text-center mb-5">
                    <router-link :to="{name:'gallery'}" class="card cardContainer">
                        <div class="icon">
                            <i class="fas fa-images fa-fw"></i>
                        </div>
                        <div class="cardHeader">
                            IMAGE
                        </div>
                    </router-link>
                </div>


                <div class="col-md-4 text-center mb-5">
                    <router-link :to="{name:'video'}" class="card cardContainer">
                        <div class="icon">
                            <i class="fas fa-video"></i>
                        </div>
                        <div class="cardHeader">
                            VIDEO
                        </div>
                    </router-link>
                </div>


                <div class="col-md-4 text-center mb-5">
                    <router-link :to="{name:'download'}" class="card cardContainer">
                        <div class="icon">
                            <i class="fas fa-download"></i>
                        </div>
                        <div class="cardHeader">
                            DOWNLOAD
                        </div>
                    </router-link>
                </div>



            </div>
        </div>


    </div>








    </main>

</template>

<script>
export default {
    created(){

    },
    data() {
            return {
            }
    },
    methods: {

    },
    mounted() {

    },
}
</script>
<style scoped>
p.hereDescription {
    width: 50%;
    margin: 0 auto;
}


.cardContainer {
    font-size: 17px;
    line-height: 40px;
    padding: 15px 15px;
    box-shadow: 0px 0px 29px 0px #00000069;
    width: 75%;
    margin: 0 auto;
    background: var(--defaultColor);
}

.cardContainer .icon {
    font-size: 50px;
    margin-bottom: 21px;
    color: white;
}

.cardContainer .cardHeader {
    color: white;
}

.boxContainer {
    position: relative;
    top: -35px;
}
</style>
