<template>
	<div class="form-group">
		<label v-show="label" class="control-label">{{ label }}</label>
		<select class="form-control select2" :name="name" multiple="">
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
		selected: { type: Array, default:[] },
	},
	computed:{
		value(){
			return this.$parent.form.data[this.name];
		},
	},
	watch:{
		selected: function (value) {
			$("select[name="+this.name+"]").val(value).trigger('change');
		}
	},
	mounted(){
		$("select[name="+this.name+"]").select2({
			theme: "bootstrap",
			dir: "rtl"
		});
		$("select[name="+this.name+"]").on("change", (e) => {
			let value = $("select[name="+this.name+"]").val();
			this.$parent.form.data[this.name] = value;
		});
	},
}
</script>
