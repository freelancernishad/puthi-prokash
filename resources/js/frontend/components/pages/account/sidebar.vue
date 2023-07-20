<template>

    <div class="col-lg-3 col-md-4 col-12 border-end  d-none d-md-block">
          <div class="pt-10 pe-lg-10">
            <!-- nav -->
            <ul class="nav flex-column nav-pills nav-pills-dark">
              <!-- nav item -->
              <li class="nav-item">
                <router-link class="nav-link active" aria-current="page" :to="{name:'orders'}"><i
                    class="feather-icon icon-shopping-bag me-2"></i>Your Orders</router-link>
              </li>
              <!-- nav item -->
              <li class="nav-item">
                <router-link class="nav-link" :to="{name:'accountsettings'}"><i
                    class="feather-icon icon-settings me-2"></i>Settings</router-link>
              </li>
              <!-- nav item -->
              <li class="nav-item">
                <router-link class="nav-link" :to="{name:'accountaddress'}"><i
                    class="feather-icon icon-map-pin me-2"></i>Address</router-link>
              </li>

              <!-- nav item -->
              <!-- <li class="nav-item">
                <router-link class="nav-link" :to="{name:'accountnotification'}"><i
                    class="feather-icon icon-bell me-2"></i>Notification</router-link>
              </li> -->
              <!-- nav item -->
              <li class="nav-item">
                <hr>
              </li>
              <!-- nav item -->
              <li class="nav-item">
                <router-link class="nav-link " :to="{name:'logout'}"><i class="feather-icon icon-log-out me-2"></i>Log out</router-link>
              </li>
            </ul>
          </div>
        </div>


</template>



<style scoped>
.nav-link.router-link-exact-active.router-link-active{
    background-color: #001e2b;
    color: white;
}
</style>
