<template>
    <div class="container mt-3 pt-5">


        <div v-html="page.content"></div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            page:{}

        }
    },
    methods: {

        async getpageData(){
            var res = await this.callApi('get',`/api/pages/slug/${this.$route.params.slug}`,[]);
            this.page = res.data;
        }

    },
    mounted() {

        this.getpageData();
    },
}
</script>
