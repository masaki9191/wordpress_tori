<?php
/*////////////////////////////////////////////////////////////

  functions - post-excerpt.php

  投稿の表示　抜粋部分の文字数を任意に制限

--------------------------------------------------------------
  
 1. 抜粋部分の文字数を任意に制限

////////////////////////////////////////////////////////////*/


function winexcerpt($length) {
  global $post;
  $content = mb_substr(strip_tags($post->post_content),0,$length);
  return $content;
}

