<template>
	<div class="form-group">
        <label v-show="label" class="control-label">{{ label }}</label>
	    <multiselect 
	    	v-model="$parent.form.data[name]"
			:options="list"
			:multiple="multiple"
			:track-by="code"
			:label="title">		
		</multiselect>
    </div>
</template>

<script>
    export default {
	    props: {
	    	name: { type: String },
	    	label: { type: String },
	    	list: { type: Array, default:null },
	    	multiple: { type: Boolean, default:false },
	    	title : {type: String, default:"name"}, 
	    	code : {type: String, default:"id"},
	    }
    }
</script>
