<template>
    <div>
        <!-- <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>-->

        <preloader  v-if="preLooding"/>
        <Breadcrumbs brename="Downloads Form"/>

      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label for="title">Title:</label>
          <input v-model="form.title" type="text" id="title" class="form-control" placeholder="Enter title" required>
        </div>

        <div class="form-group">
          <label for="title">Published Date:</label>
          <input v-model="form.publishedDate" type="date" id="publishedDate" class="form-control" placeholder="Enter Published Date" required>
        </div>

        <div class="form-group">
            <label for="video_file">Upload file:</label>
            <input type="file" @change="FileSelected($event,'file')" id="video_file" class="form-control" />
        </div>


        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </template>

  <script>

  export default {
    data() {
      return {
        form: {
          title: '',
          publishedDate: '',
          file: '',
        },
        preLooding:false,
      };
    },
    methods: {
      async submitForm() {
        this.preLooding = true

        var updateInsertApi = '';
        var Method = '';

        if(this.$route.params.id){
            updateInsertApi = `/api/downloads/${this.$route.params.id}`;
            Method = 'post';
        }else{
            updateInsertApi = `/api/downloads`;
            Method = 'post';
        }
            const formData = new FormData();
            formData.append('title', this.form.title);
            formData.append('published_date', this.form.publishedDate);
            formData.append('file', this.form.file);
            var res = await this.callApi(`${Method}`,`${updateInsertApi}`,formData,{'Content-Type': 'multipart/form-data' });


        if(res.status==200){
            Notification.customSuccess(`Downloads Updated Successfull`);
            this.$router.push({name:'downloadIndex'});
        }else if(res.status==201){
            Notification.customSuccess(`Downloads Created Successfull`);
            this.$router.push({name:'downloadIndex'});
        }else{
            Notification.customError(`Something want wrong!`);
            this.errors = res.data.errors
        }
        this.preLooding = false
      },

      FileSelected($event, parent_index) {
        this.form[parent_index] = $event.target.files[0];
        },

        async getItems(){
            this.preLooding = true
            var res = await this.callApi('get',`/api/downloads/${this.$route.params.id}`,[])
            this.form = res.data
            this.preLooding = false
        },


    },
    mounted() {
        if(this.$route.params.id){
            this.getItems();
        }

    },
  };
  </script>

  <style>
  /* Add any custom styles for the form here */
  </style>
