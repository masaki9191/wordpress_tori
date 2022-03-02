<?php
/*////////////////////////////////////////////////////////////

  functions - editor.php

--------------------------------------------------------------

  editor-style.cssの使用

--------------------------------------------------------------

  ビジュアルエディタのフォーマットにボタンを追加

--------------------------------------------------------------

  ビジュアルエディタのフォーマットのボタンを削除

--------------------------------------------------------------

  タグ削除を無効

////////////////////////////////////////////////////////////*/

/*------------------------------------------------------------
 editor-style.cssの使用
------------------------------------------------------------*/
// すべてのエディターに適用
add_editor_style( 'editor-style.css' );

// 一部のエディターに適用
function include_editor_css(){
    $screen = get_current_screen();
    $posttype = $screen->post_type;
    if( $posttype == 'post' ){
        //投稿用
        add_editor_style('editor-style.css');

    } elseif( $posttype == 'page' ) {

    //     //固定ページ
    //     // add_editor_style('editor-style-page.css');

    //     $post_id = 0;
    //     if ( isset( $_GET['post'] ) ) {
    //         $post_id = $_GET['post'];
    //     }
    //     $page_template = get_post_meta( $post_id, '_wp_page_template', true );
    //     if ( $page_template == 'about.php' ) {
    //         add_editor_style('editor-style-about.css');
    //     } elseif ( $page_template == 'service.php' ) {
    //         add_editor_style('editor-style-service.css');
    //     } else {
    //         add_editor_style('editor-style-page.css');
    //     }

    }
}
add_filter('admin_head', 'include_editor_css');



/*------------------------------------------------------------
 ビジュアルエディタのフォーマットにボタンを追加
------------------------------------------------------------*/
/* 独自ボタンを追加 */
function custom_mce_buttons( $buttons ) {
  $buttons[] = 'button_t1';
  $buttons[] = 'button_t2';
  $buttons[] = 'button_t3';
  $buttons[] = 'button_t4';
  $buttons[] = 'button_t5';
  $buttons[] = 'button_t6';
  $buttons[] = 'button_t7';
  return $buttons;
}

/* 独自ボタン用のスクリプトの読み込み */
function custom_mce_external_plugins( $plugin_array ) {
  $plugin_array['custom_button_script'] = get_template_directory_uri() . "/admin/editor_plugin/editor_plugin.js";
  return $plugin_array;
}
add_filter( 'mce_buttons', 'custom_mce_buttons' );
add_filter( 'mce_external_plugins', 'custom_mce_external_plugins' );

function admin_template_directory() {
  echo '<script>
  var template_directory = "'. get_template_directory_uri(). '";
  </script>'.PHP_EOL;
}
add_action('admin_print_scripts', 'admin_template_directory');


/*------------------------------------------------------------
 テキストエディタのフォーマットにボタンを追加
------------------------------------------------------------*/
function add_my_quicktag() 
{

?>
<script type="text/javascript">
QTags.addButton('headline1', '見出し1', '<p class="headline1">見出し1</p>');
QTags.addButton('headline2', '見出し2', '<p class="headline2"><span>見出し2</span></p>');
QTags.addButton('headline3', '見出し3', '<p class="headline3"><span>見出し3</span></p>');
QTags.addButton('headline4', '見出し4', '<p class="headline4"><span>見出し4</span></p>');  
</script>
<?php
}
add_action('admin_print_footer_scripts',  'add_my_quicktag');



/*------------------------------------------------------------
 タグ削除を無効
------------------------------------------------------------*/
function my_tiny_mce_before_init( $init_array ) {
    $init_array['valid_elements']          = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';
    return $init_array;
}
add_filter( 'tiny_mce_before_init' , 'my_tiny_mce_before_init' );




