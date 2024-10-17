<?php

//---------------------------------------------------------------------------
// 定数 パス等の定義
//---------------------------------------------------------------------------

define('ASSETS', get_template_directory_uri() . '/assets');
define('IMG', get_template_directory_uri() . '/assets/img');





//---------------------------------------------------------------------------
//　基本設定
//---------------------------------------------------------------------------
/*wp_head 不要タグの削除*/
remove_action( 'wp_head', 'wp_generator' ); //WordPressのバージョン情報
remove_action( 'wp_head', 'rsd_link' ); //外部アプリケーションから情報を取得するタグ
remove_action( 'wp_head', 'wlwmanifest_link' ); //Windows Live Writer用のタグ
remove_action( 'wp_head', 'index_rel_link' ); //現在の文書に対する「索引」であることを示すタグ
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); //「?p=投稿ID」形式のデフォルトパーマリンクタグ

//「link rel=next」等のタグ
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

//フィード関連のタグ
remove_action( 'wp_head', 'feed_links', 2);
remove_action( 'wp_head', 'feed_links_extra', 3);

//絵文字関連タグ
remove_action( 'wp_head', 'print_emoji_detection_script', 7);
remove_action( 'admin_print_scripts', 'print_emoji_detection_script');
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles');
add_filter( 'emoji_svg_url', '__return_false' );

/*title自動生成*/
add_theme_support( 'title-tag' );
function wp_document_title_separator( $separator ) {
	$separator = '|';
	return $separator;
}
add_filter( 'document_title_separator', 'wp_document_title_separator' );

/*PHPのメモリー上限の変更*/
ini_set('memory_limit', '256M');

// wpautop 無効
remove_filter('the_content', 'wpautop');





//---------------------------------------------------------------------------
//　404ページ、topにリダイレクト
//---------------------------------------------------------------------------
add_action( 'template_redirect', 'is404_redirect_home' );
function is404_redirect_home() {
  if( is_404() ){
    wp_safe_redirect( home_url( '/' ) );
    exit();
  }
}





//---------------------------------------------------------------------------
//　特定固定ページ削除不可
//---------------------------------------------------------------------------
//ゴミ箱に移動する直前に実行する
add_action( "wp_trash_post", "no_delete_page",1,1 );
function no_delete_page($post_id) {
	global $post_type;

	//固定ページのみ対象
	if($post_type == 'page'){
			if(!strpos(wp_get_referer(), 'notrash=1')){
				$no_trash_flag = '&notrash=1';
			}
			wp_redirect( wp_get_referer() . $no_trash_flag );
			exit();
	}
}

//エラーメッセージ表示処理
add_action('admin_notices', 'trash_notice');
function trash_notice(){
	//パラメータがある時にメッセージを表示
	if(strpos(getenv('REQUEST_URI'), 'notrash=1')){
		echo '<div class="message error"><p>選択されたページを削除することはできません。</p></div>';
	}
}





//---------------------------------------------------------------------------
//　サムネイルを使えるようにする
//---------------------------------------------------------------------------
add_theme_support('post-thumbnails');

/* サムネイルのサイズを指定（追加）する */
// add_image_size( 'archive_thumbnail', 250, 200, false );





//---------------------------------------------------------------------------
//　media追加時、「画像」をデフォルトに変更
//---------------------------------------------------------------------------
function media_uploader_default_view() {
echo '<script type="text/javascript">jQuery(function( $ ){ ';
echo 'wp.media.view.Modal.prototype.on( \'ready\', function( ){ $( \'select.attachment-filters\' ).find( \'[value="all"]\').attr( \'selected\', true ).parent().trigger(\'change\'); });';
echo '});</script>'."\n";
}
add_action( 'admin_footer-post-new.php', 'media_uploader_default_view' );
add_action( 'admin_footer-post.php', 'media_uploader_default_view' );
