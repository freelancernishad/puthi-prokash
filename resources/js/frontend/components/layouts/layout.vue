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
    props: ['user','categories','sliders','settings','web_details'],
    async created() {
        localStorage.setItem('position',this.user.position)

        this.$store.commit('setUpdateUser', this.user)

        var pre_load_data = {
            categories:this.categories,
            sliders:this.sliders,
            settings:this.settings,
            read_post:this.web_details,
        };

        this.$store.commit('set_pre_load_data', pre_load_data)


    },

    data() {
        return {

        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                this.fetchCartQuantity();

            },
            deep: true
        }
    },
    methods: {








    },
    mounted() {

        this.fetchCartQuantity();
    }
}
</script>
<style>

button.writer-search-button {
    border: 0px;
    background: var(--red);
    color: white;
    padding: 4px 9px;
    font-size: 18px;
}
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
    right: 24px;
    top: 30px;
    border: 0;
    background: #e0e65ead;
    padding: 5px 17px;
    border-radius: 21px;
    font-size: 21px;
}
.singleProductCollectedButton2 {
    border: 0;
    background: #e0e65ead;
    padding: 5px 17px;
    border-radius: 21px;
    font-size: 21px;
}

.singleProductcloseButton {
    position: absolute;
    right: 0;
    top: 0;
    background: transparent;
    border: 0;
    padding: 0px 9px;
    font-size: 20px;
}

.sampleBooks{
    width: 90px;
    height: 120px;
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
  text-align: center;
}


.modal-container img {
  max-width: 30%;
  max-height: 100%;
}



.ProductListBorderBottom{
    border-bottom: 3px solid var(--red)
}







@media (max-width:768px) {

.ProductListBorderBottom{
    border-bottom: 0px solid var(--red)
}
    .modal-container img {
  max-width: 70%;
  max-height: 100%;
}
}








.pe-lg-10 {
    padding-right: 3rem!important;
}
.pt-10 {
    padding-top: 3rem!important;
}
.p-lg-10 {
    padding: 3rem!important;
}

.p-md-6 {
    padding: 1.5rem!important;
}
.py-6 {
    padding-bottom: 1.5rem!important;
    padding-top: 1.5rem!important;
}
.text-inherit {
    color: #21313c;
}
.nav-pills-dark .nav-item .nav-link {
    background-color: transparent;
    border-radius: .5rem;
    color: #21313c;
    font-weight: 500;
    margin-bottom: .25rem;
    padding: .5rem .75rem;
}

.bg-light {
    --fc-bg-opacity: 1;
    background-color: #f0f3f2!important;
}

input.form-control {
    border: 1px solid var(--defaultColor) !important;
}
.input-group-text {
    border: 1px solid var(--defaultColor);
    color: var(--defaultColor);
}

input.form-control.writer-search-input {
    border-top-right-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
}




span.CartQuantity {
    position: absolute;
    top: 3px;
    right: 0;
    background: var(--defaultColor);
    color: white;
    padding: 0px 4px 1px 4px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
    border-radius: 5px;
}
span.CartQuantity2 {
    position: absolute;
    top: -6px;
    right: -6px;
    background: var(--defaultColor);
    color: white;
    padding: 0px 4px 1px 4px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
    border-radius: 5px;
}



span.imageshowCloseButton {
    position: absolute;
    top: 18px;
    left: 49%;
    color: white;
    background: var(--defaultColor);
    padding: 1px 7px;
    border-radius: 50%;
    cursor: pointer;
}
span.CartCloseButton {
    background: #d5d5d5;
    color: black;
    font-size: 20px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}


.ImageModalButton{
    border: 0;
    background: var(--defaultColor);
    color: white;
    font-size: 30px;
    padding: 3px 6px;
}
</style>
