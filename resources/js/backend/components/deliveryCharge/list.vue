<template>
    <div>
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>


        <Breadcrumbs brename="Delivery Charge"/>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-info" @click="addCharge">Add New</button>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Delivered to</th>
                                <th>Weight From (গ্রাম)</th>
                                <th>Weight To (গ্রাম)</th>
                                <th>Charge</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr v-for="(item,index) in items" :key="index">
                                <th>{{ index+1 }}</th>
                                <th>{{ item.distict }}</th>
                                <th>{{ item.weight_from }}</th>
                                <th>{{ item.weight_to }}</th>
                                <th>{{ item.charge }}</th>
                                <th>
                                    <button class="btn btn-info" @click="addCharge(item)">Edit</button>
                                    <button class="btn btn-danger" @click="DeleteAction('Are you sure?','Delete this delivery charges',`/api/delivery-charges/${item.id}`,'Category delivery charges',getCat)">Delete</button>

                                </th>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <addEditForm v-if="isPopupOpen" @close_popup="closePopup" @call_data="getCat" :items="item"  />

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
        item:{},
        isPopupOpen: false,
        preLooding:false
      };
    },
    methods: {
        async getCat(){
            this.preLooding = true
            var res = await this.callApi('get',`/api/delivery-charges`,[]);
            this.items = res.data;
            this.preLooding = false

        },

        addCharge(item={}){
            this.item = item
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
