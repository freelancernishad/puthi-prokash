<template>
    <div>
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
        <Breadcrumbs brename="Pages Form"/>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form @submit.stop.prevent="onSubmit">
                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Page Name</label>
                                        <input type="text" class="form-control" v-model="form.page_name" @keyup="makeSlug(form.page_name)">
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('page_name')" v-for="name in errors.page_name" :key="name">{{ name }}</span>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Page Slug</label>
                                        <input type="text" class="form-control" v-model="form.slug" disabled>
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('slug')" v-for="name in errors.slug" :key="name">{{ name }}</span>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Content</label>

                                        <vue-editor v-model="form.content"    api-key="nhnny39zzu3w0euy077ojdf9gk1n3mjpkobk25i228rt3qkz" :init="tinyInt"></vue-editor>

                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('content')" v-for="name in errors.content" :key="name">{{ name }}</span>
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-info">Save</button>
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
            form:{
                page_name:'',
                slug:'',
                content:'',
            },
            updateInsertApi:'/api/pages',
            Method:'post',
            preLooding:false,















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

        async getItems(){
            this.preLooding = true
            var res = await this.callApi('get',`/api/pages/${this.$route.params.id}`,[])
            this.form = res.data
            this.preLooding = false
        },

        async onSubmit(){
            this.preLooding = true

            var res = await this.callApi(`${this.Method}`,`${this.updateInsertApi}`,this.form);


            if(res.status==200){
                Notification.customSuccess(`Pages Updated Successfull`);
                this.$router.push({name:'pagesIndex'});
            }else if(res.status==201){
                Notification.customSuccess(`Pages Created Successfull`);

                this.$router.push({name:'pagesIndex'});


            }else{
                Notification.customError(`Something want wrong!`);
                this.errors = res.data.errors
            }
            this.preLooding = false
        }
    },
    mounted(){
        if(this.$route.params.id){
            this.getItems();
            this.updateInsertApi = `/api/pages/${this.$route.params.id}`;
            this.Method = 'put';
        }else{
            this.updateInsertApi = `/api/pages`;
            this.Method = 'post';

        }



    }
}
</script>
