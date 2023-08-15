<template>
    <div>
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
        <Breadcrumbs brename="Gallery Form"/>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form @submit.stop.prevent="onSubmit">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control" v-model="form.title">

                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('title')" v-for="name in errors.title" :key="name">{{ name }}</span>
                                        <!-- <Fromerror Fieldname="name"/> -->

                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea  v-model="form.description" class="form-control" style="resize: none;height: 100px;"></textarea>
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('description')" v-for="name in errors.description" :key="name">{{ name }}</span>
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-info">Next</button>
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
                name:'',
                slug:'',
                parent_id:'',
            },
            updateInsertApi:'/api/galleries',
            Method:'post',
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
                    parent_id:'',
                }
            }
            },
            deep: true
        }
    },
    methods: {

        async getItems(){
            this.preLooding = true
            var res = await this.callApi('get',`/api/galleries/${this.$route.params.id}`,[])
            this.form = res.data
            this.preLooding = false
        },

        async onSubmit(){
            this.preLooding = true

            var res = await this.callApi(`${this.Method}`,`${this.updateInsertApi}`,this.form);


            if(res.status==200){
                Notification.customSuccess(`Gallery Updated Successfull`);
                this.$router.push({name:'galleryIndex'});
            }else if(res.status==201){
                Notification.customSuccess(`Gallery Created Successfull`);
                this.$router.push({name:'galleryimages',params:{id:res.data.id}});
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
            this.updateInsertApi = `/api/galleries/${this.$route.params.id}`;
            this.Method = 'put';
        }else{
            this.updateInsertApi = `/api/galleries`;
            this.Method = 'post';

        }


    }
}
</script>
