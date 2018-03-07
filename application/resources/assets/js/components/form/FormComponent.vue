<template>
	<form @submit.prevent="onSubmit" novalidate>
        
        <div class="alert alert-danger" role="alert" v-show="form.errors.any()">
            <ul>
                <li v-for="error in form.errors.errors">{{ error[0] }}</li>
            </ul>
        </div>

        <slot></slot>
		
		<button class="btn btn-info" type="submit" :disabled="form.isPosting" v-show="!update && !noSubmit">
            {{ $t('btn.add') }}
            <i v-show="form.isPosting" class="fa fa-spinner fa-spin"></i>
        </button>

        <button class="btn btn-success" type="submit" :disabled="form.isPosting" v-show="update && !noSubmit">
            {{ $t('btn.save') }}
            <i v-show="form.isPosting" class="fa fa-spinner fa-spin"></i>
        </button>

    </form>

</template>

<script>
    export default {
	    props: {
	    	form: { type: Object },
	    	update: { type: Boolean, default:false },
            noSubmit: { type: Boolean, default:false }

	    },
	    methods:{
	    	onSubmit(){
                this.$emit('onSubmit');
	    	},
            onReset(){
                this.update=false;
            },
	    }
    }
</script>
