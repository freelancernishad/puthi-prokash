import { mapGetters } from 'vuex'
import { slugify } from 'transliteration';
export default {
    data(){
        return {
            numbers: {
                0: "০",
                1: "১",
                2: "২",
                3: "৩",
                4: "৪",
                5: "৫",
                6: "৬",
                7: "৭",
                8: "৮",
                9: "৯",
              },
              PaginateRows:20,
              Totalrows:0,
              PerPageData:0,
              Totalpage:[],
              Routename:'',
              Routeparams:{},
              errors:{},



        }
    },

    methods: {

        createSlug(title) {
            let slug = slugify(title, {
                lowercase: true,
                separator: '-'
            });
            slug = slug.replace(/[^\w\s-]/g, '');
            // this.form.slug = slug
            return slug;
        },
        async getGalleryImages(){
            var res = await this.callApi('get',`/api/get/gallery/for/editor`,[]);
            console.log(res)
            this.tinyInt.image_list = res.data;
        },



        async addToCart(form){
            form['user_id'] = this.$localStorage.getItem('userid');



            var res = await this.callApi('post',`/api/cart`,form);
            Notification.customSuccess("Added to cart");
        },



        openModal(img) {
            this.imageUrl = img
            this.modalOpen = true;
            },
            closeModal() {
            this.modalOpen = false;
            },




        errorHandleing(col){
            if(col in this.errors){
                return 1;
            }
            return 0;
        },

        async callApi(method, url, dataObj,headers={}){
            try {

              return await axios({
                    method: method,
                    url: url,
                    data: dataObj,
                    headers: headers,
                });
            } catch (e) {
                return e.response
            }
        },




        async callApiPaginate(url,page){
            var res = await this.callApi('get',`${url}`,[]);
            this.PaginateRows = res.data.per_page
            this.Totalrows = res.data.total
            this.Totalpage = res.data.links
            this.PerPageData = res.data.per_page
            this.Routename = 'categoryIndex'
            this.Routeparams = {}
            if(page==1){
                this.pageNO = 1;
            }else{
                this.pageNO = (page-1)*this.PerPageData+1;
            }
            if(res.data.last_page<page){
                this.$router.push({name:this.Routename,query:{page:res.data.last_page}});
            }
            return  res.data.data;

        },








        dateformatGlobal(date=''){
           return  User.dateformat(date);
        },


        changeName(value){
            if(value=='admin'){
                return 'এডমিন';
            }else if(value=='sub_admin'){
                return 'সাব-এডমিন';
            }
        },


        DeleteAction(title='',text='',route='',notification='',callback){
            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes`,
                cancelButtonText: `No`
            }).then(async (result) => {
                if (result.isConfirmed) {
                    var res = await this.callApi('delete', `${route}`, []);
                    Notification.customSuccess(notification);
                    callback();

                }
            })
        },



         getMonthFromString(mon){
            return new Date(Date.parse(mon +" 10, 2022")).getMonth()+1
         },
        // int_en_to_bn(input=0){
        //     var output = [];
        //     for (var i = 0; i < input.length; ++i) {
        //       if (numbers.hasOwnProperty(input[i])) {
        //         output.push(numbers[input[i]]);
        //       } else {
        //         output.push(input[i]);
        //       }
        //     }
        //     return output.join('');

        // },


        int_en_to_bn(text=0) {
            var result;
            if (text == '0') {
                result = '০';
            } else if (text == '1') {
                result = '১';
            } else if (text == '2') {
                result = '২';
            } else if (text == '3') {
                result = '৩';
            } else if (text == '4') {
                result = '৪';
            } else if (text == '5') {
                result = '৫';
            } else if (text == '6') {
                result = '৬';
            } else if (text == '7') {
                result = '৭';
            } else if (text == '8') {
                result = '৮';
            } else if (text == '9') {
                result = '৯';
            }
            return result;
        },





        checkUserPermission(key){
            if(!this.userPermission) return true
            let isPermitted = false;
            for(let d of this.userPermission){
                if(this.$route.name==d.name){
                    if(d[key]){
                        isPermitted = true
                        break;
                    }else{
                        break
                    }
                }

            }
            return isPermitted
            // return this.$route.name;
        }

    },
    computed: {



        ...mapGetters({
            'Users' : 'getUpdateUser',
            'preload_data' : 'get_pre_load_data',
            'tinyInt' : 'gettinyint',
        }),

        // getUsers(){
        //     return this.$store.getters.getUpdateUser;

        // },

        // isReadPermitted(){
        //     return this.checkUserPermission('read')
        //  },
        //  isWritePermitted(){
        //      return this.checkUserPermission('write')
        //  },
        //  isUpdatePermitted(){
        //      return this.checkUserPermission('update')
        //  },
        //  isDeletePermitted(){
        //      return this.checkUserPermission('delete')
        //  },

    },




}
