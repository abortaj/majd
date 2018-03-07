// Ready translated locale messages
const messages = {

	ar: { 

		btn:{
			save: 'حقظ',
			add: 'إضافة',
			update: 'تعديل',
			delete: 'حذف',
			reset: 'إعادة',
		},
		
		alert:{
			success: 'لقد تمت العملية بنجاح.',
			fail: 'لقد فشلت عملية الرجاء المحاولة لاحقاً.',
			delete_comment:'هل أنت متأكد من حذف هذا التعليق وجميع الردود عليه؟',
		},

		sidebar: {
			home: 'الرئيسية',
			sections: 'الأقسام',
			users: 'المستخدمين',
			posts: 'المنشورات',
			comments: 'التعليقات',
			tags: 'كلمات البحث',
			tag_types: 'انواع الكلمات',
			info: 'حول الموقع',
			menu_items: 'عناصر القوائم',
			menu_item_types: 'انواع عناصر القوائم',
			menus: 'القوائم',
			roles: 'الأدوار',
			sub_sections:'الاقسام الفرعية',

		},

		login: {
			message: 'قم بتسجيل الدخول',
			email: 'البريد الإلكتروني',
			password: 'كلمة المرور',
			forgot_password: 'هل نسيت كلمة المرور؟',
			login: 'تسجيل الدخول',
		},

		home: {
			home: 'الرئيسية',
			user: 'مستخدم',
			post: 'منشور',
			comment: 'تعليق',
			file: 'ملف',
		},

		sections: {
			sections: 'الأقسام',
			new_section: 'قسم جديد',
			parent: 'الأب',
			name: 'الاسم',
			tooltip: 'تلميح',
			description: 'الوصف',
			tags: 'كلمات البحث',
			edit_section:'تعديل قسم',
			sub_sections:'الاقسام الفرعية',
		},

		menu_items: {
			menu_items: 'عناصر القوائم',
			new_menu_item: 'عنصر قائمة جديد',
			parent: 'الأب',
			order: 'الترتيب',
			type: 'النوع',
			link: 'الرابط',
			title: 'العنوان',
			menu: 'القائمة',
			item: 'العنصر',
		},
		users: {
			users: 'المستخدمين',
			new_user: 'مستخدم جديد',
		},
		new_user: {
			title: 'إنشاء مستخدم جديد',
		},
		edit_user: {
			title: 'تعديل حساب كستخدم',
		},
		user_form:{
			name: 'الاسم',
			email: 'البريد الإلكتروني',
			bio: 'لمحة عن المستخدم',
			password: 'كلمة المرور',
			roles: 'الأدوار',
		},
		show_user: {
			title: 'تفاصيل المستخدم',
			name: 'الاسم',
			email: 'البريد',
			created_at: 'تاريخ التسجيل',
			roles: 'الأدوار',
			bio: 'لمحة'
		},
		roles: {
			roles: 'الأدوار',
			new_role: 'دور جديد',
		},
		new_role: {
			title: 'إنشاء دور جديد',
		},
		edit_role: {
			title: 'تعديل دور',
		},
		role_form: {
			name: 'الاسم',
			admin_panel: 'الإدارة',
			update_settings: 'الإعدادات تحديث',
			media: 'الوسائط',
			show_user: 'عرض مستخدم',
			show_users: 'عرض المستخدمين',
			create_user: 'إنشاء مستخدم',
			update_user: 'تعديل مستخدم',
			delete_user: 'حذف مستخدم',
			control_user: 'تفعيل/تعطيل مستخدم',
			
			show_posts: 'عرض المنشورات',
			create_post: 'إنشاء منشور',
			update_post: 'تعديل منشور',
			delete_post: 'حذف منشور',
			update_own_post: 'تعديل منشور المستخدم',
			delete_own_post: 'حذف منشور المستخدم',
			control_post: 'تفعيل/تعطيل منشور',

			show_sections: 'عرض الأقسام',
			create_section: 'إنشاء قسم',
			update_section: 'تعديل قسم',
			delete_section: 'حذف قسم',

			show_tags: 'عرض الكلمات',
			create_tag: 'إنشاء كلمة بحث',
			update_tag: 'تعديل كلمة البحث',
			delete_tag: 'حذف كلمة البحث',

			show_types: 'عرض الأنواع',
			create_tag_type: 'إنشاء نوع',
			update_tag_type: 'تعديل نوع',
			delete_tag_type: 'حذف نوع',

			show_comments: 'عرض التعلقيات',
			create_comment: 'إنشاء تعليق',
			update_comment: 'تعديل التعليق',
			delete_comment: 'حذف التعليق',
			update_own_comment: 'تعديل تعليق المستخدم',
			delete_own_comment: 'حذف تعليق المستخدم',
			create_limited_comment: 'إنشاء تعليق محدود',
		},
		posts: {
			posts: 'المنشورات',
			new_post: 'منشور جديد',
		},
		comments: {
			title: 'التعليقات',
		},

		tags: {
			tags: 'كلمات البحث',
			new_tag: 'كلمة بحث جديدة',
		},
		create_tag: {
			title: 'إنشاء كلمة بحث',
		},
		edit_tag: {
			title: 'تعديل كلمة بحث',
		},
		tag_form:{
			name: 'الاسم',
			type: 'النوع',			
		},
		
		tag_types: {
			title: 'أنواع كلمات البحث',
			new: 'نوع جديد',
		},
		create_tag_type: {
			title: 'إنشاء نوع',
		},
		edit_tag_type: {
			title: 'تعديل نوع',
		},
		tag_type_form:{
			name: 'الاسم',			
		},

		account: {
			account: 'الحساب',
			profile: 'الملف الشخصي',
			email: 'البريد الإلكتروني',
			password: 'كلمة المرور',
			old_password: 'كلمة المرور القديمة',
			new_password: 'كلمةالمرور الجديدة',
			confirm: 'تأكيد كلمة المرور',
			name: 'الاسم',
			bio: 'لمحة عني',
			avatar: 'الصورة الشخصية',
			profile_hint: 'الرجاء استعمال الاسم والصورة الشخصية الحقيقية.',
			email_hint: 'يجب الإنتباه أنه عند تغيير بريدك الإلكتروني سوف تحتاجه لتسجيل الدخول في المرة القادمة',
			password_hint: 'الرجاء التأكد من إستعمال كلمة مرور قوية لضمان حماية حسابك بشكل أفضل.',
		},

		settings: {
			settings: 'الإعدادات',
			seo_title: 'عنوان الموقع',
			seo_description: 'وصف الموقع',
			seo_keywords: 'كلمات مفتاحية',
			email: 'البريد الإلكتروني',
			protocol: 'نوع الاتصال',
			password: 'كلمة المرور',	
			facebook_account: 'حساب فيسبوك',	
			twitter_account: 'حساب تويتر',	

		},
		error: {
			code: '404',
			text: 'لم يتم العثور على الصفحة المطلوبة.',
		},
		form:{
			drag_video_file:'اختر فيديو من هنا',
			drag_video_files:'اختر مجموعة من الفيديوهات هنا',
			drag_image_file:'اختر صورة هنا',
			drag_image_files:'اختر مجموعة من الصور هنا',
			max_file_reached:'تم الوصول للحد الاعلى من الملفات المسموح برفعها',
		},
		grid:{
			id:'ID',
			name:'الاسم',
			title:'العنوان',	
			user:'المستخدم',
			author:'الكاتب',	
			email:'البريد الإلكتروني',
			content:'المحتوى',
			type:'النوع',
			date:'تاريخ الإنشاء',
			status:'الحالة',
			actions:'التحكم',
			active: 'مفعل',
			inactive: 'غير مفعل'
		},
		dataTable:{
			"emptyTable":     "لايوجد بيانات",
		    "info":           "إظهار _START_ إلى _END_ من أصل _TOTAL_ سجل",
		    "infoEmpty":      "إظهار 0 إلى 0 من أصل 0 سجل",
		    "infoFiltered":   "(جميع السجلات _MAX_)",
		    "infoPostFix":    "",
		    "thousands":      ",",
		    "lengthMenu":     "إظهار _MENU_ سجل",
		    "loadingRecords": "الرجاء الإنتظار",
		    "processing":     "جاري المعالجة",
		    "search":         "بحث",
		    "zeroRecords":    "لا يوجد بيانات",
		    "paginate": {
		        "first":    "<i class='fa fa-forward'></i>",
		        "last":     "<i class='fa fa-backward'></i>",
		        "next":     "<i class='fa fa-caret-left'></i>",
		        "previous": "<i class='fa fa-caret-right'></i>",
		    },
		}

	}

}

export default messages;
