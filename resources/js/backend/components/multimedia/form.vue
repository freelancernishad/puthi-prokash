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
            <input type="file" @change="FileSelected($event,'video_file')" id="video_file" class="form-control" accept="video/*" required />
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
          video_file: '',
          media_url: '',
        },
      };
    },
    methods: {
      async submitForm() {

        const formData = new FormData();
        formData.append('title', this.form.title);
        formData.append('media_type', this.form.media_type);
        formData.append('video_file', this.form.video_file);
        formData.append('media_url', this.form.media_url);


        var res = await this.callApi('post',`/api/multimedia`,formData,{'Content-Type': 'multipart/form-data' });
        console.log(res)
      },

      FileSelected($event, parent_index) {
        this.form[parent_index] = $event.target.files[0];
        },



    },
  };
  </script>

  <style>
  /* Add any custom styles for the form here */
  </style>
