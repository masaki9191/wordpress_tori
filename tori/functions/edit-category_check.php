<?php
/*
 * WordPressの投稿作成画面で必須項目を作る（空欄ならJavaScriptのアラート）
 */
add_action( 'admin_head-post-new.php', 'input_check' ); // 新規投稿画面でフック
add_action( 'admin_head-post.php', 'input_check' );     // 投稿編集画面でフック
function input_check() {
echo <<< EOF
<script type="text/javascript">
jQuery(document).ready(function($){
  if( 'post' == $('#post_type').val()/* || 'page' == $('#post_type').val()*/ ){ // post_type 判定。例は投稿と固定ページ。カスタム投稿タイプは適宜追加
    $("#post").submit(function(e){ // 更新あるいは下書き保存を押したとき
      if($("#taxonomy-category input:checked").length < 1 ) { // カテゴリーがチェックされているかどうか。条件を要確認。普通は設定したカテゴリーになるから要らない
        alert('カテゴリーを選択してください');
        $('.spinner').hide();
        $('#publish').removeClass('button-primary-disabled');
        $('#taxonomy-category').focus();
        return false;
      }
      if($("#taxonomy-category input:checked").length > 2 ) { // カテゴリーが2つ以上チェックされていないかどうか。条件を要確認。
        alert('2つ以上の親カテゴリは選択できません');
        $('.spinner').hide();
        $('#publish').removeClass('button-primary-disabled');
        $('#taxonomy-category').focus();
        return false;
      }
    });
  }
});
</script>
EOF;
}
?>