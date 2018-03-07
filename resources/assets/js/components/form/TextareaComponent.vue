<template>
	<div class="form-group">
        <label v-show="label" class="control-label">{{ label }}</label>
        <textarea class="form-control" :name="name" v-model="$parent.form.data[name]" :placeholder="placeholder" :rows="rows"></textarea>
    </div>
</template>

<script>
    export default {
	    props: {
	    	name: { type: String },
	    	rows: { type: String, default: "5" },
	    	label: { type: String },
	    	placeholder: { type: String }
	    }

    }
</script>
