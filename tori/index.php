<?php get_header(); ?>
<?php
if ( get_post_type() === 'post' ) {
  $post_type = 'post';
}
?>
<?php if($post_type === 'post') : ?>
<article class="blog_wrap blog_all">
  <div class="inner">
    <?php get_template_part('parts/catlist','post'); ?>
    <div class="archive_title_wrap txt_C">
      <?php if(is_post_type_archive('post')) { ?>
      <?php } elseif (is_category()) { ?>
      <?php } elseif(is_tag()) { ?>
      <h3 class="archive_title txt_Gothic">#<?php echo get_the_archive_title(); ?></h3>
      <?php } elseif(is_day()) { ?>
      <h3 class="archive_title txt_Gothic"><?php echo get_the_archive_title(); ?></h3>
      <?php } elseif(is_month()) { ?>
      <h3 class="archive_title txt_Gothic"><?php echo get_the_archive_title(); ?></h3>
      <?php } elseif(is_year()) { ?>
      <h3 class="archive_title txt_Gothic"><?php echo get_the_archive_title(); ?></h3>
      <?php } elseif(is_search()) { ?>
      <?php
      $searchResults = new WP_Query( "s=$s & showposts=-1 & post_type=$post_type" );
      $key = wp_specialchars( $s, 1 );
      $count = $searchResults->post_count;
      ?>
      <h3 class="search_h3">「<?php echo $key?>」で検索した結果：<?php echo $count ?> 件</h3>
      <?php }; ?>
    </div>
    <?php if(have_posts()): ?>
    <ul class="post_list">
      <?php while(have_posts()) : the_post();?>
      <?php get_template_part('parts/loop','post'); ?>
      <?php endwhile; ?>
    </ul>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
    <?php
    if ( function_exists( 'wp_pagenavi' ) ) ?>
    <div class="pagenavi_wrap">
    <div class="pagenavi_corner">
        <?php wp_pagenavi( array( 'query' => $the_query ) ); ?>
    </div>
  </div>
    <?php wp_reset_query(); ?>
  </div>
  <?php else : ?>
  <div class="no_mv contents">
    <?php
    if ( have_posts() ):
      while ( have_posts() ): the_post();
    ?>
    <?php the_content(); ?>
    <?php
    endwhile;
    endif;
    ?>
  </div>
  <!-- .contents -->
</article>
<?php endif; ?>
<?php get_footer(); ?>
