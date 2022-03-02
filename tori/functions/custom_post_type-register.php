<?php
/*/////////////////////////////////////////////////////////////

  functions - custom_post_type-register.php
  
  カスタム投稿タイプ　カスタム投稿タイプの登録

---------------------------------------------------------------

  1. カスタム投稿タイプの登録

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    1. STYLE

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

••カスタム投稿タイプの設定方法

  1）
  このファイルで、カスタム投稿タイプを設定
  タクソノミーが必要な場合はタクソノミーを設定

  2）
  カスタム投稿のアーカイブページはページ送りに問題があるので
  固定ページを使用して、アーカイブページを作成する。
  固定ページのスラッグとカスタム投稿のスラッグがかぶらないよう注意する。

  3)
  カスタム投稿ページのURLで親ページと同じディレクトリになるよう、
  タクソノミーページのリライトルールを設定。


///////////////////////////////////////////////////////////////


 /* カスタム投稿
 ------------------------------------------------------------*/
/* 著者
-------------------------------------------------------------*/
add_action('init', 'author_init');
function author_init()
{
  $labels = array(
    'name' => _x('著者', 'post type general name'),
    'singular_name' => _x('著者', 'post type singular name'),
    'add_new' => _x('新規追加', '著者'),
    'add_new_item' => __('新規追加'),
    'edit_item' => __('編集'),
    'new_item' => __('新しい記事'),
    'view_item' => __('記事を見てみる'),
    'search_items' => __('記事を探す'),
    'not_found' =>  __('記事はありません'),
    'not_found_in_trash' => __('ゴミ箱に記事はありません'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail','custom-fields','excerpt','revisions','page-attributes','comments'),
    'rewrite' => array('slug' => 'author'),
    'has_archive' => true
  );
  register_post_type('author',$args);
  flush_rewrite_rules( true );
}