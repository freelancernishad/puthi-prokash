<template>
    <div>
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>

        <Breadcrumbs brename="Products Form"/>

        <form @submit.stop.prevent="onSubmit">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">বইয়ের নাম</label>
                                        <input type="text" class="form-control" v-model="form.name">

                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('name')" v-for="name in errors.name" :key="name">{{ name }}</span>
                                        <!-- <Fromerror Fieldname="name"/> -->

                                    </div>
                                </div>




                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Short Description</label>
                                        <textarea  v-model="form.short_description" class="form-control" style="resize: none;height: 100px;"></textarea>
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('short_description')" v-for="name in errors.short_description" :key="name">{{ name }}</span>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <vue-editor v-model="form.description"    api-key="nhnny39zzu3w0euy077ojdf9gk1n3mjpkobk25i228rt3qkz" :init="tinyInt"></vue-editor>
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('short_description')" v-for="name in errors.short_description" :key="name">{{ name }}</span>
                                    </div>
                                </div>






                            </div>



                        </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                            <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-info">Published Now</button>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">দাম</label>
                                        <input type="text" class="form-control" v-model="form.price">

                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('price')" v-for="name in errors.price" :key="name">{{ name }}</span>
                                        <!-- <Fromerror Fieldname="name"/> -->
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="">ডিসকাউন্ট কি আছে?</label> <br/>
                                    <label class="switch">
                                        <input type="checkbox" v-model="form.discount_status" >
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-md-12" v-if="form.discount_status">
                                    <div class="form-group">
                                        <label for="">ডিসকাউন্ট ধরণ</label>
                                        <select class="form-control" v-model="form.discount_type">
                                            <option value="">নির্বাচন করুন</option>
                                            <option value="Fixed">ফিক্স</option>
                                            <option value="percent">শতকরা</option>
                                        </select>

                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('discount_type')" v-for="name in errors.discount_type" :key="name">{{ name }}</span>
                                        <!-- <Fromerror Fieldname="name"/> -->
                                    </div>
                                </div>

                                <div class="col-md-12" v-if="form.discount_status && form.discount_type">
                                    <div class="form-group">
                                        <label for="" >ডিসকাউন্ট
                                            <span v-if="form.discount_type=='Fixed'">(ডিসকাউন্ট এর টাকার পরিমাণ)</span>
                                            <span v-else>(ডিসকাউন্ট এর শতকরা পরিমাণ)</span></label>
                                        <input type="text" class="form-control" v-model="form.discount">

                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('discount')" v-for="name in errors.discount" :key="name">{{ name }}</span>
                                        <!-- <Fromerror Fieldname="name"/> -->
                                    </div>
                                </div>



                                <div class="col-md-12">

                                    <div class="d-flex justify-content-between align-items-baseline">


                                    <div class="form-group">
                                        <label for="">বিষয়</label>
                                        <multiselect v-model="categories" tag-placeholder="Add this as new tag" placeholder="Search or add a tag"  :options="lists" :multiple="true"  label="name" track-by="id"></multiselect>
                                    </div>
                                    <button type="button"  @click="addCat" class="btn btn-info" style="width:10%;font-size: 16px;">+</button>
                                    </div>
                                </div>


                                <div class="col-md-12">

                                    <div class="d-flex justify-content-between align-items-baseline">


                                        <div class="form-group" style="width:90%">
                                            <label for="">লেখক</label>
                                            <select class="form-control" v-model="form.author_id">
                                                <option value="">লেখক নির্বাচন করুন</option>
                                                <option v-for="(writer,index) in writers" :key="'writer'+index" :value="writer.id">{{ writer.name }}</option>
                                            </select>
                                            <span class="text-danger font-weight-bold" v-if="errorHandleing('author_id')" v-for="name in errors.author_id" :key="name">{{ name }}</span>
                                        </div>
                                        <button type="button"  @click="addWriter" class="btn btn-info" style="width:10%;font-size: 16px;">+</button>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">প্রচ্ছদ</label>
                                        <input type="text" class="form-control" v-model="form.prossod">
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('prossod')" v-for="name in errors.prossod" :key="name">{{ name }}</span>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">মোট পৃষ্ঠা</label>
                                        <input type="text" class="form-control" v-model="form.total_page">
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('total_page')" v-for="name in errors.total_page" :key="name">{{ name }}</span>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">প্রকাশের তারিখ</label>
                                        <input type="date" class="form-control" v-model="form.release_date">
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('release_date')" v-for="name in errors.release_date" :key="name">{{ name }}</span>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">কভার টাইপ</label>
                                        <select class="form-control" v-model="form.cover_type">
                                            <option value="">কভার নির্বাচন করুন</option>
                                            <option value="cover">কভার</option>
                                        </select>

                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('cover_type')" v-for="name in errors.cover_type" :key="name">{{ name }}</span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">ISBN</label>
                                        <input type="text" class="form-control" v-model="form.ISBN">
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('ISBN')" v-for="name in errors.ISBN" :key="name">{{ name }}</span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">featured image</label>

                                        <div class="upload-container" >

                                            <label for="fileInput">
                                            <img id="imagePreview" :src="form.image" alt="Image Preview">
                                            </label>
                                            <!-- Input for file upload (hidden) -->
                                            <input type="file" id="fileInput" accept="image/*" @change="FileSelected($event,'image')">
                                        </div>



                                        <!-- <input type="text" class="form-control" v-model="form.ISBN">
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('ISBN')" v-for="name in errors.ISBN" :key="name">{{ name }}</span> -->
                                    </div>
                                </div>


                                </div>
                                </div>
                                </div>

            </div>


        </div>
    </form>


        <WriterForm v-if="isPopupOpen" @close_popup="closePopup" @call_writer="getWriters" />

        <CategoryForm v-if="isCPopupOpen" @close_popup="closeCPopup" @call_data="getList" />





    </div>
</template>

<script>

import WriterForm from "./WriterForm.vue";
import CategoryForm from "./CategoryForm.vue";

export default {
    components: {
        WriterForm,
        CategoryForm,
    },
    data() {
        return {

            lists:[],
            form:{
                name:'',
                slug:'',
                image:`${this.$asseturl}assets/image/image.png`,
                parent_id:'',
                categories:[],
            },
            categories:[],
            updateInsertApi:'/api/products',
            Method:'post',
            triggerRerender: false,
            writers:{},
            isPopupOpen: false,
            isCPopupOpen: false,
            preLooding:false

        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                if(!this.$route.params.id){
                this.form= {
                    name:'',
                    slug:'',
                    image:`${this.$asseturl}assets/image/image.png`,
                    parent_id:'',
                }
            }
            },
            deep: true
        }
    },
    computed: {
    selectedOptionIds() {
        if (!Array.isArray(this.categories)) {
        return []; // Return an empty array if this.categories is not an array
      }
      return this.categories.map(option => option.id);
    }
    },
    methods: {
        async getWriters(){
            this.preLooding = true
            var res = await this.callApi('get',`/api/users/position/writer?type=all`,[]);
            this.writers = res.data
            this.preLooding = false
        },


        addWriter(){
            this.isPopupOpen = true;
        },

        closePopup(){
            this.isPopupOpen = false;
        },



        addCat(){
            this.isCPopupOpen = true;
        },

        closeCPopup(){
            this.isCPopupOpen = false;
        },




    FileSelected($event, parent_index) {
            let file = $event.target.files[0];
                let reader = new FileReader;
                reader.onload = event => {
                    // console.log(event.target.result)
                    this.form[parent_index] = event.target.result
                };
                reader.readAsDataURL(file)

        },



        async getList(){
            this.preLooding = true
            var res = await this.callApi('get',`/api/all/categories?type=withoutpaginate`,[])


            res.data.forEach(list => {
                this.lists.push(
                    {
                        id:list.id,
                        name:list.name,
                    }

                );
            });
            this.preLooding = false
        },
        async getItems(){
            this.preLooding = true
            var res = await this.callApi('get',`/api/products/${this.$route.params.id}`,[])
            this.form = res.data
                this.categories= res.data.categories
                this.preLooding = false
        },

        async onSubmit(){
            this.preLooding = true
            this.form.categories = this.selectedOptionIds
            this.form.slug = this.createSlug(this.form.name);

            var res = await this.callApi(`${this.Method}`,`${this.updateInsertApi}`,this.form);


            if(res.status==200){
                Notification.customSuccess(`Products Updated Successfull`);
                this.$router.push({name:'productsIndex'});
            }else if(res.status==201){
                Notification.customSuccess(`Products Created Successfull`);

                this.$router.push({name:'flipingbooks',params:{id:res.data.id}});


            }else{
                Notification.customError(`Something want wrong!`);
                this.errors = res.data.errors
            }
            this.preLooding = false
        }
    },
    mounted(){
        this.getList();
        this.getWriters();
        if(this.$route.params.id){
            this.getItems();
            this.updateInsertApi = `/api/products/${this.$route.params.id}`;
            this.Method = 'put';
        }else{
            this.updateInsertApi = `/api/products`;
            this.Method = 'post';

        }


    }
}
</script>

<style>
.tox.tox-tinymce {
    min-height: 500px;
}



   /* Style for the image preview */
   .upload-container {
      text-align: center;
      cursor: pointer;
    }

    .upload-container img {
      max-width: 100%;
      max-height: 200px;
      margin-top: 10px;
    }

    /* Hide the file input */
    #fileInput {
      display: none;
    }
    #fileInput2 {
      display: none;
    }
</style>












