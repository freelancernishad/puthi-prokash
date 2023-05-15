<template>
    <div>

                <slot></slot>

    </div>
</template>
<script>
export default {
    props: ['user'],
    async created() {
        localStorage.setItem('position',this.user.position)
        this.$store.commit('setUpdateUser', this.user)
    },
    data() {
        return {

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



    },
    mounted() {


    }
}
</script>
