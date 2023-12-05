<template>
    <div>
        <!-- <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>-->

        <preloader  v-if="preLooding"/>
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
                <option>কথাসাহিত্যক</option>
                <option>গল্পকার</option>
                <option>প্রাবন্ধিক</option>
                <option>জীবন-আদর্শ</option>
                <option>ধর্ম</option>
                <option>অঙ্কন শিল্পী</option>
                <option>ছড়াকার</option>
                <option>ঔপন্যাসিক</option>
                <option>গবেষক</option>
                <option>কথা শিল্পী</option>
                <option>শিশু সাহিত্যক</option>
                <option>অনুবাদক</option>
                <option>কলামিষ্ট</option>
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
            preLooding:false
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
            this.preLooding = true
           var id =  this.$route.params.id;
            var res = await this.callApi('get', `/api/users/${id}`, []);
            this.form = res.data;
            this.preLooding = false
        },


        async onSubmit() {
            this.preLooding = true
            if(this.$route.params.id){

                var res = await this.callApi('post', `/api/users/update-writer/${this.$route.params.id}`, this.form);
                Notification.customSuccess('User Update Success');
            }else{

                var res = await this.callApi('post', '/api/users/register-writer', this.form);
                Notification.customSuccess('User Created Success');
            }

             this.$router.push({ name: 'writerslist'})

             this.preLooding = false
        },



    },
    mounted(){
        if(this.$route.params.id){

            this.getsonodById();
        }



    }
}
</script>



