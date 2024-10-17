<?php

// //---------------------------------------------------------------------------
// //　HowTo追加
// //---------------------------------------------------------------------------
// add_action('admin_menu', 'add_manual_menu');

// function add_manual_menu() {
// 	add_menu_page('HowTo', 'HowTo', 'edit_posts', 'additional_page', 'page_html');
// }
// function page_html() {
// 	include __DIR__ . '/../original_menu.php';
// }





//---------------------------------------------------------------------------
//　管理画面menuカスタマイズ(ID:1以外)
//---------------------------------------------------------------------------
/*表示menu制限*/
function remove_menus () {
	global $menu;
	$current_user = wp_get_current_user();
	if($current_user -> ID != "1") {
		$restricted = array(
			__('ダッシュボード'),
			__('投稿'),
			// __('固定ページ'),
			__('コメント'),
			__('お問い合わせ'),
			__('外観'),
			__('プラグイン'),
			__('ユーザー'),
			__('ツール'),
			__('設定'),
		);
		end ($menu);
		while (prev($menu)){
			$value = explode(' ',$menu[key($menu)][0]);
			if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
				unset($menu[key($menu)]);
			}
		}
	remove_submenu_page('index.php','update-core.php'); //更新非表示
	// remove_submenu_page('edit.php','edit-tags.php?taxonomy=post_tag'); //タグ非表示
	// remove_submenu_page('edit.php?post_type=news', 'edit-tags.php?taxonomy=category&amp;post_type=news'); //カテゴリー非表示
	remove_menu_page('siteguard'); //SiteGuardプラグイン非表示
	remove_menu_page('wpcf7'); //contactform7プラグイン非表示
	remove_menu_page('vc-general');
	remove_menu_page('edit.php?post_type=smart-custom-fields');
	remove_menu_page('all-in-one-seo-pack/aioseop_class.php');
	remove_menu_page('ps-taxonomy-expander.php');
	}
	remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_menus', 999 );



/*表示オプション非表示*/
function my_admin_head(){
	global $current_user;
	// ID:1
	if($current_user->ID != "1") {
		echo '<style type="text/css">#contextual-help-link-wrap, #screen-options-link-wrap, li#menu-posts-works ul li:nth-child(5), li#toplevel_page_edit-post_type-acf-field-group{display:none;}</style>';
	}
}
add_action('admin_head', 'my_admin_head');



/*管理画面上部ツールバーに更新アイコンを非表示*/
function hide_adminbar_update_icon() {
	global $current_user;
	// ID:1
	if($current_user->ID != "1") {
	  global $wp_admin_bar; $wp_admin_bar->remove_menu( 'updates' );
  }
}
add_action( 'wp_before_admin_bar_render', 'hide_adminbar_update_icon' );



/*ダッシュボードにある「更新」を非表示*/
function update_remove_menus() {
	global $current_user;
	// ID:1
	if($current_user->ID != "1") {
    remove_submenu_page('index.php', 'update-core.php');
  }
}
add_action('admin_menu', 'update_remove_menus');

function update_nag_admin_only() {
	global $current_user;
	// ID:1
	if($current_user->ID != "1") {
    remove_action( 'admin_notices', 'update_nag', 3 );
  }
}
add_action( 'admin_init', 'update_nag_admin_only' );



/*固定ページテキストエディタ削除*/
function post_output_css() {
	$pt = get_post_type();
	if ($pt == 'page') { 
			$hide_postdiv_css = '<style type="text/css">#postdiv, #postdivrich { display: none; }</style>';
			echo $hide_postdiv_css;
	}
}
add_action('admin_head', 'post_output_css');






//---------------------------------------------------------------------------
//　管理画面内css
//---------------------------------------------------------------------------
function my_admin_style() {
	?>
	<style>



	/*----- 固定設定 -----*/
	table.smart-cf-field-type-image .smart-cf-upload-image img {
		max-width: 40%;
	}
	#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
		width: 240px !important;
	}
	#wpcontent, #wpfooter {
		margin-left: 240px !important;
	}
	#adminmenu .wp-submenu {
		left: 240px !important;
	}
	#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu {
		left: auto !important;
	}
	.aioseop_options #aiosp_keywords_wrapper,
	.aioseop_options #aiosp_custom_link_wrapper,
	.aioseop_options #aiosp_noindex_wrapper,
	.aioseop_options #aiosp_nofollow_wrapper,
	.aioseop_options #aiosp_disable_wrapper,
	.aioseop_options #aiosp_sitemap_exclude_wrapper,
	.aioseop_options #aiosp_sitemap_priority_wrapper,
	.aioseop_options #aiosp_sitemap_frequency_wrapper {
		display: none !important;
	}






</style>
<?php
}
add_action('admin_print_styles', 'my_admin_style'); ?>
