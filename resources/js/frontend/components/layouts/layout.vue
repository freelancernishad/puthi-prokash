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
<style>

.linkHover{
    cursor: pointer;
    transition: all 0.5s;
}
.linkHover:hover{
    color: #F05C41 !important;
}
input:focus{
    outline: none;
}
.cursor-pointer{
    cursor: pointer;
}

</style>
