<template>
    <div>

<div class="breadcrumbs-area">
    <h3>Writers List</h3>
    <ul>
        <li>
            <router-link :to="{name:'Dashboard'}">Home</router-link>
        </li>
        <li>Writers List</li>
    </ul>
</div>

    <form class="row" @submit.stop.prevent="onSubmit">


        <div class="form-group col-md-6">
          <label for="">নাম</label>
          <input type="text" v-model="form.name" class="form-control" placeholder="" aria-describedby="helpId">
        </div>




        <div class="form-group col-md-6">
          <label for="">ইমেইল</label>
          <input type="text" v-model="form.email" class="form-control" placeholder="" aria-describedby="helpId">
        </div>


        <div class="form-group col-md-6" v-if="!this.$route.params.id">
          <label for="">পাসওয়ার্ড</label>
          <input type="text" v-model="form.password" class="form-control" placeholder="" aria-describedby="helpId">
        </div>



        <div class="form-group col-md-6">
          <label for="">মোবাইল নাম্বার</label>
          <input type="text" v-model="form.phone" class="form-control" placeholder="" aria-describedby="helpId">
        </div>




        <div class="form-group col-md-6">

            <div class="form-group">
                <label for="">Image</label>
                 <input type="file" id="hand_map" class="form-control" @change="FileSelected($event, 'image')">
                </div>
        </div>


        <div class="col-md-12">
    <button class="btn btn-info" type="submit">Submit</button>
</div>
    </form>


    </div>
</template>

<script>

import Checkbox from "./Checkbox.vue";

export default {

    components: {
    Checkbox,
  },

    data(){
        return {
            selectedOptions: [],
            form:{
                id:null,
                name:'Admin',
                email:null,
                phone:'01909756552',
                password:'123456',
                position:'admin',
                image:'',

            },
            unions:{},
        }
    },
    methods:{



    FileSelected($event, parent_index) {
            let file = $event.target.files[0];
            if (file.size > 5048576) {
                Notification.image_validation();
            } else {
                let reader = new FileReader;
                reader.onload = event => {
                    this.form[parent_index] = event.target.result
                    // console.log(event.target.result);
                };
                reader.readAsDataURL(file)
            }
            //   console.log($event.target.result);
        },



        async getsonodById(){
           var id =  this.$route.params.id;
            var res = await this.callApi('get', `/api/users/${id}`, []);
            this.form = res.data;
        },


        async onSubmit() {

            var res = await this.callApi('post', '/api/users/register-writer', this.form);
             this.$router.push({ name: 'userlist'})
            Notification.customSuccess('User Update Success');

        },



    },
    mounted(){
        if(this.$route.params.id){

            this.getsonodById();
        }



    }
}
</script>



