<?php

//---------------------------------------------------------------------------
//　カスタム投稿追加
//---------------------------------------------------------------------------
//カスタム投稿の追加と、カテゴリー、タグ機能の追加
function my_custom_init() {

	//カスタム投稿「projects」の設定
	register_post_type( 'projects', array(
		'label' => 'PROJECTS',
		'public' => true,
		'supports' => array( 'title', 'thumbnail', 'author'),
		'menu_position' => 5,
		'has_archive' => true,
		'menu_icon' => 'dashicons-edit',
		'rewrite' => array(
			'slug' => '/projects',
			'with_front' => false
		)
	));


	//カスタム投稿「member」の設定
	register_post_type( 'member', array(
		'label' => 'MEMBER',
		'public' => true,
		'supports' => array( 'title', 'thumbnail', 'author'),
		'menu_position' => 5,
		'has_archive' => true,
		'menu_icon' => 'dashicons-edit',
		'rewrite' => array(
			'slug' => '/member',
			'with_front' => false
		)
	));

}
add_action( 'init', 'my_custom_init' );





//---------------------------------------------------------------------------
//　パーマリンクをIDベースに
//---------------------------------------------------------------------------
add_action('registered_post_type', function($post_type, $post_type_object) {
	switch ($post_type) {
		case 'projects':
			add_rewrite_tag('%projects_id%', '([0-9]+)', 'post_type=projects&p=');
			add_permastruct('projects', 'projects/%projects_id%', []);
			break;
		case 'member':
			add_rewrite_tag('%member_id%', '([0-9]+)', 'post_type=member&p=');
			add_permastruct('member', 'member/%member_id%', []);
			break;
	}
}, 10 ,2);

add_filter('post_type_link', function($post_link, $post, $leavename, $sample ){
	switch ($post->post_type) {
		case 'projects':
			return str_replace('%projects_id%', $post->ID, $post_link);
		case 'member':
			return str_replace('%member_id%', $post->ID, $post_link);	
	}
	return $post_link;
}, 10, 4);





//---------------------------------------------------------------------------
//　「ここにタイトルを追加します。」text変更
//---------------------------------------------------------------------------
function change_default_title( $title ) {
$screen = get_current_screen();
if ( $screen->post_type == 'projects' ) {
  $title = 'PROJECTS名を入力';
}
if ( $screen->post_type == 'member' ) {
  $title = 'MEMBER名を日本語で入力';
}
  return $title;
}
add_filter( 'enter_title_here', 'change_default_title' );





//---------------------------------------------------------------------------
//　パーマリンク項目非表示
//---------------------------------------------------------------------------
function hide_permalink(){
  $current_screen = get_current_screen();
	if(isset($current_screen) && $current_screen->post_type === 'member') {
    $style = '<style>#edit-slug-box {display: none !important; }</style>';
    echo $style;
  }
}
add_action('current_screen','hide_permalink');
