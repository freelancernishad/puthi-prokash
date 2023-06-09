<template>
    <div>
        <Breadcrumbs brename="Filiping Books"/>
        <form  @submit.stop.prevent="onSubmit">
      <table class="table">
          <thead>
            <tr>
              <th>SL</th>
              <th>Page Menu</th>
              <th>Image</th>
              <th> <button type="button" class="btn btn-info" @click="addmentInput">Add New input</button> </th>
            </tr>
          </thead>

          <tbody>

            <tr v-for="(form,index) in forms" :key="index">
              <td>{{ index+1 }}</td>

              <td><input type="text" v-model="form.name"></td>



              <td style="display: flex;justify-content: space-between;align-items: center;grid-gap: 40px;">
                <div class="form-group">
                    <input type="file" class="form-control" @change="FileSelected($event, index)">
                </div>
              <img width="100px" :src="form.image" :ref="'myImage'+index" alt="">
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


import books from './flipinbBookUpload.vue';

export default {
    components:{books},
    data() {
        return {

            forms:[
                {
                    name:'',
                    image:''
                }
            ],
            apimethod:'post',
            apiurl:`/api/products/${this.$route.params.id}/fliping/book`,
            redirectroute:'productsIndex'
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
               this.getItems();
            },
            deep: true
        }
    },

    methods: {
        async getItems(){
            var res = await this.callApi('get',`/api/products/${this.$route.params.id}/fliping/book`,[])
            this.forms = res.data.books
        },


    addmentInput(){
        this.forms.push( {
                    name:'',
                    image:''
                });

    },
    remove(index) {
          this.forms.splice(index, 1);
      },
      async onSubmit(){

              var res = await this.callApi(`${this.apimethod}`,`${this.apiurl}`,this.forms);



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


          },

    FileSelected($event, parent_index) {
            let file = $event.target.files[0];

                let reader = new FileReader;
                reader.onload = event => {
                    this.forms[parent_index].image = event.target.result
                    const imageElement = this.$refs["myImage"+parent_index];
                  imageElement.src=event.target.result;
                  this.addmentInput();
                };
                reader.readAsDataURL(file)


        },






    },
    mounted() {
        this.getItems();
    },
}
</script>
