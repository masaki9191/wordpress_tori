<?php get_header(); ?>
<div class="p-confirm">
    <section >
        <h3 class="title u-center">
            確認画面
        </h3>
        <p class="text u-center">ご記入いただいた内容で送信いたします。<br>今一度内容をご確認いただき、<br class="pc-hidden">問題なければ送信ボタンを押してください。</p>
        <div class="contact-form">
            <?php echo do_shortcode ('[mwform_formkey key = "52"]'); ?>
        </div>  
    </section>
    <div class="wave">
        <canvas id="waveCanvas"></canvas>
    </div>
</div>
<?php get_footer(); ?>