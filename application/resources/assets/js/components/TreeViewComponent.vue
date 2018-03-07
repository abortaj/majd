<template>
	<ul class="tree-view">
		<tree-view-item :model="tree" :parent="$parent"></tree-view-item>
	</ul>
</template>
<script>
	import TreeViewItem from './TreeViewItem';
	export default {
		components: { TreeViewItem },
	    props: {
	    	tree: { type: Object },
	    }, 
	}
</script>>

<style>
.tree-view{
	margin-right: -40px;
}
.item {
    display: block;
    margin: 3px 0;
    padding: 5px 20px 5px 20px;
    text-decoration: none;
    border: 1px solid #ebebeb;
    background: #fff;
    border-radius: 3px;
}
.item-title{
	cursor: pointer;
	padding-right: 10px;
	padding-left: 10px;
}
.hand{
	cursor: pointer;

}
.border-none{
	border: 0px;
}
ul {
  list-style-type: none;
}
</style>