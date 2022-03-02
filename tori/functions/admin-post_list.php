<?php
/*/////////////////////////////////////////////////////////////

  functions - admin-post_list.php

  管理画面 記事一覧

/////////////////////////////////////////////////////////////*/


/* 1. 投稿記事一覧にカラムを追加する
------------------------------------------------------------*/
// 投稿記事一覧にアイキャッチ画像を追加 
function manage_posts_columns_thumbnail($columns) {
    $columns['thumbnail'] = __('Thumbnail');
    return $columns;
}
function thumbnail_add_column($column_name, $post_id) {
    if ( 'thumbnail' == $column_name) {
        //テーマで設定されているサムネイルを利用する場合
        $thum = get_the_post_thumbnail($post_id, '120');
        //Wordpressで設定されているサムネイル（小）を利用する場合
        //$thum = get_the_post_thumbnail($post_id, 'small', array( 'style'=>'width:75px;height:auto;' ));
    }
    if ( isset($thum) && $thum ) {
        echo $thum;
    }
}
// 投稿（post）
// add_filter( 'manage_posts_columns', 'manage_posts_columns_thumbnail' );//カラムの挿入
// add_action( 'manage_posts_custom_column', 'thumbnail_add_column', 10, 2 );//サムネイルの挿入

// お知らせ（news）
// add_filter( 'manage_news_posts_columns', 'manage_posts_columns_thumbnail' );
// add_action( 'manage_news_posts_custom_column', 'thumbnail_add_column', 10, 2 );

// メニュー（menu）
// add_filter( 'manage_menu_posts_columns', 'manage_posts_columns_thumbnail' );
// add_action( 'manage_menu_posts_custom_column', 'thumbnail_add_column', 10, 2 );

// スタッフ（staff）
// add_filter( 'manage_staff_posts_columns', 'manage_posts_columns_thumbnail' );
// add_action( 'manage_staff_posts_custom_column', 'thumbnail_add_column', 10, 2 );


// 投稿記事一覧にカテゴリーを追加 
function manage_posts_columns_category($columns) {
        $columns['mycategory'] = "カテゴリー";
        return $columns;
}
function add_news_column($column_name, $post_id){
    //カテゴリー名取得
    if( 'mycategory' == $column_name ) {
        $mycategory = get_the_term_list($post_id, 'news_category');
    }
    //該当カテゴリーがない場合「なし」を表示
    if ( isset($mycategory) && $mycategory ) {
        echo $mycategory."<br>";
    // } else {
    //     echo __('None');
    }
}
// お知らせ（news）
add_filter('manage_news_posts_columns', 'manage_posts_columns_category');
add_action('manage_news_posts_custom_column',  'add_news_column', 10, 2);


/* 投稿一覧の列の表示順を入れ替え */
// function custom_posts_columns_sort($columns){
//     $sort_number = array(
//         'cb'          => 0,
//         'slug'        => 1,
//         'title'       => 2,
//         'taxonomy-spot_area' => 3,
//         'taxonomy-spot_aim' => 4,
//         'taxonomy-spot_tag' => 5,
//         'date'        => 9
//     );
 
//     $sort = array();
//     foreach($columns as $key => $value){
//         $sort[] = $sort_number{$key};
//     }
//     array_multisort($sort,$columns);
//  
//     return $columns;
// }
// add_filter( 'manage_spot_posts_columns', 'custom_posts_columns_sort' );



/* 2. 記事のソート
------------------------------------------------------------*/
function set_post_types_admin_order( $wp_query ) {
    if (is_admin()) {
        $post_type = $wp_query->query['post_type'];
        if ( $post_type == 'news' ) {
            $wp_query->set('orderby', 'date');
            $wp_query->set('order', 'DESC');
        }
    }
}
add_filter('pre_get_posts', 'set_post_types_admin_order');

