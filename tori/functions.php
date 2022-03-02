<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * 先に定義すべき定数
 */

// サイト情報
define( 'HOME', home_url( '/' ) );
define( 'TITLE', get_option( 'blogname' ) );

// 状態
define( 'IS_ADMIN', is_admin() );
define( 'IS_LOGIN', is_user_logged_in() );
define( 'IS_CUSTOMIZER', is_customize_preview() );

// テーマディレクトリパス
define( 'T_DIRE', get_template_directory() );
define( 'S_DIRE', get_stylesheet_directory() );
define( 'T_DIRE_URI', get_template_directory_uri() );
define( 'S_DIRE_URI', get_stylesheet_directory_uri() );

define( 'THEME_NOTE', 'clothes' );

error_reporting(0);

// 固定ページとMW WP Formでビジュアルモードを使用しない
function stop_rich_editor($editor) {
    global $typenow;
    global $post;
    if(in_array($typenow, array('page', 'post'))) {
        $editor = true;
    }
    return $editor;
}

add_filter('user_can_richedit', 'stop_rich_editor');

// エディター独自スタイル追加
//TinyMCE追加用のスタイルを初期化
if(!function_exists('initialize_tinymce_styles')) {
    function initialize_tinymce_styles($init_array) {
        //追加するスタイルの配列を作成
        $style_formats = array(
            array(
                'title' => '注釈',
                'inline' => 'span',
                'classes' => 'cmn_note'
            )
        );
        //JSONに変換
        $init_array['style_formats'] = json_encode($style_formats);
        return $init_array;
    }
}
add_filter('tiny_mce_before_init', 'initialize_tinymce_styles', 10000);

// オプションページを追加
if(function_exists('acf_add_options_page')) {
    $option_page = acf_add_options_page(array(
        'page_title' => 'テーマオプション', // 設定ページで表示される名前
        'menu_title' => 'テーマオプション', // ナビに表示される名前
        'menu_slug' => 'top_setting',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

// CSS・スクリプトの読み込み
function theme_add_files() {
    global $post;


    wp_enqueue_style('c-editor', T_DIRE_URI.'/editor-style.css', [], '1.0', 'all');
    if(is_front_page())
    {        
        wp_enqueue_style('c-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', [], '1.0', 'all');
        wp_enqueue_style('c-slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', [], '1.0', 'all');
    } 
    // WordPress本体のjquery.jsを読み込まない
    if(!is_admin()) {
        wp_deregister_script('jquery');
    }
    wp_enqueue_script('s-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', [], '1.0', false);
    wp_enqueue_script('s-aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], '1.0', false);
    if(is_front_page())
    {        
        wp_enqueue_script('s-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', [], '1.0', false);
        wp_enqueue_script('s-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/gsap.min.js', [], '1.0', false);        
    } 
    wp_enqueue_script('s-common', T_DIRE_URI.'/assets/js/common.js', [], '1.0', true);
    if(is_front_page())
    {        
        wp_enqueue_script('s-top', T_DIRE_URI.'/assets/js/top.js', [], '1.0', true); 
    } 
    else
    {
        wp_enqueue_script('s-wave', T_DIRE_URI.'/assets/js/wave.js', [], '1.0', true); 
    }
    if (is_single()) { 
        wp_enqueue_script('s-detail', T_DIRE_URI.'/assets/js/detail.js', [], '1.0', true); 
    }

}
add_action('wp_enqueue_scripts', 'theme_add_files');

function theme_custom_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( "s_thumbnail", 314, 236, true );
    add_image_size( "m_thumbnail", 318, 228, true );
    add_image_size( "x_thumbnail", 320, 244, true );
    set_post_thumbnail_size( 318, 228, true );
	add_editor_style('<?php echo T_DIRE_URI; ?>/assets/css/style.css');
}
add_action( 'after_setup_theme', 'theme_custom_setup' );

function replaceImagePath( $arg ) {
    $content = str_replace('"images/', '"' . T_DIRE_URI . '/assets/img/', $arg);
    $content = str_replace('"/images/', '"' . T_DIRE_URI . '/assets/img/', $content);
    $content = str_replace(', images/', ', ' . T_DIRE_URI . '/assets/img/', $content);
    $content = str_replace("('images/", "('". T_DIRE_URI . '/assets/img/', $content);
    return $content;
}

add_action('the_content', 'replaceImagePath');

add_filter('query_vars', function($vars) {
	$vars[] = 'blog_category';
	return $vars;
});

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


function custom_date($date) {
    $days = array('mon', 'tue', 'wed','thu','fri', 'sat', 'sun');
    $day = date_format($date,"w");
    return $date.".".$days[$day];
}

add_filter('custom_date', 'custom_date');


function feature_img($id) {
    $default_img_url = T_DIRE_URI."/assets/img/blog/index/blog_img.jpg";
    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($id) );
    $url =  $feat_image == "" ? $default_img_url :  $feat_image;
    return $url;
}

add_filter('feature_img', 'feature_img');

function limit_content_chr( $content, $limit=100 ) {
    return mb_strimwidth( strip_tags($content), 0, $limit, '...' );
}

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

add_filter ("p_contact_form", "do_shortcode");

function add_mwform_validation_rule( $Validation, $data ) {
    $validation_message = '※必須項目です';
    $Validation->set_rule( '会社名', 'noempty', array( 'message' => $validation_message ) );
    if ( empty( $data['姓'] ) ) {
        $Validation->set_rule( '姓', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['名'] ) ) {
        $Validation->set_rule( '名', 'noempty', array( 'message' => $validation_message ) );
    } 
    if ( empty( $data['セイ'] ) ) {
        $Validation->set_rule( 'セイ', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['メイ'] ) ) {
        $Validation->set_rule( 'メイ', 'noempty', array( 'message' => $validation_message ) );
    }
    $Validation->set_rule( '折り返しのご連絡方法', 'noempty', array( 'message' => $validation_message ) );
    $Validation->set_rule( '電話番号', 'noempty', array( 'message' => $validation_message ) );
    $Validation->set_rule( 'メールアドレス', 'noempty', array( 'message' => $validation_message ) );
    $Validation->set_rule( 'ご相談内容', 'noempty', array( 'message' => $validation_message ) );
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-52', 'add_mwform_validation_rule', 10, 2 );

?>

<?php
/*/////////////////////////////////////////////////////////////

  functions - functions.php

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
  
  使用しない外部functionファイルは//でコメントアウト。  

===============================================================

  1. head

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
  
  1. headの各情報出力
  2. rssにアイキャッチを表示

---------------------------------------------------------------

  2. カスタム投稿タイプ

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    1. カスタム投稿タイプの登録
    2. カスタム投稿タイプのURLをIDに変更

---------------------------------------------------------------

  3. ウィジェット

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    1. ウィジェットの登録とカスタムウィジェット

---------------------------------------------------------------

  4. アイキャッチ画像

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    1. アイキャッチ画像を有効
    2. オプション
      1. アイキャッチを自動設定

---------------------------------------------------------------

  5. 投稿の表示

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    1. 抜粋部分の文字数を任意に制限
    2. 投稿タイプ、ページタイプごとにアーカイブページの表示件数を変更

---------------------------------------------------------------

  6. 投稿の編集

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    1. editor-style.css
      1. editor-style.cssを有効
      2. 投稿タイプでeditor-style.cssを切り替え
      3. editor-style.cssを適用するクラスを指定
    2. 自動整形の無効化
    3. カテゴリーの入力チェック

---------------------------------------------------------------

  7. 管理画面

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    1. 項目の表示／非表示
      1. ダッシュボード
      2. メニュー

---------------------------------------------------------------

  8. 機能拡張

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    1. 記事の条件を拡張
    2. 投稿3日以内の記事にアイコンを表示

---------------------------------------------------------------

  9. パスワード保護

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    1. パスワード保護で保護中を削除
    2. パスワード保護でボタンのカスタマイズ 

/*=============================================================

  10. Etc

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    1. 特定の親ページと、その子ページにのみ条件を分岐する

/////////////////////////////////////////////////////////////*/


/*/////////////////////////////////////////////////////////////

 1. head

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

/* 1. headの各情報出力
-------------------------------------------------------------*/
locate_template( 'functions/head.php', true );


/* 2. CSS、javascriptの登録と出力
-------------------------------------------------------------*/
// locate_template( 'functions/css_js.php', true );


/* 3. rssにアイキャッチを表示
-------------------------------------------------------------*/
//locate_template( 'functions/rss-post_thumnail.php', true );

function rss_post_thumbnail( $content ) {
  global $post;
  if ( has_post_thumbnail( $post->ID ) ) {
    $content = get_the_post_thumbnail( $post->ID );
  }
  return $content;
}
add_filter( 'the_excerpt_rss', 'rss_post_thumbnail' );
add_filter( 'the_content_feed', 'rss_post_thumbnail' );



/* 1. アイキャッチ画像を有効
-------------------------------------------------------------*/
function mysetup() {
  add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mysetup' );


/* 2. アイキャッチ画像のサイズを設定
-------------------------------------------------------------*/
set_post_thumbnail_size( 900, 600, true );
//add_image_size( '600', 600, 400, true );
//add_image_size( '300', 300, 200, true );
//add_image_size( '120', 120, 120, true );


/* 2. オプション
-------------------------------------------------------------*/

//1. アイキャッチを自動設定
$thumnail_id = 8;
locate_template( 'functions/thumbnail-auto_setting.php', true );


/*=============================================================

  5. 投稿の編集

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

/* 1. editor-style.css
-------------------------------------------------------------*/

// 1. editor-style.cssを有効
// add_editor_style( 'editor-style.css' );

// editor-style.css のキャッシュ解消
function extend_tiny_mce_before_init( $mce_init ) {

  $mce_init[ 'cache_suffix' ] = 'v=' . time();

  return $mce_init;
}
add_filter( 'tiny_mce_before_init', 'extend_tiny_mce_before_init' );


// 2. 投稿タイプでeditor-style.cssを切り替え
//locate_template( 'functions/edit-switch_editor_style.php', true );


// 3. editor-style.cssを適用するクラスを指定　　※必要があれば編集
locate_template( 'functions/edit-editor.php', true );


/* 2. 自動整形の無効化
-------------------------------------------------------------*/
locate_template( 'functions/editor-disable_wpauto_formatting.php', true );


//ショートコードで囲んだ範囲のpタグを消す
add_shortcode('nop','nop_func');
function nop_func($atts, $content = null) {
  $content = str_replace( '<p>' , '' , $content );
  $content = str_replace( '</p>' , '' , $content );
  return $content;
}