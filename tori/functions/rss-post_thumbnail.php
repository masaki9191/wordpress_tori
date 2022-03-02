<?php
/*/////////////////////////////////////////////////////////////

  functions - rss-post_thumbnail.php

  管理画面　カスタム投稿タイプ一覧でタクソノミーの絞り込み検索

---------------------------------------------------------------

  1. カスタム投稿タイプ一覧でタクソノミーの絞り込み検索

/////////////////////////////////////////////////////////////*/


function rss_post_thumbnail($content) {
  global $post;
    if(has_post_thumbnail($post->ID)) {
    $content = get_the_post_thumbnail( $post->ID );
  }
  return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

?>
