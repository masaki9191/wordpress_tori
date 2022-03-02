<?php
/*------------------------------------------------------------
 WordPress Popular Postsカスタマイズ
------------------------------------------------------------*/
function my_wpp_custom_html( $mostpopular, $instance ) {
  //管理画面を除外
  if ( is_admin() ) {
    return;
  }

  $output = '';

  foreach ( $mostpopular as $post ) {
    // URLの取得
    $post_url = get_the_permalink( $post->id );

    // 画像の取得
    $img_id = get_post_thumbnail_id( $post->id );
    $img = wp_get_attachment_image_src( $img_id, 'medium' );
    $img_src = $img[ 0 ];
    // $imghtml = '<img src="'. $img_src .'" alt="'. $post->title .'" class="image">';
    
    // 投稿日の取得
    $date = get_the_date('Y.m.d');
    $post_date = get_the_date('Y.m.d'). '<span class="w">' . mb_strtoupper(get_post_time('D')) . '</span>';

    // カテゴリーの取得
    $cat = get_the_category($post->id);
    $cat = $cat[0];
    $cat_name = $cat->cat_name;
    $post_cat = '<div class="post_cat">'. $cat_name .'</div>';
    
    // HTML
    $output .= '<div class="post">';
    $output .= '<a href="' . get_the_permalink( $post->id ) . '" class="link_box">';
    $output .= '<div class="thumbnail_wrap"><div class="thumbnail" style="background-image: url(' . $img_src . ');"></div></div>'; //画像
    $output .= '<div class="post_meta">';
    $output .= $post_cat;
    $output .= '<div class="post_date">' . $date . '</div>';
    $output .= '<div class="post_title trunk8_line2">' . esc_html( $post->title ) . '</div>'; //タイトル
    $output .= '</div>'; //.post_meta END
    $output .= '</a>';
    $output .= '</div>'; //.post_box END
  }

  return $output;
}
add_filter( 'wpp_custom_html', 'my_wpp_custom_html', 10, 2 );