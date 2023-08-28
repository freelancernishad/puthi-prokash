<template>
    <main>

        <Breadcrumb :pages="Breadcrumb"/>


        <section class="container d-md-flex my-5" style="padding-top: 50px;grid-gap: 25px;">
            <div class="col-md-3 col-sm-5 col-sm-12 singleProductImage">
                <img :src="item.image" alt="" srcset="">
            </div>
            <div class="col-md-9 col-sm-7 position-relative">

                <button class="singleProductCollectedButton" @click="addToCart({'product_id':item.id})">সংগ্রহ করুন</button>

                <div class="">
                    <div>
                        <h2 class="book-title">{{ item.name }}</h2>
                    </div>

                    <p v-if="item.author">
                        <b>
                            <span>
                                <router-link :to="{name:'Products',query:{author:item.author.id}}" class="text-decoration-none text-danger" >{{ item.author.name }}</router-link>
                            </span>
                        </b>
                    </p>

                    <h5 class="book-meta">
                        বিষয় :
                        <router-link class="text-decoration-none text-danger" :to="{name:'Products',query:{category:item.category.id}}">{{ item.category.name }}</router-link>
                    </h5>
                    <h5 class="book-meta">
                        প্রচ্ছদ : {{ item.prossod }}
                    </h5>
                    <h5 class="book-meta">
                        মোট পৃষ্ঠা :
                        <span class="eng-text">{{ item.total_page }}</span>
                    </h5>
                    <h5 class="book-meta">
                        <span class="tangon">প্রকাশের তারিখ :</span>
                        <span class="eng-text">{{ item.release_date }}</span>
                    </h5>
                    <h5 class="book-meta">
                        <span class="tangon">কভার টাইপ :</span>
                        <span class="eng-text">{{ item.cover_type }}</span>
                    </h5>
                    <h5 class="book-meta eng-text">
                        Stock : {{ item.stock }}
                    </h5>

                    <h5 class="book-meta eng-text">
                        ISBN : {{ item.ISBN }}
                    </h5>



                    <div class="mt-2 font-18">
                        <div class="font-weight-bold">
                            <span>Price: Tk. {{ item.price-totalDiscountValue }}</span>


                            <span class="ml-2 text-danger" v-if="item.discount_status">

                                <span v-if="item.discount_type=='percent'">
                                    (<span>{{ item.discount }}</span><span> % </span><span class="ml-1">OFF</span>)
                                </span>

                                <span v-else-if="item.discount_type=='Fixed'">
                                    (<span>{{ item.discount }}</span><span> টাকা </span><span class="ml-1">OFF</span>)
                                </span>


                            </span>

                        </div>
                        <div class="font-weight-bold" v-if="item.discount_status">
                            Regular Price:
                            <strike class="item-price">Tk. {{ item.price }} </strike>
                        </div>
                    </div>




                    <div class="my-3 d-flex flex-wrap align-items-center" >



                        <div class="d-flex flex-wrap">

                            <img :src="$asseturl+flipping_book.image" v-for="(flipping_book,index) in item.flipping_books" :key="'flipping_books'+index" @click="openModal($asseturl+flipping_book.image,index,item.flipping_books)"  class="img-thumbnail sampleBooks" role="button">


                        </div>




                        <div class="btn-group">
    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-share" aria-hidden="true"></i> Share This Book
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
        <li><a target="_blank" class="dropdown-item" :href="`https://www.facebook.com/sharer.php?u=https://puthiprokash.com/product/single/${this.$route.params.id}`"><i class="fab fa-facebook"></i> Share on Facebook</a></li>
        <li><a target="_blank" class="dropdown-item" :href="`https://twitter.com/intent/tweet?url=https://puthiprokash.com/product/single/${this.$route.params.id}&text=Check%20out%20this%20book!`"><i class="fab fa-twitter"></i> Share on Twitter</a></li>
        <li><a target="_blank" class="dropdown-item" :href="`https://www.linkedin.com/sharing/share-offsite/?url=https://puthiprokash.com/product/single/${this.$route.params.id}`"><i class="fab fa-linkedin"></i> Share on LinkedIn</a></li>
        <li><a target="_blank" class="dropdown-item" :href="`https://www.reddit.com/submit?url=https://puthiprokash.com/product/single/${this.$route.params.id}&title=Check%20out%20this%20book`"><i class="fab fa-reddit"></i> Share on Reddit</a></li>
        <li><a target="_blank" class="dropdown-item" :href="`https://pinterest.com/pin/create/button/?url=https://puthiprokash.com/product/single/${this.$route.params.id}&description=Check%20out%20this%20book`"><i class="fab fa-pinterest"></i> Share on Pinterest</a></li>
        <li><a target="_blank" class="dropdown-item" :href="`https://www.tumblr.com/widgets/share/tool?canonicalUrl=https://puthiprokash.com/product/single/${this.$route.params.id}&title=Check%20out%20this%20book`"><i class="fab fa-tumblr"></i> Share on Tumblr</a></li>
        <!-- Add more social network share links here -->
    </ul>
</div>







                    </div>
<!--

                    <p class="mb-0">মহাভারতের দেশ অন্বেষণসূত্রে এই গ্রহে এমন সব ধ্রুব-বিষয় উঠে এসেছে, তাকে দৃষ্টান্ত করেই আমরা আজকের সমস্ত অব্যবস্থাপনার প্রতি আপত্তি জানাতে পারি আর দার্ঢ্যসহকারে বলতে পারি, আদিতে এই দেশ এমন বিস্তৃত জিনিস ছিল না সেদিন এই দেশের সমস্ত ব্যবস্থার ভিত্তি ছিল পারস্পরিক সম্পর্ক, আর অবাধ ও স্বতঃস্ফূর্তসন্নতির মাধ্যমে প্রাণনা পেয়ে সমাজ হয়ে উঠেছিল এক ও সহযোগিতার ধারণা ছিল সেই প্রতিষ্ঠানের চালিকাশক্তি। এই দেশে আবারও সেই ব্যবস্থা প্রনয়ণ করতে হলে, আমাদের আলোর মশাল জোগাড় করতে হবে মহাভারতের কাছে থেকে। সেই প্রয়াস আন্তরিক হলে, মহাভারতের দেশ তার অ শরীরসহ নয়, আলোকদর্শনরূপে দাড়াবে ভবিষ্যযাত্রীদের সামনে।
                        আবুল ফজল মহাভারতের আখ্যান থেকে তুলে এনেছেন সেসব ঋষিবাক্য। সংস্কৃত শ্লোকের সহজ বোধগম্য বর্ণনায় গ্রহটি হয়ে উঠেছে সুখপাঠ্য। ফলে এটি কেবল পুরাণনির্ভর কাহিনিই থাকেনি, সম রাষ্ট্র ও রাজনৈতিক জটিল পরিস্থিতি থেকে উদ্ধারের নিশাও হয়তো মিলবে।</p> -->



                </div>


            </div>



    </section>

    <div class="container">
        <p class="fw-bold mb-3 ms-3"><span class="border-2 border-bottom border-danger pe-1">এই </span>বিষয়ে আরও বই সমূহঃ</p>
        <div class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-6 row-cols-md-2 row-cols-sm-2 row-cols-2">
            <Product v-for="(product,indexs) in relateds" :key="'product'+indexs"  :product="product" @show_details="goDetialsFun(index,product.id,product)"/>
        </div>
    </div>








    <div v-if="modalOpen"  class="modal-overlay">
                        <div class="modal-container" >
                            <span class="imageshowCloseButton" @click="closeModal"><i class="fa-regular fa-xmark"></i></span>
                            <button class="ImageModalButton" @click="preImage" :disabled="imageUrlIndex == 0"><i class="fa-solid fa-chevron-left"></i></button>
                            <img :src="imageUrl" alt="Modal Image" />
                            <button class="ImageModalButton" @click="nextImage" :disabled="imageUrlIndex == 3"><i class="fa-solid fa-chevron-right"></i></button>

                        </div>
                    </div>



    </main>
</template>

<script>
export default {

  data() {
    return {
        modalOpen: false,
        imageUrl:'',
        imageUrls:'',
        imageUrlIndex:0,
        item:{

            author:{
                id:''
            },
            category:{
                id:'',
                name:'',
            }

        },
        relateds:{},
        Breadcrumb:[],
    };
  },
  watch: {
        '$route': {
            handler(newValue, oldValue) {
                this.getItem();
                this.getRelatedProducts();
            },
            deep: true
        }
    },
  computed: {
    totalDiscountValue() {

        if(this.item.discount_status){
                    if (this.item.discount_type === 'Fixed') {
            return this.item.discount;
          } else if (this.item.discount_type === 'percent') {
            return (this.item.price * this.item.discount)/100;
          }else{
            return 0;
          }
        }else{
            return 0;
          }

    },

  },

  methods: {

    goDetialsFun(id,productid,showDetialsProduct){
        this.$router.push({name:'productSingle',params:{id:productid}})
        },

    async getItem(){
        var res = await this.callApi('get',`/api/products/${this.$route.params.id}`,[]);
        this.Breadcrumb = [{'route':'home','params':{},'text':'হোম'}];
        this.item = res.data;
        this.Breadcrumb.push(
                    {'route':'','params':{},'text':res.data.name}
                )
    },


    async getRelatedProducts(){
        var res = await this.callApi('get',`/api/products/${this.$route.params.id}/related`,[]);
        this.relateds = res.data;
    },




  },
  mounted() {
    this.getItem();
    this.getRelatedProducts();
  },
};
</script>




    <style scoped>

























    .singleProductImage img{
        width: 100%;
    }

    @media (max-width: 767px){
        .singleProductImage{
            text-align: center;
            margin-bottom: 40px;
        }
        .singleProductImage img{
            width: 60%;
        }
    }

        .book-meta {
            font-size: 1rem;
        }
        .book-title {
            font-size: 1.4rem;
        }
    </style>
