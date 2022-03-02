<?php
/*/////////////////////////////////////////////////////////////

  functions - admin-display_fields.php

  管理画面　フィールドの表示／非表示

/////////////////////////////////////////////////////////////*/

/* 1. 表示オプションの設定（記事一覧）
-------------------------------------------------------------*/
function remove_post_supports() {
    // remove_post_type_support( 'post', 'title' ); // タイトル
    // remove_post_type_support( 'post', 'editor' ); // 本文欄
    // remove_post_type_support( 'post', 'author' ); // 作成者
    // remove_post_type_support( 'post', 'thumbnail' ); // アイキャッチ
    // remove_post_type_support( 'post', 'excerpt' ); // 抜粋
    remove_post_type_support( 'post', 'trackbacks' ); // トラックバック
    // remove_post_type_support( 'post', 'custom-fields' ); // カスタムフィールド
    remove_post_type_support( 'post', 'comments' ); // コメント
    // remove_post_type_support( 'post', 'revisions' ); // リビジョン
    // remove_post_type_support( 'post', 'page-attributes' ); // ページ属性
    // remove_post_type_support( 'post', 'post-formats' ); // 投稿フォーマット

	// level10以外のユーザーの場合
	if( !current_user_can('administrator') ) {
	}
}
add_action( 'init', 'remove_post_supports' );


/* 2. 表示オプションの設定（編集画面）
-------------------------------------------------------------*/
function my_remove_meta_box() {
	// remove_meta_box('authordiv', 'post', 'normal'); // オーサー
	// remove_meta_box('categorydiv', 'post', 'normal'); // カテゴリー
	remove_meta_box('commentstatusdiv', 'post', 'normal'); // ディスカッション
	remove_meta_box('commentsdiv', 'post', 'normal'); // コメント
	// remove_meta_box('formatdiv', 'post', 'normal'); // フォーマット
	// remove_meta_box('pageparentdiv', 'post', 'normal'); // ページ属性
	// remove_meta_box('postcustom', 'post', 'normal'); // カスタムフィールド
	remove_meta_box('postexcerpt', 'post', 'normal'); // 抜粋
	// remove_meta_box('postimagediv', 'post', 'normal'); // アイキャッチ
	// remove_meta_box('revisionsdiv', 'post', 'normal'); // リビジョン
	// remove_meta_box('slugdiv', 'post', 'normal'); // スラッグ
	// remove_meta_box('tagsdiv-post_tag', 'post', 'normal'); // タグ
	remove_meta_box('trackbacksdiv', 'post', 'normal'); // トラックバック

	// level10以外のユーザーの場合
	if( !current_user_can('administrator') ) {
		remove_meta_box('authordiv', 'post', 'normal'); // オーサー
	}
}
add_action('admin_menu', 'my_remove_meta_box');

