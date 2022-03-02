<?php
/*/////////////////////////////////////////////////////////////

  functions - widget-register.php
  
  ウィジェット　ウィジェットの登録

---------------------------------------------------------------

  1. ウィジェットを有効

---------------------------------------------------------------

  2. カスタムウィジェット

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    1. 事務所在所フラグ
    2. エリア別物件状況ウィジェット

///////////////////////////////////////////////////////////////



/*=============================================================

  1. ウィジェットを有効

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
** ウィジェットの説明　**

if (function_exists('register_sidebar')) 
  register_sidebar(array(
    'name' => 'サイドバーの名前。日本語可',
    'id' => 'サイドバーのID',
    'description' => 'サイドバーの説明',
    'class' => 'ウィジェットに追加するclass',
    'before_widget' => 'ウィジェットブロックの開始タグ',
    'after_widget' => 'ウィジェットブロックの終了タグ',
    'before_title' => 'タイトルの開始タグ',
    'after_title' => 'タイトルの終了タグ'
));

-------------------------------------------------------------*/

/* ブログサイド */
 if (function_exists('register_sidebar'))
   register_sidebar(array(
     'name' => 'ブログサイド',
     'id' => 'postside',
      'before_widget' => '<div>',
      'after_widget' => '</div>',
      'before_title' => '',
      'after_title' => ''
 ));



/*=============================================================

 2. カスタムウィジェット

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
** カスタムウィジェットのひな形　**

class MyWidgetItem extends WP_Widget {
  function MyWidgetItem() {
      parent::WP_Widget(false, $name = 'ウィジェット名');
    }
    function widget($args, $instance) {
        extract( $args );
        $example = apply_filters( 'widget_example', $instance['example'] );
      ?>
        <li <?php echo 'id="example"'; ?> >
          <?php echo '<p>' . $example . '</p>'; ?>
        </li>
        <?php
    }
    function update($new_instance, $old_instance) {
  $instance = $old_instance;
  $instance['example'] = trim($new_instance['example']);
        return $instance;
    }
    function form($instance) {
        $example = esc_attr($instance['example']);
        ?>
        <p>
           <label for="<?php echo $this->get_field_id('example'); ?>">
           <?php _e('入力項目:'); ?>
           </label>
           <textarea class="widefat" rows="16" colls="20" id="<?php echo $this->get_field_id('example'); ?>" name="<?php echo $this->get_field_name('example'); ?>">
  <?php echo $example; ?>
           </textarea>
        </p>
        <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("MyWidgetItem");'));

-------------------------------------------------------------*/


/* 1. --ウィジェットの名前 --
-------------------------------------------------------------*/


