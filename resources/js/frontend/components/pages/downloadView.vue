<template>
    <main>

<section class="container px-2" >

    <Breadcrumb :pages="[{'route':'home','params':{},'text':'হোম'},{'route':'','params':{},'text':'Download'}]"/>




    <div class=" my-4 row w-100"  style="margin: 0;">
    <div class="align-items-center col-md-6 d-flex justify-content-between">
        <img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px">
    <p class="d-inline fs-2 fw-normal mb-0 me-auto ps-4">{{ items.title }}</p>
    <!-- <p  class="border-3 border-bottom border-top d-inline fs-4 mb-0 px-4">0</p> -->
    </div>

        <!-- <div class="col-md-6 d-flex gap-5 py-2">

            <form class="d-flex" style="width: 90%;" @submit.stop.prevent="searchItem">
            <input type="text" placeholder="আপনার কাঙ্খিত বই খুঁজুন" v-model="form.search" class="form-control writer-search-input">
            <button type="submit" class="writer-search-button" ><i class="fa-regular fa-magnifying-glass"></i></button>
            </form>



            <router-link class="fs-5 nav-link text-dark position-relative" aria-current="page" :to="{name:'cart'}">
                    <img width="35px" :src="$asseturl+'assets/image/cart-icon.png'"/><span class="CartQuantity2">{{ getCartQuantity  }}</span>
                    </router-link>
        </div> -->

    </div>
    </section>









    <section class="container">


        <div class="row">


            <div class="col-md-12">
                <iframe style="    width: 100%;height: 100vh;" :src="$asseturl+items.file" frameborder="0"></iframe>
            </div>


        </div>




    </section>





    </main>

</template>

<script>
export default {
    data() {
        return {
            items:{},
        }
    },
    methods: {
        async getItems(){
            var queryId = this.$route.params.id
            var res = await this.callApi('get',`/api/downloads/${queryId}`,[]);
            this.items = res.data
         console.log(res)
        }
    },
    mounted() {
        this.getItems();
    },
}
</script>
<style scoped>


</style>
