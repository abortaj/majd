<template>
	<div class="checkbox">
        <label><input type="checkbox" :name="name" v-model="$parent.form.data[name]">{{ label }}</label>
    </div>
</template>

<script>
    export default {
	    props: {
	    	name: { type: String },
	    	label: { type: String, default: '' },
	    },
    }
</script>
