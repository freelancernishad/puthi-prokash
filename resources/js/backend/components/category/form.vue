<template>
    <div>
        <!-- <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>-->

        <preloader  v-if="preLooding"/>

        <Breadcrumbs brename="Category Form"/>

        <!-- <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <CategoryTree :lists="lists"  />
                    </div>
                </div>
            </div>
        </div>         -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

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


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <div class="upload-container">
                                            <label for="fileInput">
                                            <img id="imagePreview" :src="form.icon" alt="Image Preview">
                                            </label>
                                            <input type="file" id="fileInput" accept="image/*" @change="FileSelected($event,'icon')">
                                        </div>
                                    </div>
                                </div>







                            </div>

                            <button class="btn btn-info">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
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
            updateInsertApi:'/api/categories',
            Method:'post',
            preLooding:true,
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                if(!this.$route.params.id){
                this.form= {
                    name:'',
                    slug:'',
                    parent_id:'',
                    icon:`${this.$asseturl}assets/image/image.png`,
                }
            }
            },
            deep: true
        }
    },
    methods: {

        makeSlug(name){
            this.form.slug = this.createSlug(name);
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

            var res = await this.callApi('get',`/api/all/categories?type=withoutpaginate`,[])

            let listsArray = res.data.filter((item)=> {
                    return item.id!=this.$route.params.id;
                });


            this.lists = listsArray
            this.preLooding = false
        },
        async getItems(){
            var res = await this.callApi('get',`/api/categories/${this.$route.params.id}`,[])
            this.form = res.data
            this.preLooding = false
        },

        async onSubmit(){
            this.preLooding = true

            var res = await this.callApi(`${this.Method}`,`${this.updateInsertApi}`,this.form);



            if(res.status==200){
                Notification.customSuccess(`Category Updated Successfull`);
                this.$router.push({name:'categoryIndex'});
            }else if(res.status==201){
                Notification.customSuccess(`Category Created Successfull`);
                this.$router.push({name:'categoryIndex'});
                // this.$router.push({name:'categoryimages',params:{id:res.data.id}});


            }else{
                Notification.customError(`Something want wrong!`);
                this.errors = res.data.errors
            }
            this.preLooding = false
        },















    },
    mounted(){
        this.getList();
        if(this.$route.params.id){
            this.getItems();
            this.updateInsertApi = `/api/categories/${this.$route.params.id}`;
            this.Method = 'put';
        }else{
            this.updateInsertApi = `/api/categories`;
            this.Method = 'post';

        }


        // console.log(this.createSlug('শ্রেষ্ঠ প্রবন্ধ সিরিজ'));



    }
}
</script>
