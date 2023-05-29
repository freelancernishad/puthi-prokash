<template>
  <div>
    <input type="file" multiple @change="handleFileChange" ref="fileInput" style="display: none" />
    <button @click="openFileInput">Select Files</button>
    <button @click="uploadFiles">Upload</button>

    <transition-group name="fade" tag="ul">
      <li v-for="file in selectedFiles" :key="file.name">
        {{ file.name }}
      </li>
    </transition-group>

    <div v-if="isUploading" class="uploading-animation">
      <!-- Put your uploading animation here -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      selectedFiles: [],
      isUploading: false
    };
  },
  methods: {
    openFileInput() {
      this.$refs.fileInput.click();
    },
    handleFileChange(event) {
      this.selectedFiles = event.target.files;
    },
    uploadFiles() {
      this.isUploading = true;

      for (let i = 0; i < this.selectedFiles.length; i++) {
        const file = this.selectedFiles[i];
        const formData = new FormData();
        formData.append('file', file);
        axios.post('/upload-url', formData)
          .then(response => {
            // Handle the response if needed
          })
          .catch(error => {
            // Handle the error if needed
          });
      }

      // After all uploads are complete
      this.isUploading = false;
      this.selectedFiles = [];
    }
  }
};
</script>

<style>
.uploading-animation {
  width: 50px;
  height: 50px;
  border: 4px solid #ccc;
  border-top-color: #ff5722;
  border-radius: 50%;
  animation: rotating 1s infinite linear;
}

@keyframes rotating {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>
