<template>
    <div>
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
                                        <input type="text" class="form-control" v-model="form.page_name">
                                        <span class="text-danger font-weight-bold" v-if="errorHandleing('page_name')" v-for="name in errors.page_name" :key="name">{{ name }}</span>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Page Slug</label>
                                        <input type="text" class="form-control" v-model="form.slug">
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
            var res = await this.callApi('get',`/api/pages/${this.$route.params.id}`,[])
            this.form = res.data
        },

        async onSubmit(){

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
