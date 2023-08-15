<template>
    <div>

        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>


        <Breadcrumbs brename="Slider Form"/>

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
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Slider Image</label>
                                        <div class="upload-container">
                                            <label for="fileInput"><img id="imagePreview" :src="form.image" alt="Image Preview"></label>
                                            <input type="file" id="fileInput" accept="image/*" @change="FileSelected($event,'image')">
                                        </div>
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
                title:'',
                image:`${this.$asseturl}assets/image/image.png`,
            },
            updateInsertApi:'/api/sliders',
            Method:'post',
            preLooding:false
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                if(!this.$route.params.id){
                this.form= {
                    title:'',
                    image:`${this.$asseturl}assets/image/image.png`,

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



        async getItems(){
            this.preLooding = true
            var res = await this.callApi('get',`/api/sliders/${this.$route.params.id}`,[])
            this.form = res.data
            this.preLooding = false
        },

        async onSubmit(){
            this.preLooding = true
            var res = await this.callApi(`${this.Method}`,`${this.updateInsertApi}`,this.form);


            if(res.status==200){
                Notification.customSuccess(`Slider Updated Successfull`);
                this.$router.push({name:'sliderIndex'});
            }else if(res.status==201){
                Notification.customSuccess(`Slider Created Successfull`);

                this.$router.push({name:'sliderIndex'});


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
            this.updateInsertApi = `/api/sliders/${this.$route.params.id}`;
            this.Method = 'put';
        }else{
            this.updateInsertApi = `/api/sliders`;
            this.Method = 'post';

        }


    }
}
</script>
