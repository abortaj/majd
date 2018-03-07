import axios from 'axios'

const base = window.location.href.split('#')[0].replace('admin','api/');

// Home
const url_info = base + 'info';

// User
const url_user_profile = base + 'profile';
const url_user_store = base + 'user';
const url_user_update = base + 'user/';
const url_user_get = base + 'user/';
const url_user_details = base + 'user/details/';
const url_roles_list = base + 'roles/dropdown'; 
const url_user_active = base + 'user/active/'; 

// Section
const url_section_get = base + 'sections/'; 
const url_section_delete = base + 'sections/'; 
const url_section_tree = base + 'sections/tree';
const url_section_list = base + 'sections/list';
const url_section_datatable = base + 'sections/datatable';

// Menus
const url_menu_item_get = base + 'menu-items/';
const url_menu_item_delete = base + 'menu-items/';
const url_menu_item_tree = base + 'menu-items/tree/';
const url_menu_list = base + 'menus';
const url_potential_list = base + 'potential-items/';
const url_menu_item_types_list = base + 'menu-item-types/';
// Posts
const url_post_status = base + 'post/status/'; 

// Roles
const url_role_store = base + 'role';
const url_role_update = base + 'role/';
const url_role_delete = base + 'role/';
const url_role_get = base + 'role/';

//Permissions

const url_my_permissions_get = base + 'my-permissions';

// Tags
const url_tag_store = base + 'tag';
const url_tag_update = base + 'tag/';
const url_tag_delete = base + 'tag/';
const url_tag_get = base + 'tag/';  
const url_tag_list = base + 'tags/list'; 

// Tag Types
const url_tag_type_store = base + 'tag-type';
const url_tag_type_update = base + 'tag-type/';
const url_tag_type_delete = base + 'tag-type/';
const url_tag_type_get = base + 'tag-type/';  
const url_tag_type_list = base + 'tag-types/list'; 

const url_comment_delete = base + 'comment/'; 

// Grids Urls
const url_user_datatable = base + 'users/datatable';
const url_role_datatable = base + 'roles/datatable';
const url_post_datatable = base + 'posts/datatable';
const url_tag_type_datatable = base + 'tag-types/datatable';
const url_tag_datatable = base + 'tags/datatable';
const url_comment_datatable = base + 'comments/datatable';

const url_video_upload = base + 'utilities/upload/video';

const url_settings_update = base + 'settings';
const url_settings_get = base + 'settings';

export default function(Vue) {

	Vue.api = {

		send(url, get){
			return  new Promise((resolve, reject) => {
				axios[get](url).then(response => resolve(response.data)).catch(error => reject(error));
			});
		},

		getInfo(){
			return this.send(url_info, 'get');
		},

		userProfile(){
			return this.send(url_user_profile, 'get');
		},

		sectionsTree(){
			let url =url_section_tree;
			return this.send(url, 'get');
		},
		sectionsList(){
			let url =url_section_list;
			return this.send(url, 'get');
		},
		getSectionDetails(id){
			let url = url_section_get + id;
			return this.send(url, 'get');
		},

		deleteSection(id){
			let url = url_section_get + id;
			return this.send(url, 'delete');
		},

		changeUserActive(id){
			let url = url_user_active + id;
			return this.send(url, 'post');
		},

		menuItemsTree(menu){
			let url = url_menu_item_tree  + menu ;
			return this.send(url, 'get');
		},

		getMenuItemDetails(id){
			let url = url_menu_item_get + id;
			return this.send(url, 'get');
		},

		deleteMenuItem(id){
			let url = url_menu_item_delete + id;
			return this.send(url, 'delete');
		},

		getMenuList(){
			let url = url_menu_list ;
			return this.send(url, 'get');
		},

		getPotentialItems(id){
			let url = url_potential_list + id;
			return this.send(url, 'get');
		},
		getMenuItemTypesList(){
			let url = url_menu_item_types_list;
			return this.send(url, 'get');
		},
		changePostStatus(id){
			let url = url_post_status + id;
			return this.send(url, 'post');
		},

		getUser(id){
			let url = url_user_get + id;
			return this.send(url, 'get');
		},

		getUserDetails(id){
			let url = url_user_details + id;
			return this.send(url, 'get');
		},

		getTagDetails(id){
			let url = url_tag_get + id;
			return this.send(url, 'get');
		},

		getRole(id){
			let url = url_role_get + id;
			return this.send(url, 'get');
		},

		getMyPermissions(){
			let url = url_my_permissions_get;
			return this.send(url, 'get');
		},

		getTagTypesList(){
			return this.send(url_tag_type_list, 'get');
		},

		getTagsList(){
			return this.send(url_tag_list, 'get');
		},

		getRolesList(){
			return this.send(url_roles_list, 'get');
		},

		getSettings(){
			let url = url_settings_get;
			return this.send(url, 'get');
		},

		deleteType(id){
			let url = url_tag_type_delete + id;
			return this.send(url, 'delete');
		},

		deleteTag(id){
			let url = url_tag_delete + id;
			return this.send(url, 'delete');
		},

		deleteComment(id){
			let url = url_comment_delete + id;
			return this.send(url, 'delete');
		},

		deleteRole(id){
			let url = url_role_delete + id;
			return this.send(url, 'delete');
		},

		getTagTypeDetails(id){
			let url = url_tag_type_get + id;
			return this.send(url, 'get');
		},

		url_user_datatable: url_user_datatable,
		url_role_datatable: url_role_datatable,
		url_post_datatable: url_post_datatable,
		url_tag_type_datatable: url_tag_type_datatable,
		url_tag_datatable: url_tag_datatable,
		url_comment_datatable: url_comment_datatable,

		url_user_store: url_user_store,
		url_user_update: url_user_update,

		url_tag_store: url_tag_store,
		url_tag_update: url_tag_update,

		url_tag_type_store: url_tag_type_store,
		url_tag_type_update: url_tag_type_update,

		url_settings_update: url_settings_update,
		
		video_upload:url_video_upload,

		url_role_store: url_role_store,
		url_role_update: url_role_update,

		url_section_datatable:url_section_datatable,
		base:base
	} 

	 Object.defineProperties(Vue.prototype, {
        $api: {
            get(){
                return Vue.api;
            },
        }
    });

}
