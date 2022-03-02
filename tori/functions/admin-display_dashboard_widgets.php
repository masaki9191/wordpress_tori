<?php
/*/////////////////////////////////////////////////////////////

  functions - admin-display_dashboard_widgets.php

  管理画面　ダッシュボードウィジェットの表示／非表示

---------------------------------------------------------------

  1. ダッシュボード

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

ユーザー権限によって表示が変わる場合は条件で分岐

•• ユーザー権限の一覧
特権管理者 : super-admin
管理者　　 : Administrator : level_10
編集者　　 : Editor        : level_7
投稿者　　 : Author        : level_2
寄稿者　　 : Contributor   : level_1
購読者　　 : Subscriber    : level_0

/////////////////////////////////////////////////////////////*/


function example_remove_dashboard_widgets() {
  global $wp_meta_boxes;
  //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); //アクティビティ
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');
?>