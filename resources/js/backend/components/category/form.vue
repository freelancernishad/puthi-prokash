<template>
    <div>
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
                                        <input type="text" class="form-control" v-model="form.name">

                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('name')" v-for="name in errors.name" :key="name">{{ name }}</span>
                                        <!-- <Fromerror Fieldname="name"/> -->

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Category Slug</label>
                                        <input type="text" class="form-control" v-model="form.slug">
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
    <!-- Input for file upload (hidden) -->
    <input type="file" id="fileInput" accept="image/*" @change="FileSelected($event,'icon')">
  </div>



                                        <!-- <input type="text" class="form-control" v-model="form.ISBN">
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('ISBN')" v-for="name in errors.ISBN" :key="name">{{ name }}</span> -->
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
        },
        async getItems(){
            var res = await this.callApi('get',`/api/categories/${this.$route.params.id}`,[])
            this.form = res.data
        },

        async onSubmit(){

            var res = await this.callApi(`${this.Method}`,`${this.updateInsertApi}`,this.form);


            if(res.status==200){
                Notification.customSuccess(`Category Updated Successfull`);
                this.$router.push({name:'categoryIndex'});
            }else if(res.status==201){
                Notification.customSuccess(`Category Created Successfull`);

                this.$router.push({name:'categoryimages',params:{id:res.data.id}});


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
            this.updateInsertApi = `/api/categories/${this.$route.params.id}`;
            this.Method = 'put';
        }else{
            this.updateInsertApi = `/api/categories`;
            this.Method = 'post';

        }


    }
}
</script>
