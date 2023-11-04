<template>
    <div>
        <div class="container mt-2" style="padding-top: 30px;">


      <Breadcrumb :pages="[{'route':'home','params':{},'text':'হোম'},{'route':'','params':{},'text': 'যোগাযোগ'}]"/>


        <h3><img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px"/>&nbsp;&nbsp;&nbsp; যোগাযোগ করুন</h3>
        <p>আপনি আমাদের সাথে ই-মেইল, টেলিফোন, মোবাইল বা সরাসরি আমাদের হেড অফিসে যোগাযোগ করতে পারেন।</p>

        <div class="row">
            <div class="col-md-6" style="padding: 0 50px;">
                <form>
                    <div class="form-group">
                        <label for="name">আপনার নাম *</label>
                        <input type="text" class="form-control my-1" id="name" v-model="form.name" required>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between my-2">
                        <div class="form-group">
                            <label for="email">আপনার ইমেল *</label>
                            <input type="email" class="form-control my-1" id="email"  v-model="form.email" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">যোগাযোগ নম্বর *</label>
                            <input type="text" class="form-control my-1" id="contact" v-model="form.contact" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">বিষয় *</label>
                        <input type="text" class="form-control my-1" id="subject"  v-model="form.subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">আপনার বার্তা *</label>
                        <textarea class="form-control my-1" id="message" rows="3"  v-model="form.message" required></textarea>
                    </div>
                    <button type="submit" style="background-color: #ced9df;" class="btn  mt-2 w-100">পাঠান</button>
                </form>

            </div>



            <div class="col-md-6" style="padding: 0 50px;">
                <div class="align-items-center d-flex justify-content-between">
                    <div>
                        <h1 class="fs-4">হেড অফিসের ঠিকানাঃ
                        </h1>
                        <h5>{{ preload_data.settings.address }}</h5>
                  <h5>{{ preload_data.settings.address2 }}</h5>
                  <h5>Phone: {{ preload_data.settings.phone1 }}</h5>
                    </div>
                    <div>
                        <img src="https://cdn3.iconfinder.com/data/icons/customer-and-technical-support-set-1/64/_call_contact_us_customer_service_customer_support_helpline-11-512.png"
                            width="150px" alt="" srcset="" class="img-fluid">
                    </div>

                </div>

                <div class="googleMapIframe" v-html="preload_data.settings.google_map">


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
                email:'',
                contact:'',
                subject:'',
                message:'',
            }
        }
    },
}
</script>


<style>
.googleMapIframe iframe {
    height: 235px;
}
</style>
