<template>
    <div>
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
      };
    },
    methods: {
      async submitForm() {
        const formData = new FormData();
        formData.append('title', this.form.title);
        formData.append('media_type', this.form.media_type);
        formData.append('media_url', this.form.media_url);

        var updateInsertApi = '';
        var Method = '';

        if(this.$route.params.id){
            updateInsertApi = `/api/multimedia/${this.$route.params.id}`;
            Method = 'post';
        }else{
            updateInsertApi = `/api/multimedias`;
            Method = 'post';
        }
        var res = await this.callApi(`${Method}`,`${updateInsertApi}`,formData,{'Content-Type': 'multipart/form-data' });

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
      },

      FileSelected($event, parent_index) {
        this.form[parent_index] = $event.target.files[0];
        },

        async getItems(){
            var res = await this.callApi('get',`/api/multimedia/${this.$route.params.id}`,[])
            this.form = res.data
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
