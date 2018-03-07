<template>
<li>
    <div class="item">
		<button class="btn btn-default border-none btn-xs"  @click="toggle">
			<i v-if="isFolder" :class="iconClass"></i>
			<i v-if="!isFolder" class="fa fa-file text-danger"></i>
			<span class="item-title">{{model.name}}</span>
		</button>
		<button class="btn btn-default btn-xs border-none pull-right" @click="deleteItem">
			<i class="icon-trash"></i>
		</button>
		<button class="btn btn-default btn-xs border-none pull-right" @click="details">
			<i class="icon-pencil"></i>
		</button>
    </div>
    <ul v-show="open" v-if="isFolder">
      <item  v-for="(value, key, index) in model.children" :model="value" v-bind:key="key" :parent="parent"></item>
    </ul>
  </li>

</template>
<script>

// define the item component
export default {
	name: 'item',
	props: {
		model: {},
		parent:'',
	},
	data(){
		return {
			open: false
		}
	},
	computed: {
		isFolder: function () {
			return this.model.children && this.model.children.length
		},
		iconClass(){
			return this.open ? 'fa fa-folder-open text-info hand' : 'fa fa-folder text-info hand'
		}
	},
	methods: {
		toggle: function () {
			if (this.isFolder) {
				this.open = !this.open
			}
	    },
		changeType: function () {
			if (!this.isFolder) {
				Vue.set(this.model, 'children', [])
				this.addChild()
				this.open = true
			}
		},
		addChild: function () {
			this.model.children.push({ name: 'new stuff' });
		},
		details: function () {
			this.parent.getItemDetails(this.model.id)
		},
		deleteItem: function () {
			this.parent.deleteItem(this.model.id)
		}
	}
}
</script>
