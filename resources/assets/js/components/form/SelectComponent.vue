<template>
	<div class="form-group">
		<label v-show="label" class="control-label">{{ label }}</label>
		<select @change="onChange" class="form-control" :name="name" v-model="this.model?form.menu_id:$parent.form.data[name]">
			<option></option>
			<option v-for="(item,index) in list" :value="index">{{ item }}</option>     	
		</select>
	</div>
</template>

<script>
export default {

	props: {
		model:{type: String},
		name: { type: String },
		label: { type: String },
		list: { type: Object, default:{} },
	},
	methods:{
		onChange(){
			this.$emit('onChange');
		},
	}
}
</script>
