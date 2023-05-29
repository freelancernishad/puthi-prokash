<template>
    <div>
        <Breadcrumbs brename="Products Image Upload"/>
     <multiple-file-upload  apimethod='post' :apiurl="'/api/products/'+ $route.params.id +'/images'" :images="images" redirectroute="productsIndex" ></multiple-file-upload>

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
            var res = await this.callApi('get',`/api/products/${this.$route.params.id}/images`,[])

            this.images = res.data.img
        },
    },
    mounted() {
        this.getItems();
    },
}
</script>
