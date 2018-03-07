<template>
	<router-link :to="to" exact tag="li">
		<a>
			<em :class="icon"></em>
			<span>{{ title }}</span>
		</a>
	</router-link>
</template>

<script>
    export default {
	    props: {
	    	to: { type: String },
	        title: { type: String },
	        icon: {  type: String },
	    }, 
        mounted() {
        }
    }
</script>
