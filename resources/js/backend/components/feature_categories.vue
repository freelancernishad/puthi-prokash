<template>
    <div>
        <!-- <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>-->

        <preloader  v-if="preLooding"/>


        <Breadcrumbs brename="বই সর্বোত্তম উপহার"/>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-info" @click="addCategory">Add Or Edit</button>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Category Name</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr v-for="(item,index) in items" :key="index">
                                <th>{{ index+1 }}</th>
                                <th>{{ item.category.name }}</th>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <addEditForm v-if="isPopupOpen" @close_popup="closePopup" @call_data="getCat" :items="items"  />

    </div>
  </template>

  <script>
  import addEditForm from "./addEditForm.vue";
  export default {
    components: {
        addEditForm,
    },
    data() {
      return {
        items:{},
        isPopupOpen: false,
        preLooding:false
      };
    },
    methods: {
        async getCat(){
            this.preLooding = true
            var res = await this.callApi('get',`/api/feature-categories`,[]);
            this.items = res.data;
            this.preLooding = false

        },

        addCategory(){
            this.isPopupOpen = true;
        },

        closePopup(){
            this.isPopupOpen = false;
        },


    },
    mounted() {

        this.getCat();
    },
  };
  </script>

  <style>
  /* Add custom CSS here if needed */
  </style>
