<template>

    <div class="col-lg-3 col-md-4 col-12 border-end  d-none d-md-block">
          <div class="pt-10 pe-lg-10">
            <!-- nav -->
            <ul class="nav flex-column nav-pills nav-pills-dark">


              <!-- nav item -->
              <li class="nav-item">
                <router-link class="nav-link" :to="{name:'accountsettings'}"><i class="fa-regular fa-user"></i> &nbsp; My Profile</router-link>
              </li>


              <!-- nav item -->
              <li class="nav-item">
                <router-link class="nav-link" :to="{name:'accountaddress'}"><i class="fa-solid fa-location-dot"></i> &nbsp; Address</router-link>
              </li>


              <!-- nav item -->
              <li class="nav-item">
                <router-link class="nav-link active" aria-current="page" :to="{name:'orders'}"><i class="fa-solid fa-truck-fast"></i> &nbsp; Your Orders</router-link>
              </li>


              <!-- nav item -->
              <li class="nav-item">
                <router-link class="nav-link active" aria-current="page" :to="{name:'orders',query:{status:'canceled'}}"><i class="fa-regular fa-circle-xmark"></i> &nbsp; Canceled Orders</router-link>
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
                <router-link class="nav-link " :to="{name:'logout'}"><i class="fa-solid fa-right-from-bracket"></i> &nbsp; Log out</router-link>
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
