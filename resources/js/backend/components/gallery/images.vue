<template>
    <div>
        <Breadcrumbs brename="Category Image Upload"/>
     <multiple-file-upload  apimethod='post' :apiurl="'/api/galleries/'+ $route.params.id +'/images'" :images="images" redirectroute="galleryIndex" ></multiple-file-upload>

    </div>
</template>

<script>
export default {
    data() {
        return {
            images:['']
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
            var res = await this.callApi('get',`/api/galleries/${this.$route.params.id}/images`,[])


            // var img = [];
            // res.data.category_images.forEach(image => {
            //     img.push(this.$asseturl+image.image_path)
            // });

            // console.log(img);

            this.images = res.data.img
        },
    },
    mounted() {
        this.getItems();
    },
}
</script>
