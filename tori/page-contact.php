<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	get_header();
/* Template Name: contact */
?>
    <div class="p-contact p-contact2"><div class="c-breadcrumbs">
            兵庫県神戸市のITとWEBが得意な行政書士！とり行政書士事務所 > お問い合わせ
        </div>
        <div class="c-fv">
            <div class="c-fv__title">
                <h2>お問い合わせ</h2>
                <p>CONTACT</p>
            </div>
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/profile/fv_img.jpg" alt="" class="c-fv__img">
        </div>      
        <section >
            <div class="contact-form mw_wp_form" id="contact">
      <div class="contact-form__inner">
                <?php echo do_shortcode ('[mwform_formkey key = "2290"]'); ?>
            </div>  
        </section>  
  <div class="wave">
    <canvas id="waveCanvas"></canvas>
  </div>
    </div>    
<?php get_footer(); ?>