<template>

	<div class="wrapper" v-show="loaded">

		<header-component></header-component>

		<sidebar-component>
			<nav-item to="/home" :title="$t('sidebar.home')" icon="icon-home"></nav-item>
			<nav-item to="/sections" :title="$t('sidebar.sections')" icon="icon-layers" v-show="show_sections"></nav-item>
			<nav-item to="/sub-sections" :title="$t('sidebar.sub_sections')" icon="icon-layers" v-show="show_sections"></nav-item>
			<nav-item to="/users" :title="$t('sidebar.users')" icon="icon-people" v-show="show_users"></nav-item>
			<nav-item to="/posts" :title="$t('sidebar.posts')" icon="icon-pencil" v-show="show_posts"></nav-item>
			<nav-item to="/comments" :title="$t('sidebar.comments')" icon="icon-bubble" v-show="show_comments"></nav-item>
			<nav-item to="/tag-types" :title="$t('sidebar.tag_types')" icon="icon-folder" v-show="show_types"></nav-item>
			<nav-item to="/tags" :title="$t('sidebar.tags')" icon="icon-tag" v-show="show_tags"></nav-item>
			<nav-item to="/roles" :title="$t('sidebar.roles')" icon="icon-key" v-show="show_roles"></nav-item>
			<nav-item to="/menu-items" :title="$t('sidebar.menu_items')" icon="icon-menu" v-show="show_menus"></nav-item>
			<!--<nav-item to="/menus-item-types" :title="$t('sidebar.menu_item_types')" icon="icon-list-ul"></nav-item>
			<nav-item to="/menus" :title="$t('sidebar.menus')" icon="icon-list-alt"></nav-item>
			--><nav-item to="/info" :title="$t('sidebar.info')" icon="icon-info"></nav-item>
		</sidebar-component>

		<section>
			<router-view></router-view>
		</section>

		<footer-component></footer-component>

	</div>

 </template>

<script>
	import HeaderComponent from './components/HeaderComponent';
	import SidebarComponent from './components/SidebarComponent';
	import FooterComponent from './components/FooterComponent';
	import NavItem from './components/NavItem';

	export default {
		name: 'app',
		components:{ HeaderComponent, SidebarComponent, FooterComponent, NavItem },
		created(){
			this.$api.getMyPermissions().then(response => {
				this.$auth.setPermissions(response);
				this.show_sections=this.$auth.can('show-sections');
				this.show_users=this.$auth.can('show-users');
				this.show_posts=this.$auth.can('show-posts');
				this.show_tags=this.$auth.can('show-tags');
				this.show_types=this.$auth.can('show-types');
				this.show_comments=this.$auth.can('show-comments');
				this.show_roles=this.$auth.isAdmin();
				this.show_menus=this.$auth.isAdmin();
				this.loaded = true;
			});
		},
		data(){
			return {
				loaded: false,
				show_sections:false,
				show_users:false,
				show_posts:false,
				show_tags:false,
				show_types:false,
				show_comments:false,
				show_roles:false,
				show_menus:false,
			}
		},
	}
</script>