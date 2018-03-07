<template>
	<div class="content-wrapper">
		<div id="loader" v-show="!loaded">
			<div id="spinner" class="sk-circle">
               <div class="sk-circle1 sk-child"></div>
               <div class="sk-circle2 sk-child"></div>
               <div class="sk-circle3 sk-child"></div>
               <div class="sk-circle4 sk-child"></div>
               <div class="sk-circle5 sk-child"></div>
               <div class="sk-circle6 sk-child"></div>
               <div class="sk-circle7 sk-child"></div>
               <div class="sk-circle8 sk-child"></div>
               <div class="sk-circle9 sk-child"></div>
               <div class="sk-circle10 sk-child"></div>
               <div class="sk-circle11 sk-child"></div>
               <div class="sk-circle12 sk-child"></div>
            </div>
         </div>
		<slot></slot>
	</div>         
</template>
<script>
export default {
	props:{
		loaded : { type: Boolean, default: false }
	}
}
</script>
<style>
	#loader{
	    position: fixed;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    overflow: hidden;
	    background: #ffffff;
	    z-index: 9999;
	    transition: opacity .65s;
	}
	#spinner{
		top: 40%;
	}
</style>
