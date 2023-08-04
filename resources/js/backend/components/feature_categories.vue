<template>
    <div>
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
      };
    },
    methods: {
        async getCat(){
            var res = await this.callApi('get',`/api/feature-categories`,[]);
            this.items = res.data;

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
