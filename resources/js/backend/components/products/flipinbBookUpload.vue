<template>
    <div>
        <!-- <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>-->

        <preloader  v-if="preLooding"/>

  <form  @submit.stop.prevent="onSubmit">
      <table class="table">
          <thead>
            <tr>
              <th>SL</th>
              <th>Image</th>
              <th> <button type="button" class="btn btn-info" @click="addmentInput">Add New input</button> </th>
            </tr>
          </thead>

          <tbody>

            <tr v-for="(image,index) in images" :key="index">
              <td>{{ index+1 }}</td>



              <td style="display: flex;justify-content: space-between;align-items: center;grid-gap: 40px;">
                <div class="form-group">
                    <input type="file" class="form-control" @change="FileSelected($event, index)">
                </div>
              <img width="100px" :src="images[index]" :ref="'myImage'+index" alt="">
              </td>


              <td> <button type="button" class="btn btn-danger" @click="remove(index)">Remove</button> </td>
            </tr>

          </tbody>

      </table>

      <button class="btn btn-info">Upload</button>
    </form>
    </div>
</template>

<script>
export default {
  props:['apimethod','apiurl','images','redirectroute'],
  data() {
    return {

        preLooding:false

    }
  },
  methods: {


    addmentInput(){
      this.images.push('');

    },
    remove(index) {
          this.images.splice(index, 1);
      },
      async onSubmit(){
        this.preLooding = true
              var res = await this.callApi(`${this.apimethod}`,`${this.apiurl}`,this.images);
              console.log(res)

              if(res.status==200){
                  Notification.customSuccess(`Updated Successfull`);
                  this.$router.push({name:this.redirectroute});
              }else if(res.status==201){
                  Notification.customSuccess(`Created Successfull`);
                  this.$router.push({name:this.redirectroute});

              }else{
                  Notification.customError(`Something want wrong!`);
                  this.errors = res.data.errors
              }
              this.preLooding = false
          },

    FileSelected($event, parent_index) {
            let file = $event.target.files[0];
            // console.log(file.size);
            // if (file.size < 204800) {
            //     event.target.value = '';

            //     if(parent_index=='applicant_national_id_front_attachment'){
            //         this.form[parent_index] = this.$asseturl+'demonid/front.jpg'
            //     }else if(parent_index=='applicant_national_id_back_attachment'){
            //         this.form[parent_index] = this.$asseturl+'demonid/back.jpg'
            //     }

            //     Swal.fire({
            //         icon: 'error',
            //         title: 'দুঃখিত',
            //         text: 'ছবি অবশ্যই 200KB এর উপরে হতে হবে!'

            //         })
            // }
            //  else {
                let reader = new FileReader;
                reader.onload = event => {
                    this.images[parent_index] = event.target.result
                    const imageElement = this.$refs["myImage"+parent_index];
                    console.log(imageElement)
                  imageElement.src=event.target.result;
                  this.images.push('');
                };
                reader.readAsDataURL(file)
            // }

        },
  },

  mounted() {

  },


}
</script>
