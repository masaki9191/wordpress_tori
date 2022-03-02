<?php
/*/////////////////////////////////////////////////////////////

  functions - custom_post_type-rewrite_url.php
  
  カスタム投稿タイプ　カスタム投稿タイプのURLをIDに変更

---------------------------------------------------------------

  1. カスタム投稿タイプのURLをIDに変更

  参考URL：カスタム投稿タイプ使用時のパーマリンクをPostnameからPost_Idにする（２）
  　　　　　https://webpaprika.com/387.html

/////////////////////////////////////////////////////////////*/


function myposttype_permalink( $post_link, $id = 0, $leavename ) {
    global $wp_rewrite;
    $post = &get_post($id);
    if ( is_wp_error( $post ) )
        return $post;
    $newlink = $wp_rewrite->get_extra_permastruct($post->post_type);
    $newlink = str_replace('%'.$post->post_type.'%', $post->ID, $newlink);
    $newlink = home_url(user_trailingslashit($newlink));
    return $newlink;
}
add_filter('post_type_link', 'myposttype_permalink', 1, 3);

function myposttype_rewrite() {
  global $wp_rewrite;
  /* 第1引数をサイトに合わせて編集 author の箇所をカスタム投稿の名前にする*/
  $wp_rewrite->add_rewrite_tag('%author%', '([0-9]+)', 'post_type=author&p=');
}
add_action('init', 'myposttype_rewrite');
