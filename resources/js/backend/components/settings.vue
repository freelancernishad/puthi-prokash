<template>
    <div>
        <Breadcrumbs brename="Settings"/>
        <div class="container mt-5">
        <form @submit.prevent="createSettings">
            <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input v-model="form.facebook" type="text" id="facebook" class="form-control" placeholder="Facebook URL">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="twitter">Twitter:</label>
                <input v-model="form.twitter" type="text" id="twitter" class="form-control" placeholder="Twitter URL">
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="instagram">Instagram:</label>
                <input v-model="form.instagram" type="text" id="instagram" class="form-control" placeholder="Instagram URL">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="youtube">Youtube:</label>
                <input v-model="form.youtube" type="text" id="youtube" class="form-control" placeholder="Youtube URL">
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="pinterest">Pinterest:</label>
                <input v-model="form.pinterest" type="text" id="pinterest" class="form-control" placeholder="Pinterest URL">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="mail">Email:</label>
                <input v-model="form.mail" type="text" id="mail" class="form-control" placeholder="Email">
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="whatsapp">WhatsApp:</label>
                <input v-model="form.whatsapp" type="text" id="whatsapp" class="form-control" placeholder="WhatsApp">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="phone1">Phone 1:</label>
                <input v-model="form.phone1" type="text" id="phone1" class="form-control" placeholder="Phone 1">
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="phone2">Phone 2:</label>
                <input v-model="form.phone2" type="text" id="phone2" class="form-control" placeholder="Phone 2">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="address">Address:</label>
                <input v-model="form.address" type="text" id="address" class="form-control" placeholder="Address">
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="address2">Address 2:</label>
                <input v-model="form.address2" type="text" id="address2" class="form-control" placeholder="Address 2">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="short_about">Short About:</label>
                <textarea v-model="form.short_about" id="short_about" class="form-control" placeholder="Short About"></textarea>
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="about">About:</label>
                <textarea v-model="form.about" id="about" class="form-control" placeholder="About"></textarea>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="google_map">Google Map:</label>
                <textarea v-model="form.google_map" id="google_map" class="form-control" placeholder="Google Map"></textarea>
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="smtp_host">SMTP Host:</label>
                <input v-model="form.smtp_host" type="text" id="smtp_host" class="form-control" placeholder="SMTP Host">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="smtp_port">SMTP Port:</label>
                <input v-model="form.smtp_port" type="text" id="smtp_port" class="form-control" placeholder="SMTP Port">
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="smtp_username">SMTP Username:</label>
                <input v-model="form.smtp_username" type="text" id="smtp_username" class="form-control" placeholder="SMTP Username">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="smtp_password">SMTP Password:</label>
                <input v-model="form.smtp_password" type="password" id="smtp_password" class="form-control" placeholder="SMTP Password">
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="smtp_encryption">SMTP Encryption:</label>
                <input v-model="form.smtp_encryption" type="text" id="smtp_encryption" class="form-control" placeholder="SMTP Encryption">
                </div>
            </div>
            </div>

            <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        form: {
          facebook: '',
          twitter: '',
          instagram: '',
          youtube: '',
          pinterest: '',
          mail: '',
          whatsapp: '',
          phone1: '',
          phone2: '',
          address: '',
          address2: '',
          short_about: '',
          about: '',
          google_map: '',
          smtp_host: '',
          smtp_port: '',
          smtp_username: '',
          smtp_password: '',
          smtp_encryption: ''
        },
      };
    },
    methods: {

        async getData(){
            var res = await this.callApi('get',`/api/settings`,[]);
            if(res.status==200){
                this.form = res.data
            }
        },


        async createSettings() {
            var res = await this.callApi('post',`/api/settings`,this.form);
            this.getData();
            Notification.customSuccess(`${res.data.message}`);
        },
    },
    mounted() {
        this.getData();
    },
  };
  </script>

  <style>
  /* Add custom CSS here if needed */
  </style>
