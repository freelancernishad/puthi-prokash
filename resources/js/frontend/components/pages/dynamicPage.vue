<template>
    <div class="container mt-3 pt-5">
        <Breadcrumb :pages="[{'route':'home','params':{},'text':'হোম'},{'route':'','params':{},'text': page.page_name}]"/>

        <div class="container-fluid" v-html="page.content"></div>
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
