<?php get_header(); ?>
<div class="p-blog">
  <div class="c-breadcrumbs"> 兵庫県神戸市のITとWEBが得意な行政書士！とり行政書士事務所 > とりログ </div>
  <div class="c-fv">
    <div class="c-fv__title">
      <h2>とりログ</h2>
      <p>BLOG</p>
    </div>
    <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/index/fv_img.jpg" alt="" class="c-fv__img"> </div>
  <div class="p-blog__inner">
    <div class="p-blogDetail">
      <div class="p-blogDetail__category">
        <ul>
          <li><a href="<?php echo home_url(); ?>/blog/">すべての記事</a> </li>
          <?php wp_list_categories('show_option_none=&title_li=&depth=1&current_category='); ?>
        </ul>
      </div>
      <div class="p-blogDetail__row">
        <div class="p-blogDetail__left">
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
          <div class="p-blogDetail__lead">
            <p class="c-category">
              <?php
              $cats = get_the_category();
              foreach ( $cats as $cat ):
                echo $cat->cat_name;
              endforeach;
              ?>
            </p>
            <p class="c-blog__date"><?php echo custom_date(get_post_time('Y.m.d')); ?></p>
          </div>
          <p class="c-blog__title">
            <?php the_title(); ?>
          </p>
          <!--<img src="<?php echo feature_img(get_the_ID()); ?>" alt="" class="p-blogDetail__img">-->
          <div class="mceContentBody">
            <?php the_content(); ?>
          </div>
          <div class="p-blogDetail-person">
            <p class="u-center p-blogDetail-person__title"> この記事を書いた人 </p>
            <div class="p-blogDetail-person__row">
              <div class="p-blogDetail-person__img"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/detail/person.png" alt="辰巳 優子"> </div>
              <div class="p-blogDetail-person__txtarea">
                <p class="p-blogDetail-person__info">兵庫県行政書士会　神戸支部所属<br>行政書士　第 19302380 号<br>辰巳 優子（Tatsumi Yuko）</p>
                <!--<p class="p-blogDetail-person__txt">コメント入ります。コメント入ります。コメント入ります。コメント入ります。コメント入ります。コメント入ります。コメント入ります。コメント入ります。コメント入ります。</p>-->
              </div>
            </div>
          </div>
          <div class="p-blogDetail-go"> <a href="<?php echo HOME.'blog';?>" class="p-blogDetail-go__list u-center"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/detail/icon_left.svg" alt=""> <span>ブログ記事一覧に戻る</span> </a>
            <div class="p-blogDetail-go__row">
              <?php
              $previous = get_previous_post();
              $next = get_next_post();
              ?>
              <?php if ( get_previous_post() ) : ?>
              <a href="<?php the_permalink($previous); ?>" class="p-blogDetail-go__column prev"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/detail/circle_left.svg" alt=""> <span><?php echo limit_content_chr( get_the_title($previous),50); ?></span> </a>
              <?php endif;?>
              <?php if ( get_next_post() ) : ?>
              <a href="<?php the_permalink($next); ?>" class="p-blogDetail-go__column next"> <span><?php echo limit_content_chr( get_the_title($next),50); ?></span> <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/detail/circle_right.svg" alt=""> </a>
              <?php endif;?>
            </div>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <div class="p-blogDetail__right">
          <div class="p-blogDetail-cateList"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/detail/category_ttl.svg" alt="" class="">
            <ul>
              <?php
              $args = array(
                'post_type' => 'menu-item'
              );

              $categories = get_categories( $args );
              // print_r($categories);
              foreach ( $categories as $category ) {
                $category_link = get_category_link( $category->cat_ID );
                ?>
              <li><a href="<?php echo $category_link; ?>"><span><?php echo $category->name?></span><span>（<?php echo $category->count;?>）</span></a></li>
              <?php } ?>
            </ul>
            <div class="p-blogDetail__search">
              <form action="<?php bloginfo('url') ?>/blog/" method="get">
                <input type="text" placeholder="キーワードを入力" name="c_title">
                <button class="" type="submit"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/detail/icon_search.svg" alt=""> </button>
              </form>
            </div>
          </div>
          <div class="p-blogDetail-newList"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/detail/new_ttl.svg" alt="" class="">
            <div class="p-blogDetail-newList__content">
              <?php
              $args = array(
                'posts_per_page' => 1,
                'post_type' => 'post'
              );
              $posts = get_posts( $args );
              ?>
              <?php foreach($posts as $post): ?>
              <div class="c-blog">
                <p class="c-category ab">
                  <?php
                  $cats = get_the_category();
                  foreach ( $cats as $cat ):
                    echo $cat->cat_name;
                  endforeach;
                  ?>
                </p>
                <img src="<?php echo feature_img($post->ID); ?>" alt="" class="c-blog__img">
                <p class="c-blog__date"><?php echo custom_date(get_post_time('Y.m.d')); ?></p>
                <a class="c-blog__title" href="<?php the_permalink(); ?>"><?php echo limit_content_chr( get_the_title(),70); ?></a> </div>
              <?php wp_reset_postdata(); ?>
              <?php
              $args2 = array(
                'posts_per_page' => 2,
                'post_type' => 'post',
                'post__not_in' => array( $post->ID )
              );
              $myposts2 = get_posts( $args2 );
              ?>
              <ul>
                <?php foreach($myposts2 as $mypost2): ?>
                <li>
                  <div class="c-blog"> <img src="<?php echo feature_img(get_the_ID()); ?>" alt="" class="c-blog__img">
                    <div class="c-blog__txtarea">
                      <p class="c-blog__date"><?php echo custom_date(get_post_time('Y.m.d')); ?></p>
                      <a class="c-blog__title" href="<?php the_permalink(); ?>"><?php echo limit_content_chr( $mypost2->post_title,30); ?></a> </div>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
              <?php wp_reset_postdata(); ?>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="p-blogDetail-newList"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/detail/rank_ttl.svg" alt="" class="">
            <div class="p-blogDetail-newList__content">
              <?php
              $args = array(
                'posts_per_page' => 1,
                'post_type' => 'post',
                'meta_key' => 'wpb_post_views_count',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
              );
              $posts = get_posts( $args );
              ?>
              <?php foreach($posts as $post): ?>
              <div class="c-blog">
                <p class="c-category ab">
                  <?php
                  $cats = get_the_category();
                  foreach ( $cats as $cat ):
                    echo $cat->cat_name;
                  endforeach;
                  ?>
                </p>
                <img src="<?php echo feature_img(get_the_ID()); ?>" alt="" class="c-blog__img">
                <p class="c-blog__date"><?php echo custom_date(get_post_time('Y.m.d')); ?></p>
                <a class="c-blog__title" href="<?php the_permalink(); ?>"><?php echo limit_content_chr( get_the_title(),70); ?></a> </div>
              <?php wp_reset_postdata(); ?>
              <?php
              $args2 = array(
                'posts_per_page' => 2,
                'post_type' => 'post',
                'post__not_in' => array( $post->ID ),
                'meta_key' => 'wpb_post_views_count',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
              );
              $myposts2 = get_posts( $args2 );
              ?>
              <ul>
                <?php foreach($myposts2 as $mypost2): ?>
                <li>
                  <div class="c-blog"> <img src="<?php echo feature_img(get_the_ID()); ?>" alt="" class="c-blog__img">
                    <div class="c-blog__txtarea">
                      <p class="c-blog__date"><?php echo custom_date(get_post_time('Y.m.d')); ?></p>
                      <a class="c-blog__title" href="<?php the_permalink(); ?>"><?php echo limit_content_chr( $mypost2->post_title,30); ?></a> </div>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
              <?php wp_reset_postdata(); ?>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="p-blogDetail-archieve"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/detail/archive_ttl.svg" alt="" class="">
            <div class="p-blogDetail-archieve__list">
              <?php
              $year_prev = null;
              $months = $wpdb->get_results( "SELECT DISTINCT MONTH( post_date ) AS month ,
                                                                        YEAR( post_date ) AS year,
                                                                        COUNT( id ) as post_count FROM $wpdb->posts
                                                                        WHERE post_status = 'publish' and post_date <= now( )
                                                                        and post_type = 'post'
                                                                        GROUP BY month , year
                                                                        ORDER BY post_date DESC" );
              foreach ( $months as $month ):
                $year_current = $month->year;
              if ( $year_current != $year_prev ) {
                if ( $year_prev != null ) {
                  ?>
              </ul>
            </div>
            <?php } ?>
            <div class="p-blogDetail__collapse">
              <p class="js-collapse"><?php echo $month->year; ?>年</p>
              <ul>
                <?php } ?>
                <li> <a href="<?php bloginfo('url') ?>/blog/?c_y=<?php echo $month->year; ?>&c_m=<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>"> <?php echo date("n", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>月
                  (<?php echo $month->post_count; ?>) </a> </li>
                <?php
                $year_prev = $year_current;
                endforeach;
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="p-blogDetail-relate">
      <p class="p-blogDetail-relate__title u-center">この記事のあとによく読まれている記事</p>
      <?php
      $cat_info = get_category( $cat );
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'paged' => $paged,
        'offset' => 1,
        'cat' => $cat_info->cat_ID
      );
      ?>
      <?php $related_posts = get_posts($args); ?>
      <div class="p-blogDetail-relate__list">
        <?php foreach($related_posts as $post): ?>
        <div class="c-blog">
          <p class="c-category ab">
            <?php
            $cats = get_the_category();
            foreach ( $cats as $cat ):
              echo $cat->cat_name;
            endforeach;
            ?>
          </p>
          <img src="<?php echo feature_img(get_the_ID());; ?>" alt="" class="c-blog__img">
          <div class="c-blog__txtarea">
            <p class="c-blog__date"><?php echo custom_date(get_post_time('Y.m.d')); ?></p>
            <a class="c-blog__title" href="<?php the_permalink(); ?>"><?php echo limit_content_chr( get_the_title(),30); ?></a> </div>
        </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</div>
<?php $has_bg = true; ?>
<?php get_template_part('inc', 'contact'); ?>
</div>
<?php get_footer(); ?>
