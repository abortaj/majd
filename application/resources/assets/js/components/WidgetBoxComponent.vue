<template>
	<div class="col-lg-3 col-sm-6">
		<div :class="widgetClass">
			<div class="row row-table">
				<div :class="subClass">
					<em :class="iconClass"></em>
				</div>
				<div class="col-xs-8 pv-lg">
					<div class="h2 mt0">{{ count }}</div>
					<div class="text-uppercase">{{ title }}</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default{
		props:{
			count: { type:Number },
			title: { type:String },
			icon: { type:String	},
			color: { type:String, default: "primary" }
		},
		computed:{
			widgetClass(){
				return 'panel widget bg-'+this.color;
			},
			subClass(){
				return 'col-xs-4 text-center bg-'+this.color+'-dark pv-lg';
			},
			textClass(){
				return 'col-xs-4 text-center bg-'+this.color+'-dark pv-lg';
			},
			iconClass(){
				return this.icon + ' fa-3x';
			}
		}
	}
</script>