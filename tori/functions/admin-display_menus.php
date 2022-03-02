<?php
/*/////////////////////////////////////////////////////////////

  functions - admin-display_menus.php

  管理画面　メニューの表示／非表示

---------------------------------------------------------------

  1. メニュー

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

** メニュー項目の変数の対応

  $menu[2]) : ダッシュボード
  $menu[4]) : メニューの線1
  $menu[5]) : 投稿
  $menu[10] : メディア
  $menu[15] : リンク
  $menu[20] : ページ
  $menu[25] : コメント
  $menu[59] : メニューの線2
  $menu[60] : テーマ
  $menu[65] : プラグイン
  $menu[70] : プロフィール
  $menu[75] : ツール
  $menu[80] : 設定
  $menu[90] : メニューの線3


ユーザー権限によって表示が変わる場合は条件で分岐

•• ユーザー権限の一覧
特権管理者 : super-admin
管理者　　 : Administrator : level_10
編集者　　 : Editor        : level_7
投稿者　　 : Author        : level_2
寄稿者　　 : Contributor   : level_1
購読者　　 : Subscriber    : level_0

/////////////////////////////////////////////////////////////*/


/* 1. メニュー
-------------------------------------------------------------*/
function remove_admin_menus() {
  global $menu;

  unset($menu[25]); //コメントを非表示

  // level10以外のユーザーの場合
  if( !current_user_can('administrator') ) {
    unset($menu[20]); // 固定ページ
    unset($menu[70]); // プロフィール
    unset($menu[75]); // ツール

    // バージョンチェックの表記を非表示
    add_filter('pre_site_transient_update_core', '__return_zero');

    // APIによるバージョンチェックの通信をさせない
    remove_action('wp_version_check', 'wp_version_check');
    remove_action('admin_init', '_maybe_update_core');
    remove_menu_page('wpcf7'); //Contact Form 7

    // MW WP Formをメニューから消す
    remove_menu_page('edit.php?post_type=mw-wp-form');
  }
  // if( current_user_can('author') ){
  //   unset($menu[5]); // 投稿
  //   remove_menu_page( 'edit.php?post_type=xxxxxxxxx' );
  // }
}
add_action('admin_menu', 'remove_admin_menus');



/* 2. 投稿のラベルを変更
-------------------------------------------------------------*/
 function custom_post_labels( $labels ) {
     $labels->name = 'ブログ'; // 投稿
     $labels->singular_name = 'ブログ'; // 投稿
     $labels->add_new = '新規追加'; // 新規追加
     $labels->add_new_item = '新規投稿を追加'; // 新規投稿を追加
     $labels->edit_item = '投稿の編集'; // 投稿の編集
     $labels->new_item = '新規投稿'; // 新規投稿
     $labels->view_item = '投稿を表示'; // 投稿を表示
     $labels->search_items = '投稿を検索'; // 投稿を検索
     $labels->not_found = '投稿が見つかりませんでした。'; // 投稿が見つかりませんでした。
     $labels->not_found_in_trash = 'ゴミ箱内に投稿が見つかりませんでした。'; // ゴミ箱内に投稿が見つかりませんでした。
     $labels->parent_item_colon = ''; // (なし)
     $labels->all_items = 'ブログ一覧'; // 投稿一覧
     $labels->archives = '投稿アーカイブ'; // 投稿アーカイブ
     $labels->insert_into_item = '投稿に挿入'; // 投稿に挿入
     $labels->uploaded_to_this_item = 'この投稿へのアップロード'; // この投稿へのアップロード
     $labels->featured_image = '画像'; // アイキャッチ画像
     $labels->set_featured_image = '画像を設定'; // アイキャッチ画像を設定
     $labels->remove_featured_image = '画像を削除'; // アイキャッチ画像を削除
     $labels->use_featured_image = '画像として使用'; // アイキャッチ画像として使用
     $labels->filter_items_list = '投稿リストの絞り込み'; // 投稿リストの絞り込み
     $labels->items_list_navigation = '投稿リストナビゲーション'; // 投稿リストナビゲーション
     $labels->items_list = '投稿リスト'; // 投稿リスト
     $labels->menu_name = 'ブログ'; // 投稿
     $labels->name_admin_bar = 'ブログ'; // 投稿
     return $labels;
 }
 add_filter( 'post_type_labels_post', 'custom_post_labels' );



/* 3. 投稿のカテゴリー・タグを削除
-------------------------------------------------------------*/
 function my_unregister_taxonomies(){
    global $wp_taxonomies;
 
    // 投稿機能から「カテゴリー」を削除 
    // if (!empty($wp_taxonomies['category']->object_type)) {
    //     foreach ($wp_taxonomies['category']->object_type as $i => $object_type) {
    //         if ($object_type == 'post') {
    //             unset($wp_taxonomies['category']->object_type[$i]);
    //         }
    //     }
    // }
 
    // 投稿機能から「タグ」を削除 
    //if (!empty($wp_taxonomies['post_tag']->object_type)) {
    //    foreach ($wp_taxonomies['post_tag']->object_type as $i => $object_type) {
    //        if ($object_type == 'post') {
    //            unset($wp_taxonomies['post_tag']->object_type[$i]);
    //        }
    //    }
    //}
 
    return true;
}
 add_action('init', 'my_unregister_taxonomies');



/* 4. メニューを追加
-------------------------------------------------------------*/
function add_admin_menu(){
    add_menu_page(
      '問い合わせデータ',
      '問い合わせデータ',
      '7', //編集者権限以上
      '/edit.php?post_type=mw-wp-form&page=mw-wp-form-save-data',
      '',
      '',
      '26' //位置
    );

    // $page_path = get_page_by_path('about');
    // $page_id = $page_path->ID;
    // add_menu_page(
    //     '採用情報',
    //     '採用情報',
    //     'edit_others_pages', //編集者以上
    //     'post.php?post='.$page_id.'&action=edit',
    //     '',
    //     '',
    //     '9.1'
    // );

    // $page_path = get_page_by_path('news');
    // $page_id = $page_path->ID;
    // add_menu_page(
    //     'お知らせの表示',
    //     'お知らせの表示',
    //     'edit_others_pages', //編集者以上
    //     'post.php?post='.$page_id.'&action=edit',
    //     '',
    //     '',
    //     '9.2'
    // );
}
add_action('admin_menu','add_admin_menu');
