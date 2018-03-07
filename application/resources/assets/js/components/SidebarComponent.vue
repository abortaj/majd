<template>
   <aside class="aside">
      <!-- START Sidebar (left)-->
      <div class="aside-inner">
         <nav class="sidebar" data-sidebar-anyclick-close="">
            <!-- START sidebar nav-->
            <ul class="nav">
               <!-- Iterates over all sidebar items-->
               <li class="nav-heading ">
                  <span>Main Navigation</span>
               </li>
               <slot></slot>
            </ul>
            <!-- END sidebar nav-->
         </nav>
      </div>
      <!-- END Sidebar (left)-->
   </aside>

</template>

<script>
    export default {
        mounted() {
        }
    }
</script>
