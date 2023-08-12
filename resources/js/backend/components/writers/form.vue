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
          <label for="">নাম (বাংলা)</label>
          <input type="text" v-model="form.nameBN" class="form-control" placeholder="" aria-describedby="helpId">
        </div>


        <div class="form-group col-md-6">
          <label for="">নাম (ইংলিশ্‌)</label>
          <input type="text" v-model="form.name" class="form-control" placeholder="" aria-describedby="helpId">
        </div>



        <div class="form-group col-md-6">
            <label for="">ধরণ</label>
            <select class="form-control"  v-model="form.type" required>
                <option selected>ধরণ</option>
                <option>কবি</option>
                <option>সাহিত্যিক</option>
                <option>গল্পকার</option>
                <option>প্রাবন্ধিক</option>
                <option>জীবন-আদশ</option>
                <option>ধম</option>
            </select>
        </div>




        <!-- <div class="form-group col-md-6">
          <label for="">ইমেইল</label>
          <input type="text" v-model="form.email" class="form-control" placeholder="" aria-describedby="helpId">
        </div>


        <div class="form-group col-md-6" v-if="!this.$route.params.id">
          <label for="">পাসওয়ার্ড</label>
          <input type="text" v-model="form.password" class="form-control" placeholder="" aria-describedby="helpId">
        </div> -->



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
                name:'',
                nameBN:'',
                type:'',
                email:null,
                phone:'',
                password:'',
                position:'',
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

            if(this.$route.params.id){

                var res = await this.callApi('post', `/api/users/update-writer/${this.$route.params.id}`, this.form);
                Notification.customSuccess('User Update Success');
            }else{

                var res = await this.callApi('post', '/api/users/register-writer', this.form);
                Notification.customSuccess('User Created Success');
            }

             this.$router.push({ name: 'writerslist'})


        },



    },
    mounted(){
        if(this.$route.params.id){

            this.getsonodById();
        }



    }
}
</script>



