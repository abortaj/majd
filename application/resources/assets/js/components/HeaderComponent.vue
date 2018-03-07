<template>
	<!-- top navbar-->
      <header class="topnavbar-wrapper">
         <!-- START Top Navbar-->
         <nav class="navbar topnavbar" role="navigation">
            <!-- START navbar header-->
            <div class="navbar-header">
               <a class="navbar-brand" href="#/home">
                  <div class="brand-logo">
                     <img class="img-responsive" src="adm/img/logo.png" alt="App Logo">
                  </div>
                  <div class="brand-logo-collapsed">
                     <img class="img-responsive" src="adm/img/logo-single.png" alt="App Logo">
                  </div>
               </a>
            </div>
            <!-- END navbar header-->
            <!-- START Nav wrapper-->
            <div class="nav-wrapper">
               <!-- START Left navbar-->
               <ul class="nav navbar-nav">
                 <li>
                    <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                    <a class="visible-xs sidebar-toggle" href="#" data-toggle-state="aside-toggled" data-no-persist="true">
                       <em class="fa fa-navicon"></em>
                    </a>
                 </li>

               </ul>
               <!-- END Left navbar-->
               <!-- START Right Navbar-->
               <ul class="nav navbar-nav navbar-right">
                  
                   <!-- Site Icon-->
                  <li>
                     <a :href="$api.base.replace('api/','')">
                        <em class="icon-globe"></em>
                     </a>
                  </li>

                  <!-- Account icon-->
                  <li>
                     <a href="#/account">
                        <em class="icon-user"></em>
                     </a>
                  </li>

                  <!-- Settings icon-->
                  <li v-show="update_settings">
                     <a href="#/settings">
                        <em class="icon-settings"></em>
                     </a>
                  </li>
                
                  <!-- START Offsidebar button-->
                  <li>
                     <a href="javascript:void(0)" @click='logout()'>
                        <em class="icon-lock"></em>
                     </a>
                  </li>
                  <!-- END Offsidebar menu-->
               </ul>
               <!-- END Right Navbar-->
            </div>
            <!-- END Nav wrapper-->
            <!-- START Search form-->
            <form class="navbar-form" role="search" action="search.html">
               <div class="form-group has-feedback">
                  <input class="form-control" type="text" placeholder="Type and hit enter ...">
                  <div class="fa fa-times form-control-feedback" data-search-dismiss=""></div>
               </div>
               <button class="hidden btn btn-default" type="submit">Submit</button>
            </form>
            <!-- END Search form-->
         </nav>
         <!-- END Top Navbar-->
      </header>
</template>

<script>
   export default {
      props:{
         home: { type: String }
      },
      methods:{
         logout(){
            axios.get('logout').then(response => {
               this.$auth.logout();
               window.location.reload();   
            })
            .catch(error => {
            });
         }
      },
      computed:{
         update_settings: function(){
            return this.$auth.can('update-settings');
         }
      }
   }
</script>
