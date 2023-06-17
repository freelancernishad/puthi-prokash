<template>
    <div>
        <Headercomponent/>
            <slot></slot>
        <Footercomponent/>
    </div>
</template>
<script>

import Headercomponent from './header.vue'
import Footercomponent from './footer.vue'


export default {
    components:{Headercomponent,Footercomponent},
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
