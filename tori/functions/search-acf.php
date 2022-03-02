<?php
function ACF_custom_searchadd( $where, &$wp_query ) {
    
     // ここにACFのカスタムフィードのフィールド名をひとつずつ配列に入力します
    $list_searc_acf_add = array('フィールド名１','フィールド名２','フィールド名３');

    global $wpdb;
 
    if ( empty( $where )){
        return $where;
    }
 
    $terms = $wp_query->query_vars[ 's' ];

    $exploded_terms = explode( ' ', $terms );
    if( $exploded_terms === FALSE || count( $exploded_terms ) == 0 ){
        $exploded_terms = array( 0 => $terms );
    }

    $where = '';
    
    foreach( $exploded_terms as $tag ) :
        $where .= " 
          AND (
            (".$wpdb->prefix."posts.post_title LIKE '%$tag%')
            OR (".$wpdb->prefix."posts.post_content LIKE '%$tag%')
            OR EXISTS (
              SELECT * FROM ".$wpdb->prefix."postmeta
                WHERE post_id = ".$wpdb->prefix."posts.ID
                  AND (";

        foreach ($list_searc_acf_add as $searcheable_acf) :
          if ($searcheable_acf == $list_searc_acf_add[0]):
            $where .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
          else :
            $where .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
          endif;
        endforeach;

          $where .= ")
            )
            OR EXISTS (
              SELECT * FROM ".$wpdb->prefix."comments
              WHERE comment_post_ID = ".$wpdb->prefix."posts.ID
                AND comment_content LIKE '%$tag%'
            )
            OR EXISTS (
              SELECT * FROM ".$wpdb->prefix."terms
              INNER JOIN ".$wpdb->prefix."term_taxonomy
                ON ".$wpdb->prefix."term_taxonomy.term_id = ".$wpdb->prefix."terms.term_id
              INNER JOIN ".$wpdb->prefix."term_relationships
                ON ".$wpdb->prefix."term_relationships.term_taxonomy_id = ".$wpdb->prefix."term_taxonomy.term_taxonomy_id
              WHERE (
              taxonomy = 'post_tag'
                OR taxonomy = 'category'              
                OR taxonomy = 'myCustomTax'
              )
                AND object_id = ".$wpdb->prefix."posts.ID
                AND ".$wpdb->prefix."terms.name LIKE '%$tag%'
            )
        )";
    endforeach;
    return $where;
}
add_filter( 'posts_search', 'ACF_custom_searchadd', 500, 2 );
