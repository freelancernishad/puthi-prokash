<template>
    <div>
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
        <Breadcrumbs brename="Multimedia Form"/>

      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label for="title">Title:</label>
          <input v-model="form.title" type="text" id="title" class="form-control" placeholder="Enter title" required>
        </div>

        <div class="form-group">
          <label for="media_type">Media Type:</label>
          <select v-model="form.media_type" id="media_type" class="form-control" required>
            <option value="video">Video</option>
            <option value="youtube">YouTube</option>
          </select>
        </div>

        <div class="form-group" v-if="form.media_type === 'video'">
            <label for="video_file">Upload Video:</label>
            <input type="file" @change="FileSelected($event,'media_url')" id="video_file" class="form-control" accept="video/*" />
        </div>

        <div class="form-group" v-else-if="form.media_type === 'youtube'">
          <label for="media_url">YouTube Embed Link:</label>
          <input v-model="form.media_url" type="text" id="media_url" class="form-control" placeholder="Enter YouTube embed link" required>
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
          media_type: 'video',
          media_url: '',
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
            updateInsertApi = `/api/multimedia/${this.$route.params.id}`;
            Method = 'post';
        }else{
            updateInsertApi = `/api/multimedias`;
            Method = 'post';
        }

        if(this.form.media_type=='video'){
            const formData = new FormData();
            formData.append('title', this.form.title);
            formData.append('media_type', this.form.media_type);
            formData.append('media_url', this.form.media_url);

            var res = await this.callApi(`${Method}`,`${updateInsertApi}`,formData,{'Content-Type': 'multipart/form-data' });
        }else{
            var res = await this.callApi(`${Method}`,`${updateInsertApi}`,this.form);

        }


        if(res.status==200){
            Notification.customSuccess(`Multimedia Updated Successfull`);
            this.$router.push({name:'multimediaIndex'});
        }else if(res.status==201){
            Notification.customSuccess(`Multimedia Created Successfull`);
            this.$router.push({name:'multimediaIndex'});
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
            var res = await this.callApi('get',`/api/multimedia/${this.$route.params.id}`,[])
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
