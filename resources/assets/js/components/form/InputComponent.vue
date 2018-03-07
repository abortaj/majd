<template>
	<div class="form-group">
        <label v-show="label" class="control-label">{{ label }}</label>
        <input :type="type" class="form-control" :name="name" v-model="$parent.form.data[name]" :placeholder="placeholder">
    </div>
</template>

<script>
    export default {
	    props: {
	    	name: { type: String },
	    	label: { type: String },
	    	type: { type: String, default:'text' },
	    	placeholder: { type: String },
	    },
    }
</script>
