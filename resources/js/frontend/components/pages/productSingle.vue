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




                    <div class="my-3 d-flex align-items-center" >



                        <div class="d-flex">


                            <img :src="$asseturl+flipping_book.image" v-for="(flipping_book,index) in item.flipping_books" :key="'flipping_books'+index" @click="openModal($asseturl+flipping_book.image)"  class="img-thumbnail sampleBooks" role="button">

                            <!-- <img :src="$asseturl+'assets/image/sample_book_Re.png'" @click="openModal($asseturl+'assets/image/sample_book_Re.png')"  class="img-thumbnail sampleBooks">

                            <img :src="$asseturl+'assets/image/sample_book_Re.png'" @click="openModal($asseturl+'assets/image/sample_book_Re.png')"  class="img-thumbnail sampleBooks">
                            <img :src="$asseturl+'assets/image/sample_book_Re.png'" @click="openModal($asseturl+'assets/image/sample_book_Re.png')"  class="img-thumbnail sampleBooks">
                            <img :src="$asseturl+'assets/image/sample_book_Re.png'" @click="openModal($asseturl+'assets/image/sample_book_Re.png')"  class="img-thumbnail sampleBooks"> -->
                        </div>


                            <!-- <a href="javascript:;" class="btn btn-success btn-sm mr-1">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> একটু পড়ে দেখুন
                            </a>
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart
                            </button>
                            <button class="btn btn-info btn-sm ml-1">
                                <i class="fa fa-heart" aria-hidden="true"></i> Add to Wishlist
                            </button> -->



                            <div class="btn-group">
                                <button type="button" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false" class="btn btn-secondary btn-sm ml-1 dropdown-toggle share-btn">
                                    <i class="fa fa-share" aria-hidden="true"></i> Share This Book
                                </button>
                            </div>
                        <div class="share-network-list">

                        </div>
                    </div>
<!--

                    <p class="mb-0">মহাভারতের দেশ অন্বেষণসূত্রে এই গ্রহে এমন সব ধ্রুব-বিষয় উঠে এসেছে, তাকে দৃষ্টান্ত করেই আমরা আজকের সমস্ত অব্যবস্থাপনার প্রতি আপত্তি জানাতে পারি আর দার্ঢ্যসহকারে বলতে পারি, আদিতে এই দেশ এমন বিস্তৃত জিনিস ছিল না সেদিন এই দেশের সমস্ত ব্যবস্থার ভিত্তি ছিল পারস্পরিক সম্পর্ক, আর অবাধ ও স্বতঃস্ফূর্তসন্নতির মাধ্যমে প্রাণনা পেয়ে সমাজ হয়ে উঠেছিল এক ও সহযোগিতার ধারণা ছিল সেই প্রতিষ্ঠানের চালিকাশক্তি। এই দেশে আবারও সেই ব্যবস্থা প্রনয়ণ করতে হলে, আমাদের আলোর মশাল জোগাড় করতে হবে মহাভারতের কাছে থেকে। সেই প্রয়াস আন্তরিক হলে, মহাভারতের দেশ তার অ শরীরসহ নয়, আলোকদর্শনরূপে দাড়াবে ভবিষ্যযাত্রীদের সামনে।
                        আবুল ফজল মহাভারতের আখ্যান থেকে তুলে এনেছেন সেসব ঋষিবাক্য। সংস্কৃত শ্লোকের সহজ বোধগম্য বর্ণনায় গ্রহটি হয়ে উঠেছে সুখপাঠ্য। ফলে এটি কেবল পুরাণনির্ভর কাহিনিই থাকেনি, সম রাষ্ট্র ও রাজনৈতিক জটিল পরিস্থিতি থেকে উদ্ধারের নিশাও হয়তো মিলবে।</p> -->



                </div>


            </div>
    </section>



    <div v-if="modalOpen" @click="closeModal" class="modal-overlay">
      <div class="modal-container">
        <img :src="imageUrl" alt="Modal Image" />
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
        item:{},
        Breadcrumb:[],
    };
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


    async getItem(){
        var res = await this.callApi('get',`/api/products/${this.$route.params.id}`,[]);
        this.Breadcrumb = [{'route':'home','params':{},'text':'হোম'}];
        this.item = res.data;
        this.Breadcrumb.push(
                    {'route':'','params':{},'text':res.data.name}
                )
    },
  },
  mounted() {
    this.getItem();
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
