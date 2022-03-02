<?php
/*/////////////////////////////////////////////////////////////

  functions - admin.php

  その他の管理画面関連

/////////////////////////////////////////////////////////////*/

/* 1. 管理画面にCSSとJSを読込
-------------------------------------------------------------*/
function custom_admin($hook_suffix) {
  // CSS
  wp_enqueue_style('admin_css', get_template_directory_uri() . '/admin/admin.css');
  // JS
  wp_enqueue_script('admin_js', get_template_directory_uri() . '/admin/admin.js', array('jquery'));
}
add_action( 'admin_enqueue_scripts', 'custom_admin' );

//投稿ページのみ
// function custom_enqueue($hook_suffix) {
//   if( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) {
//     // JS
//     wp_enqueue_script('custom_js', get_template_directory_uri() . '/admin/admin.js', array('jquery'));
//     // CSS
//     wp_enqueue_style('custom_css', get_template_directory_uri() . '/admin/admin.css');
//   }
// }
// add_action( 'admin_enqueue_scripts', 'custom_enqueue' );


/* 2. タイトルのプレースホルダーを変更
-------------------------------------------------------------*/
// function change_default_title( $title ) {
//     $screen = get_current_screen();
//     if ( $screen->post_type == 'product' ) {
//         $title = '管理用タイトル';
//     }
//     return $title;
// }
// add_filter( 'enter_title_here', 'change_default_title' );

