<template>
    <div>
        <Breadcrumbs brename="Flipping Book QrCode" :secname="list.name"/>

        <div class="container">

            <div class="card">
                <div class="card-body text-center">
                    <img :src="imageUrl" alt="">
                    <br/>

                    <button class="btn btn-info py-3 px-5" style="font-size: 16px;" @click="downloadImage" >Download</button>
                    <a class="btn btn-danger py-3 px-5" style="font-size: 16px;" target="_blank" :href="`/books/${list.slug}/${list.id}`">Fliping Books Preview</a>
                </div>
            </div>


        </div>

    </div>
</template>

<script>


export default {



    data() {
        return {
            list:{},
            imageUrl: '',
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {

            },
            deep: true
        }
    },

    methods: {
        async downloadImage() {
            const blob = await (await fetch(this.imageUrl)).blob();
            const url = URL.createObjectURL(blob);
            Object.assign(document.createElement('a'), { href: url, download: `${this.list.slug}.jpg` })
                .click();
            URL.revokeObjectURL(url);
        },

        async getItems(){
            var res = await this.callApi('get',`/api/products/${this.$route.params.id}`,[])
            this.list = res.data
            var orginUrl = window.location.origin;
            this.imageUrl = `https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=${orginUrl}/books/${this.list.slug}/${this.list.id}&choe=UTF-8`;

        },
    },
    mounted(){

        this.getItems();



    }
}
</script>

<style>

</style>












