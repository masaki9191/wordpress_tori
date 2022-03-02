<?php
/*/////////////////////////////////////////////////////////////

  functions - post-pre_get_posts.php

  投稿タイプ、ページタイプごとにアーカイブページの表示件数を変更

---------------------------------------------------------------
  
 1. 投稿タイプ、ページタイプごとにアーカイブページの表示件数を変更

/////////////////////////////////////////////////////////////*/

function custom_posts_per_page( $query ) {
  if ( is_mobile() ) {
    $postnum = 20;
  } else {
    $postnum = 15;
  }

  if ( is_admin() || ! $query->is_main_query() )
    return;

  //カスタム投稿タイプのアーカイブ（検索含む／タクソノミー含まない）
  if ( $query->is_post_type_archive() ) {
      $query->set('posts_per_page', $postnum);
      return;
  }
  //タクソノミー
  if ( $query->is_tax() ) {
      $query->set('posts_per_page', $postnum);
      return;
  }
  //カテゴリー
  if ( $query->is_category() ) {
      $query->set('posts_per_page', $postnum);
      return;
  }
  //アーカイブ（タグ）
  if ( $query->is_archive() ) {
      $query->set('posts_per_page', $postnum);
      return;
  }
  //検索
  if ( $query->is_search() ) {
      $query->set('posts_per_page', $postnum);
      return;
  }

  // if ( $query->is_archive() ) {
  //   $query->set( 'posts_per_page', $postnum );
  //   $query->set('post_status', 'publish');
  // }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );
?>