<?php
/*------------------------------------------------------------
 アーカイブタイトル
------------------------------------------------------------*/
function custom_archive_title( $title ){
    if ( is_post_type_archive() ) {
        if ( is_year() ) {
            $title = sprintf( __( '%s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
            // $title = post_type_archive_title( '', false ) . ' ' . sprintf( __( 'Year: %s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
        } elseif ( is_month() ) {
            $title = sprintf( __( '%s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
            // $title = post_type_archive_title( '', false ) . ' ' . sprintf( __( 'Month: %s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
        } elseif ( is_day() ) {
            $title = sprintf( __( '%s' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ) );
            // $title = post_type_archive_title( '', false ) . ' ' . sprintf( __( 'Day: %s' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ) );
        } else {
            $title = post_type_archive_title( '', false );
        }

    } else if ( is_category() ) {
        $title = single_term_title( '', false );

    } else if ( is_tag() ) {
        $title = single_term_title( '', false );

    } else if ( is_tax() ) {
        $title = single_term_title( '', false );

    } elseif ( is_year() ) {
        $title = sprintf( __( '%s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );

    } elseif ( is_month() ) {
        $title = sprintf( __( '%s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );

    } elseif ( is_day() ) {
        $title = sprintf( __( '%s' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ) );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'custom_archive_title', 10 );


/*------------------------------------------------------------
 検索
------------------------------------------------------------*/
// function custom_search($search, $wp_query) {
//     //サーチページ以外だったら終了
//     if (!$wp_query->is_search) return;
//     //投稿記事のみ検索

//     if (get_post_type() === 'post') {
//         $search .= " AND post_type = 'post'";
//     } elseif (get_post_type() === 'report') {
//         $search .= " AND post_type = 'report'";
//     }

//     return $search;
// }
// add_filter('posts_search','custom_search', 10, 2);

