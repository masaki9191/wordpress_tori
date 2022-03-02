(function () {
  tinymce.create('tinymce.plugins.MyButtons', {
    init: function (ed, url) {
      // WPURLの設定
      // var wpdir = '/wp/';
      // var wptheme = 'default/';

      // var host;
      // var url = window.location.href;
      // if (url.match(/\d+\./)) {
      //     var urlsplit = url.split('/');
      //     host = urlsplit[2] + '/' + urlsplit[3] + '/';
      // } else {
      //     host = window.location.hostname + '/';
      // }
      // var wpurl = "http://" + host + wpdir + "wp-content/themes/" + wptheme;

      // タイトル-見出し
      ed.addButton('button_t1', { //ボタンの変数名
        title: 'タイトル-見出し', //ボタンの名前または簡単な説明
        image: 'https://torigyo.com/wp-content/themes/tori/admin/editor_plugin/images/t1.png', //ボタン画像のURL
        cmd: 'button_t1' //ボタンのコマンド名
      });
      // タイトル-見出し
      ed.addCommand('button_t1', function () {
        var selected_text = ed.selection.getContent();
        var return_text = '';
        return_text = '<p class="subtitle01">' + selected_text + '</p>';
        ed.execCommand('mceInsertContent', 0, return_text);
      });

      // タイトル-天地ボーダー
      ed.addButton('button_t2', { //ボタンの変数名
        title: 'タイトル-天地ボーダー', //ボタンの名前または簡単な説明
        image: 'https://torigyo.com/wp-content/themes/tori/admin/editor_plugin/images/t2.png', //ボタン画像のURL
        cmd: 'button_t2' //ボタンのコマンド名
      });
      // タイトル-天地ボーダー
      ed.addCommand('button_t2', function () {
        var selected_text = ed.selection.getContent();
        var return_text = '';
        return_text = '<p class="subtitle02">' + selected_text + '</p>';
        ed.execCommand('mceInsertContent', 0, return_text);
      });

      // タイトル-アンダーライン
      ed.addButton('button_t3', { //ボタンの変数名
        title: 'タイトル-アンダーライン', //ボタンの名前または簡単な説明
        image: 'https://torigyo.com/wp-content/themes/tori/admin/editor_plugin/images/t3.png', //ボタン画像のURL
        cmd: 'button_t3' //ボタンのコマンド名
      });
      // タイトル-アンダーライン
      ed.addCommand('button_t3', function () {
        var selected_text = ed.selection.getContent();
        var return_text = '';
        return_text = '<span class="subtitle03">' + selected_text + '</span>';
        ed.execCommand('mceInsertContent', 0, return_text);
      });

      // タイトル-吹き出し
      ed.addButton('button_t4', { //ボタンの変数名
        title: 'タイトル-吹き出し', //ボタンの名前または簡単な説明
        image: 'https://torigyo.com/wp-content/themes/tori/admin/editor_plugin/images/t4.png', //ボタン画像のURL
        cmd: 'button_t4' //ボタンのコマンド名
      });
      // タイトル-吹き出し
      ed.addCommand('button_t4', function () {
        var selected_text = ed.selection.getContent();
        var return_text = '';
        return_text = '<p class="subtitle04">' + selected_text + '</p>';
        ed.execCommand('mceInsertContent', 0, return_text);
      });

      // 本文-蛍光ペン
      ed.addButton('button_t5', { //ボタンの変数名
        title: '本文-蛍光ペン', //ボタンの名前または簡単な説明
        image: 'https://torigyo.com/wp-content/themes/tori/admin/editor_plugin/images/t5.png', //ボタン画像のURL
        cmd: 'button_t5' //ボタンのコマンド名
      });
      // 本文-蛍光ペン
      ed.addCommand('button_t5', function () {
        var selected_text = ed.selection.getContent();
        var return_text = '';
        return_text = '<span class="subtitle05">' + selected_text + '</span>';
        ed.execCommand('mceInsertContent', 0, return_text);
      });

      // 本文-文字色メイン
      ed.addButton('button_t6', { //ボタンの変数名
        title: '本文-文字色メイン', //ボタンの名前または簡単な説明
        image: 'https://torigyo.com/wp-content/themes/tori/admin/editor_plugin/images/t6.png', //ボタン画像のURL
        cmd: 'button_t6' //ボタンのコマンド名
      });
      // 本文-文字色メイン
      ed.addCommand('button_t6', function () {
        var selected_text = ed.selection.getContent();
        var return_text = '';
        return_text = '<span class="subtitle06">' + selected_text + '</span>';
        ed.execCommand('mceInsertContent', 0, return_text);
      });

      // 本文-文字色サブ
      ed.addButton('button_t7', { //ボタンの変数名
        title: '本文-文字色サブ', //ボタンの名前または簡単な説明
        image: 'https://torigyo.com/wp-content/themes/tori/admin/editor_plugin/images/t7.png', //ボタン画像のURL
        cmd: 'button_t7' //ボタンのコマンド名
      });
      // 本文-文字色サブ
      ed.addCommand('button_t7', function () {
        var selected_text = ed.selection.getContent();
        var return_text = '';
        return_text = '<span class="subtitle07">' + selected_text + '</span>';
        ed.execCommand('mceInsertContent', 0, return_text);
      });

    },
    createControl: function (n, cm) {
      return null;
    },
  });
  /* Start the buttons */
  tinymce.PluginManager.add('custom_button_script', tinymce.plugins.MyButtons);
})();
