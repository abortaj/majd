<template>
	<div class="panel">
		<div v-if="title" class="panel-heading">{{ title }}</div>
		<div class="panel-body">
			<slot></slot>
		</div>
	</div>
</template>

<script>
    export default {
	    props: {
	    	title: { type: String },
	        content: { type: String },
	    }, 
        mounted() {
        }
    }
</script>
