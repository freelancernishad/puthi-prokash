<template>
  <div class="popup-overlay">
        <div class="popup-form">
            <div class="text-right">
                <i class="fa-regular fa-xmark" @click="close" style="color: red;padding: 8px 10px;font-size: 20px;cursor: pointer;"></i>
            </div>
            <h2 class="text-center">
                Category form
            </h2>


            <form @submit.stop.prevent="onSubmit">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" v-model="form.name" @keyup="makeSlug(form.name)">

                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('name')" v-for="name in errors.name" :key="name">{{ name }}</span>
                                        <!-- <Fromerror Fieldname="name"/> -->

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Category Slug</label>
                                        <input type="text" class="form-control" v-model="form.slug" disabled>
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('slug')" v-for="name in errors.slug" :key="name">{{ name }}</span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Parent Category</label>
                                        <select v-model="form.parent_id" class="form-control">
                                            <option value="">Select</option>
                                            <option v-for="list in lists" :key="list.id" :value="list.id">{{ list.name }}</option>
                                        </select>
                                    </div>
                                </div>


                            </div>

                            <button class="btn btn-info">Submit</button>
                        </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            lists:{},
            form:{
                name:'',
                slug:'',
                parent_id:'',
                icon:`${this.$asseturl}assets/image/image.png`,
            },
        }
    },
    methods: {
        makeSlug(name){
            this.form.slug = this.createSlug(name);
        },

        async getList(){
            var res = await this.callApi('get',`/api/all/categories?type=withoutpaginate`,[])

            let listsArray = res.data.filter((item)=> {
                    return item.id!=this.$route.params.id;
                });


            this.lists = listsArray
        },


        FileSelected2($event, parent_index) {
            console.log(parent_index)

            let file = $event.target.files[0];
            if (file.size > 5048576) {
                Notification.image_validation();
            } else {
                let reader = new FileReader;
                reader.onload = event => {
                    this.form[parent_index] = event.target.result
                    console.log(event.target.result);
                };
                reader.readAsDataURL(file)
            }
            //   console.log($event.target.result);
        },
        async onSubmit() {
            var res = await this.callApi('post', '/api/categories', this.form);

            if(res.status==200){
                Notification.customSuccess(`Category Updated Successfull`);

                this.close();
            this.$emit('call_data')
            }else if(res.status==201){
                Notification.customSuccess(`Category Created Successfull`);

            this.close();
            this.$emit('call_data')
                // this.$router.push({name:'categoryimages',params:{id:res.data.id}});


            }else{
                Notification.customError(`Something want wrong!`);
                this.errors = res.data.errors
            }




        },
        close(){
            this.$emit('close_popup')

        }
    },
    mounted() {
        this.getList();
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
