<template>
  <div class="popup-overlay">
        <div class="popup-form">
            <div class="text-right">
                <i class="fa-regular fa-xmark" @click="close" style="color: red;padding: 8px 10px;font-size: 20px;cursor: pointer;"></i>
            </div>
            <h2 class="text-center">
                Writer form
            </h2>

            <form class="row" @submit.stop.prevent="onSubmit">


                <div class="form-group col-md-6">
          <label for="">নাম (বাংলা)</label>
          <input type="text" v-model="form.nameBN" class="form-control" placeholder="" aria-describedby="helpId">
        </div>


        <div class="form-group col-md-6">
          <label for="">নাম (ইংলিশ্‌)</label>
          <input type="text" v-model="form.name" class="form-control" placeholder="" aria-describedby="helpId">
        </div>



                <!-- <div class="form-group col-md-6">
                <label for="">ইমেইল</label>
                <input type="text" v-model="form.email" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
 -->

                <div class="form-group col-md-6">
                <label for="">মোবাইল নাম্বার</label>
                <input type="text" v-model="form.phone" class="form-control" placeholder="" aria-describedby="helpId">
                </div>




                <div class="form-group col-md-6">

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" id="hand_map" class="form-control" @change="FileSelected($event, 'image')">
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
    data() {
        return {
            form:{
                id:null,
                name:'',
                nameBN:'',
                email:null,
                phone:'',
                password:'12345678',
                position:'',
                image:'',
            },
        }
    },
    methods: {

        FileSelected($event, parent_index) {
            let file = $event.target.files[0];
            if (file.size > 5048576) {
                Notification.image_validation();
            } else {
                let reader = new FileReader;
                reader.onload = event => {
                    this.form[parent_index] = event.target.result
                    // console.log(event.target.result);
                };
                reader.readAsDataURL(file)
            }
            //   console.log($event.target.result);
        },
        async onSubmit() {
            var res = await this.callApi('post', '/api/users/register-writer', this.form);
            this.close();
            this.$emit('call_writer')
            this.$router.go();
            console.log(this.$router.go())

        },
        close(){
            this.$emit('close_popup')

        }
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
