<template>
	<div class="form-group">
		<label v-show="label" class="control-label">{{ label }}</label>
		<select class="form-control select2" :name="name" v-model="$parent.form.data[name]">
			<option v-for="(item,index) in list" :value="index">{{ item }}</option>
		</select>
	</div>
</template>

<script>
export default {
	props: {
		name: { type: String },
		label: { type: String },
		multiple: { type: Boolean, default: true  },
		list: { type: Object, default:{} },
	},
	mounted(){
		$("select[name="+this.name+"]").select2({
			theme: "bootstrap",
		});
	}
}
</script>
