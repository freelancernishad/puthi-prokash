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
.singleProductCollectedButton {
    position: absolute;
    right: 0;
    top: 0;
    border: 0;
    background: #E0E65E;
    padding: 5px 17px;
    border-radius: 21px;
    font-size: 21px;
}
.sampleBooks{
    width: 125px;
    height: 160px;
    margin: 0 6px;
}



.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 102%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 99999;
    overflow: scroll;
}

.modal-container {
  max-width: 90%;
  max-height: 90%;
}

.modal-container img {
  max-width: 100%;
  max-height: 100%;
}


</style>
