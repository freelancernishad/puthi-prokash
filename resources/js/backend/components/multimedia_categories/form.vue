<template>
    <div>
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
        <Breadcrumbs brename="Multimedia Category Form"/>

      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label for="title">Name:</label>
          <input v-model="form.name" type="text" id="name" class="form-control" placeholder="Enter name" required>
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
          name: '',
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
            updateInsertApi = `/api/multimedia_categories/${this.$route.params.id}`;
            Method = 'put';
        }else{
            updateInsertApi = `/api/multimedia_categories`;
            Method = 'post';
        }


            var res = await this.callApi(`${Method}`,`${updateInsertApi}`,this.form);




        if(res.status==200){
            Notification.customSuccess(`Multimedia Category Updated Successfull`);
            this.$router.push({name:'multimedia_categoriesIndex'});
        }else if(res.status==201){
            Notification.customSuccess(`Multimedia Category Created Successfull`);
            this.$router.push({name:'multimedia_categoriesIndex'});
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
            var res = await this.callApi('get',`/api/multimedia_categories/${this.$route.params.id}`,[])
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
