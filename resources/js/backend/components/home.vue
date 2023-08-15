<template>
    <div>
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
        <Breadcrumbs brename="ড্যাশবোর্ড"/>


        </div>
    </div>
</template>
<script>

export default {
    computed: {

    },
    async created() {

    },
    data() {
        return {
            preLooding:false

        };
    },
    mounted() {

        this.preLooding = false


    },
    methods: {





    },
};
</script>

