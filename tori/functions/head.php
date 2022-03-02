<?php
/*////////////////////////////////////////////////////////////

  functions - head.php

  headの出力設定

--------------------------------------------------------------

  1. headの情報を出力

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    1. OGP Prefix
    2. メタデータの出力　(将来的にkeywords,descriptionなども含める)
    3. viewportの出力
    4. IE8+の互換表示
    5. IE8以下用に3つのスクリプトを記述
    6. OGPの出力
    7. twitter card
    8. ファビコン、ウェブクリップアイコン
    9. webフォント

--------------------------------------------------------------

  // 2. CSS、javascriptの登録と出力

--------------------------------------------------------------

  3. wp_headの各出力を制限

////////////////////////////////////////////////////////////*/


/*------------------------------------------------------------

 1. headの情報を出力

------------------------------------------------------------*/

/* 1. OGP Prefix
------------------------------------------------------------*/
function ogp_prefix () {
  if ( is_single() ) {
    $article = 'article';
  } else {
    $article = 'website';
  }
  echo ' prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# article: https://ogp.me/ns/' . $article . '#"';
}

 
/* 2. メタデータの出力
------------------------------------------------------------*/
function load_title () {
  if ( is_front_page() ){
    echo '<title>' . get_bloginfo( 'name' ) . '</title>' . "\n";

  } else if ( is_tax() ) {
    $current_term = single_term_title("", false);
    echo '<title>' . $current_term . ' | ' . get_bloginfo( 'name' ) . '</title>' . "\n";

  } elseif( is_archive() ){
    $archive_title = preg_replace( '/.+?: /', '', get_the_archive_title(), 1); //タイトルを整形
    echo '<title>' . $archive_title . ' | ' . get_bloginfo( 'name' ) . '</title>' . "\n";

  } else {
    echo '<title>' . wp_title( '|', false, 'right' ) . get_bloginfo( 'name' ) . '</title>' . "\n";
  }
}


/* 3. viewportの出力
------------------------------------------------------------*/
function load_viewport ( $viewwidth ) {
  $user_agent = $_SERVER["HTTP_USER_AGENT"];
  if( stripos( $user_agent, 'iPhone' ) !== false | stripos( $user_agent, 'android' ) !== false ) {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
  } elseif ( stripos( $user_agent, 'iPad' ) !== false ) {
    echo '<meta name="viewport" content="width='. $viewwidth .', maximum-scale=2.0, user-scalable=yes" />' . "\n";
  }
}


/* 4. IE8+の互換表示
*
*  IE8+に対して「IE=edge」と指定することで、利用できる最も互換性の
*  高い最新のエンジンを使用するよう指示
*
*  参考: 
*  https://www.modern.ie/en-us/performance/how-to-use-x-ua-compatible
*
------------------------------------------------------------*/
function enable_x_ua_compatible ( $bool ) {
  if ( $bool == true ){
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">' . "\n";
  }
}

/* 5.IE8以下用に3つのスクリプトを記述
* 
* html5shiv.js: IE8以下にHTML5の要素を認識するようにさせる
* respond.js: IE8以下にMedia Queriesの代替え機能を提供
* selectivizr.js: IE8以下にCSS3のセレクタを利用できるようにする
* 
------------------------------------------------------------*/
function load_ie8script ( $bool ) {
  if ( $bool == true ){
    $str = <<<EOF
<!--[if lt IE 9]>
<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
<![endif]-->
EOF;
    echo $str;
  }
}


/* 6. OGPの出力
------------------------------------------------------------*/
function load_ogp( $fbadmins, $og_title, $og_description, $og_sitename ) {
  echo '<!-- facebook OGP -->' . "\n";
  // og:title
  if( is_front_page() ) {
    if($og_title){
      echo '<meta property="og:title" content="' . $og_title . '">' . "\n";
    } else {
      echo '<meta property="og:title" content="' . get_bloginfo( 'name' ) . '">' . "\n";
    }
    // echo '<meta property="og:url" content="' . get_bloginfo( 'url' ) . '">' . "\n";
  } else {
    if($og_title){
      echo '<meta property="og:title" content="' . wp_title( '|', false, 'right' ) . $og_title . '">' . "\n";
    } else {
      echo '<meta property="og:title" content="' . wp_title( '|', false, 'right' ) . get_bloginfo( 'name' ) . '">' . "\n";
    }
  }

  // og:description
  if( $og_description ) {
    echo '<meta property="og:description" content="' . $og_description . '">' . "\n";
  } else {
    echo '<meta property="og:description" content="' . get_bloginfo( 'description' ) . '">' . "\n";
  }

  // og:image
  $image_id = get_post_thumbnail_id();
  if($image_id){
    $image_url = wp_get_attachment_image_src($image_id, true);
  }
  if( is_single() ) {
    echo '<meta property="og:image" content="' . $image_url[0] . '">' . "\n";  
  }else {
    echo '<meta property="og:image" content="' . get_template_directory_uri() . '/assets/img/common/ogp.jpg">' . "\n";
  }
  
  // og:type
  if( is_single() ){
    echo '<meta property="og:type" content="article">' . "\n";
  }else {
    echo '<meta property="og:type" content="website">' . "\n";
  }

  // og:site_name
  if( $og_sitename ) {
    echo '<meta property="og:site_name" content="' . $og_sitename . '">' . "\n";
  } else {
    echo '<meta property="og:site_name" content="' . get_bloginfo( 'name' ) . '">' . "\n";
  }

  // fb:admins
  echo '<meta property="fb:admins" content="' . $fbadmins . '">' . "\n";
}


/* 7. twitter card
------------------------------------------------------------*/
function load_twcard( $user, $card ) {
  echo '<!-- twitter card -->' . "\n";
  echo '<meta name="twitter:site" content="@' . $user . '">' . "\n";
  echo '<meta name="twitter:card" content="' . $card . '">' . "\n";
}


/* 8. ファビコン、ウェブクリップアイコン
------------------------------------------------------------*/
function load_webicons( $bool ) {
  if( $bool == true ){
    echo '<!-- ファビコン -->' . "\n";
    echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/images/favicon.ico">' . "\n";
    echo '<!-- ウェブクリップアイコン -->' . "\n";
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/images/webclip.png">' . "\n";
    echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/images/webclip.png">' . "\n";
  }
}


/* 9. webフォント（関数は暫定）
------------------------------------------------------------*/
function load_webfont( $fontpath, $fontname, $fontweight = '' ) {
  if( is_array( $fontweight ) ) {
    $weightstr = implode( ',', $fontweight );
  } else {
    $weightstr = $fontweight;
  }
  //echo $fontweight;

  if( $fontpath == 'google' ) {
    echo '<!-- webフォント -->' . "\n";
    if( !$weightstr ) {
      echo '<link href="https://fonts.googleapis.com/css?family=' . $fontname . '" rel="stylesheet" type="text/css">' . "\n";
    }else {
      echo '<link href="https://fonts.googleapis.com/css?family=' . $fontname . ':' . $weightstr . '" rel="stylesheet" type="text/css">' . "\n";
    }
  }
}

/* 10. bodyにクラス追加
------------------------------------------------------------*/
function pageslug_class($classes = '') {
  if (is_page()) {
    $page = get_post(get_the_ID());
    $classes[] = $page->post_name;
    if ($page->post_parent) {  // ページが子ページであったときの処理
      $classes[] = get_page_uri($page->post_parent) . '-' . $page->post_name;
      // 「親ページのスラッグ-子ページのスラッグ」という表示に調整
    }
  }
  return $classes;
}
add_filter('body_class', 'pageslug_class');


/*------------------------------------------------------------

 3. wp_headの各出力を制限

------------------------------------------------------------*/

/* バージョンの出力を停止
------------------------------------------------------------*/
function remove_cssjs_ver( $src ) {
  if( strpos( $src, '?ver=' ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );


/* ジェネレーターの出力を停止
------------------------------------------------------------*/
remove_action( 'wp_head', 'wp_generator' );


/* 絵文字の変換を停止
------------------------------------------------------------*/
function disable_emoji () {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emoji' );
