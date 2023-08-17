<template>
    <div>
        <slot></slot>
    </div>
</template>
<script>
export default {
    props: ['user','categories','sliders','settings'],
    async created() {
        localStorage.setItem('position',this.user.position)

        this.$store.commit('setUpdateUser', this.user)

        var pre_load_data = {
            categories:this.categories,
            sliders:this.sliders,
            settings:this.settings,
        };

        this.$store.commit('set_pre_load_data', pre_load_data)


    },

    data() {
        return {

        }
    },
    methods: {

    },
    mounted() {

    }
}
</script>
