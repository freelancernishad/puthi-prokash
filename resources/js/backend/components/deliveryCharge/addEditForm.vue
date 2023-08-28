<template>
    <div class="popup-overlay">
          <div class="popup-form">
              <div class="text-right">
                  <i class="fa-regular fa-xmark" @click="close" style="color: red;padding: 8px 10px;font-size: 20px;cursor: pointer;"></i>
              </div>

              <form class="row" @submit.stop.prevent="onSubmit">


                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Weight From (গ্রাম)</label>
                        <input type="text" v-model="form.weight_from" class="form-control">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Weight To (গ্রাম)</label>
                        <input type="text" v-model="form.weight_to" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Charge</label>
                        <input type="text" v-model="form.charge" class="form-control">
                    </div>
                </div>


                  <div class="col-md-12">
                  <button class="btn btn-info" type="submit">Submit</button>
                  </div>
                  </form>
          </div>
      </div>
  </template>

  <script>
  export default {
    props:['items'],
    created() {



        if(this.items.id)
        {
            this.form.id = this.items.id
        }
        if(this.items.weight_from)
        {
            this.form.weight_from = this.items.weight_from
        }

        if(this.items.weight_to)
        {
            this.form.weight_to = this.items.weight_to
        }

        if(this.items.charge)
        {
            this.form.charge = this.items.charge
        }
        console.log(this.form)



    },
      data() {
          return {
            lists:[],
              form:{
                id:'',
                weight_from:'',
                weight_to:'',
                charge:'',
              },
          }
      },
      methods: {




          async onSubmit() {
              var res = await this.callApi('post', '/api/delivery-charges', this.form);


            if(res.status==200){
                Notification.customSuccess(`Updated Successfull`);

                this.close();
            this.$emit('call_data')
            }else if(res.status==201){
                Notification.customSuccess(`Created Successfull`);

            this.close();
            this.$emit('call_data')
                // this.$router.push({name:'categoryimages',params:{id:res.data.id}});


            }else{
                Notification.customError(`Incorrect decimal!`);
                this.errors = res.data.errors
            }




          },
          close(){
              this.$emit('close_popup')

          }
      },
      mounted() {

      },
  }
  </script>

  <style scoped>
  /* Styles for the popup overlay */
  .popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
    z-index: 9999; /* Ensure the popup is on top of other content */
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* Styles for the popup form container */
  .popup-form {
    background-color: #fff;
    padding: 20px;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    width: 80%; /* Adjust width as needed */
  }

  /* Styles for the form elements */
  .popup-form .form-group {
    margin-bottom: 15px;
  }

  .popup-form label {
    display: block;
    font-weight: bold;
  }

  .popup-form input[type="text"],
  .popup-form input[type="file"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .popup-form .col-md-12 {
    text-align: center;
  }

  .popup-form .btn {
    padding: 8px 20px;
    font-size: 16px;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
  }

  .popup-form .btn:hover {
    background-color: #0056b3;
  }

  /* Optional: Center the form within the popup */
  .popup-form .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  </style>
