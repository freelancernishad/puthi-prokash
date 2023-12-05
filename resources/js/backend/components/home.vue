<template>
    <div>
        <!-- <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>-->

        <preloader  v-if="preLooding"/>
        <Breadcrumbs brename="ড্যাশবোর্ড"/>





        <div class="row gutters-20">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-fb hover-fb">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Total User</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.totalUsers }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-twitter hover-twitter">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-regular fa-users"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Total Unique Customer</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.totalUniqueCustomers }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-gplus hover-gplus">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Total Writer</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.totalWriters }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-linkedin hover-linked">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-duotone fa-book-open-cover"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Total Books</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.totalBooks }}</div>
                            </div>
                        </div>
                    </div>
                </div>





        <div class="row gutters-20">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-fb hover-fb">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Total Order</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.totalOrders }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-twitter hover-twitter">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-regular fa-users"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Todays Order</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.todayOrders }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-warning hover-gplus">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Pending Order</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.pendingOrders }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-linkedin hover-linked">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-duotone fa-book-open-cover"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Processing Order</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.processingOrders }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-success hover-linked">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-duotone fa-book-open-cover"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Completed Order</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.completedOrders }}</div>
                            </div>
                        </div>
                    </div>


                </div>



        <div class="row gutters-20">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-fb hover-fb">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Total Visitors</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.visitors.totalUniqueVisits }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-twitter hover-twitter">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-regular fa-users"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Todays Visitors</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.visitors.dailyUniqueVisits }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-warning hover-gplus">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Weekly visitors</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.visitors.weeklyUniqueVisits }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-linkedin hover-linked">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-duotone fa-book-open-cover"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Monthly visitors</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.visitors.monthlyUniqueVisits }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-success hover-linked">
                                <div class="media media-none--lg">
                                    <div class="social-icon">
                                        <i class="fa-duotone fa-book-open-cover"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Yearly Visitors</h6>
                                    </div>
                                </div>
                                <div class="social-like">{{ stats.visitors.yearlyUniqueVisits }}</div>
                            </div>
                        </div>
                    </div>


                </div>







        </div>
    </div>
</template>
<script>

export default {
    computed: {

    },
    async created() {

    },
    data() {
        return {
            preLooding:false,
            stats:{},

        };
    },
    mounted() {

        this.preLooding = false

        this.getDashboardStats();

    },
    methods: {


        async getDashboardStats(){
            var res = await this.callApi('get',`/api/dashboard-stats`,[]);
            this.stats = res.data
        }



    },
};
</script>

