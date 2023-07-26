<template>
    <div>
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
                                    <div class="form-group">
                                        <label for="">বিষয়</label>
                                        <multiselect v-model="categories" tag-placeholder="Add this as new tag" placeholder="Search or add a tag"  :options="lists" :multiple="true"  label="name" track-by="id"></multiselect>
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

                                        <div class="upload-container" onclick="triggerFileInput()">
    <!-- Image preview container -->
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






    </div>
</template>

<script>



export default {





    data() {
        return {


            tinyInt:{
  selector: 'textarea#open-source-plugins',
  plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
  editimage_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'google image', value: 'https://www.google.com/logos/google.jpg' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  file_picker_callback: (callback, value, meta) => {
    /* Provide file and text for the link dialog */

    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
    }
  },
  templates: [
    { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_class: 'mceNonEditable',
  toolbar_mode: 'sliding',
  contextmenu: 'link image table',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
},



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
            triggerRerender: false
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



    FileSelected($event, parent_index) {
            let file = $event.target.files[0];
                let reader = new FileReader;
                reader.onload = event => {
                    console.log(event.target.result)
                    this.form[parent_index] = event.target.result
                };
                reader.readAsDataURL(file)

        },



        async getList(){
            var res = await this.callApi('get',`/api/all/categories?type=withoutpaginate`,[])


            res.data.forEach(list => {
                this.lists.push(
                    {
                        id:list.id,
                        name:list.name,
                    }

                );
            });

        },
        async getItems(){
            var res = await this.callApi('get',`/api/products/${this.$route.params.id}`,[])
            this.form = res.data
                this.categories= res.data.categories
        },

        async onSubmit(){
            this.form.categories = this.selectedOptionIds
            this.form.slug = this.makeSug(this.form.name);

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
        }
    },
    mounted(){



        this.getList();
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
</style>












