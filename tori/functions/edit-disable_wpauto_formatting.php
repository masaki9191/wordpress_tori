<?php
/*/////////////////////////////////////////////////////////////

  functions - edit-disable_wpauto_formatting.php

  投稿の編集　自動整形の無効化

---------------------------------------------------------------
  
 1. 自動整形の無効化

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

wptextureize : 文字の自動変換
wpautop　　　 : 段落の自動整形

/////////////////////////////////////////////////////////////*/

/* wordpressの自動変換、整形を無効化 */
add_action('init', function() {
  /* タイトル */
  remove_filter('the_title', 'wptexturize');
  remove_filter('the_title', 'wpautop');
  /* 本文 */
  remove_filter('the_content', 'wptexturize');
  remove_filter('the_content', 'wpautop');
  /* 抜粋 */
  remove_filter('the_excerpt', 'wptexturize');
  remove_filter('the_excerpt', 'wpautop');
  /* リッチテキストエディタ */
  remove_filter('the_editor_content', 'wp_richedit_pre');

});

/* tine MCEの自動変換、整形を無効化 */
add_filter('tiny_mce_before_init', function($init) {
  $init['wpautop'] = false;
  // $init['apply_source_formatting'] = ture; //3.9i以降のtinyMCE4では削除されているのでコメントアウト
  $init['indent'] = true;
  $init['indent'] = true;
  return $init;
});

/*$init'valid_elements']          = '*[*]';
$init['extended_valid_elements'] = '*[*]';
$init['valid_children']          = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']';
$init['indent']                  = true;
$init['wpautop']                 = false;
$init['apply_source_formatting'] = ture;*/

?>