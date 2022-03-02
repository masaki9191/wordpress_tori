<?php
/*/////////////////////////////////////////////////////////////

  functions - edit-editor_style_class.php

  投稿の編集　editor-style.cssを適用するクラスを指定

---------------------------------------------------------------
  
 1. editor-style.cssを適用するクラスを指定

/////////////////////////////////////////////////////////////*/

add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );
function custom_editor_settings( $initArray ){
  $initArray[ 'body_class' ] = 'editor-area';
  $initArray['block_formats'] = "見出し1=h2; 見出し2=h3; 見出し3=h4; 見出し4=h5; 見出し5=h6; 段落=p; グループ=div;";
  return $initArray;
}
?>