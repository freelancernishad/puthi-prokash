<template>
    <main  style="padding-top: 75px;">
        <div class="Authors">
    <div class="container">
        <div class="contents">
            <div class="row">






                <div class="col-lg-2 col-sm-4 col-6" v-for="(category,index) in categories" :key="'category'+index">
                    <div class="category-item">
                        <router-link :to="{name:'Products',query:{category:category.id}}" :style="`background-image: url(${$asseturl+category.icon});`"><h4 class="ct-name">{{ category.name }}</h4></router-link>
                    </div>
                </div>


            </div>

<!--
            <nav class="d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item disabled"><a href="javascript:;" class="page-link">« </a></li>
                    <li class="page-item active"><a href="javascript:;" class="page-link">1</a></li>
                    <li class="page-item"><a href="javascript:;" class="page-link">2</a></li>
                    <li class="page-item"><a href="javascript:;" class="page-link"> »</a></li>
                </ul>
            </nav> -->



        </div>
    </div>
</div>


    </main>

</template>



<script>
export default {
    data() {
        return {
            categories:{},
        }
    },
    methods: {
        async categoriesFun(){
        var res = await this.callApi('get',`/api/all/categories?type=withoutpaginate`,[]);
        this.categories = res.data;

        },
    },
    mounted() {
        this.categoriesFun();
    },
}
</script>
<style scoped>
 .category-item {
    width: 100%;
    float: left;
    display: block;
    margin: 0 0 25px;
    padding: 0;
    position: relative;
    overflow: hidden;
    height: 160px;
}
.category-item a {
    background-position: center center;
    background-repeat: no-repeat;
    width: 100%;
    height: 160px;
    display: block;
    position: relative;
    padding: 0;
    float: left;
    background-image: url('https://kathaprokash.com/assets/img/placeholder/category.png');
}

.category-item a:before {
    background: rgba(237, 28, 36, 0.8);
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    content: "";
}

.category-item a:before {
    background: rgba(8 8 8/41%) !important;
}
.ct-name {
    position: absolute;
    top: 50%;
    height: auto;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    width: 100%;
    margin: 0;
    padding: 0 10px;
    text-align: center;
    color: #fff;
    font-size: 18px;
    line-height: 26px;
}
</style>
