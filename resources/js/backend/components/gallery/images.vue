<template>
    <div>
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>


        <Breadcrumbs brename="Category Image Upload"/>
     <multiple-file-upload  apimethod='post' :apiurl="'/api/galleries/'+ $route.params.id +'/images'" :images="images" redirectroute="galleryIndex" ></multiple-file-upload>

    </div>
</template>

<script>
export default {
    data() {
        return {
            images:[''],
            preLooding:false,
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
               this.getItems();
            },
            deep: true
        }
    },
    methods: {
        async getItems(){
            this.preLooding = true
            var res = await this.callApi('get',`/api/galleries/${this.$route.params.id}/images`,[])


            // var img = [];
            // res.data.category_images.forEach(image => {
            //     img.push(this.$asseturl+image.image_path)
            // });

            // console.log(img);

            this.images = res.data.img
            this.preLooding = false
        },
    },
    mounted() {
        this.getItems();
    },
}
</script>
