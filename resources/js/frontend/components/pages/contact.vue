<template>
    <div>
        <div class="container mt-4" style="padding-top: 50px;">

            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb ms-5 mt-3">

          <li class="breadcrumb-item active" aria-current="page">হোম</li>
          <li class="breadcrumb-item active text-dark" aria-current="page">যোগাযোগ</li>
        </ol>
      </nav>

        <h3><img :src="$asseturl+'assets/image/lore-bg.png'" alt="" srcset="" width="50px"/>&nbsp;&nbsp;&nbsp; যোগাযোগ করুন</h3>
        <p>আপনি আমাদের সাথে ই-মেইল, টেলিফোন, মোবাইল বা সরাসরি আমাদের হেড অফিসে যোগাযোগ করতে পারেন।</p>

        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="form-group">
                        <label for="name">আপনার নাম *</label>
                        <input type="text" class="form-control my-1" id="name" required>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between my-2">
                        <div class="form-group">
                            <label for="email">আপনার ইমেল *</label>
                            <input type="email" class="form-control my-1" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">যোগাযোগ নম্বর *</label>
                            <input type="text" class="form-control my-1" id="contact" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">বিষয় *</label>
                        <input type="text" class="form-control my-1" id="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">আপনার বার্তা *</label>
                        <textarea class="form-control my-1" id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" style="background-color: #ced9df;" class="btn  mt-2 w-100">পাঠান</button>
                </form>

            </div>



            <div class="col-md-6">
                <div class="align-items-center d-flex justify-content-between">
                    <div>
                        <h1 class="fs-4">হেড অফিসের ঠিকানাঃ
                        </h1>
                        <h5>৬১, দক্ষিন মালিবাগ,</h5>
                        <h5>ঢাকা- ১২১৭</h5>
                        <h5>Phone: +8800000000000</h5>
                    </div>
                    <div>
                        <img src="https://cdn3.iconfinder.com/data/icons/customer-and-technical-support-set-1/64/_call_contact_us_customer_service_customer_support_helpline-11-512.png"
                            width="200px" alt="" srcset="" class="img-fluid">
                    </div>

                </div>

                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.18784395416!2d90.41078231456152!3d23.740679984594184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b86023ce06ed%3A0x996ffa6238a6a471!2sPanjeree+Publications+Limited!5e0!3m2!1sbn!2sbd!4v1527654083278"
                        frameborder="0" style="width: 100%;border:0;height: 191px;margin-top: 13px;" allowfullscreen=""></iframe>

                </div>
            </div>



        </div>
    </div>
    </div>
</template>
