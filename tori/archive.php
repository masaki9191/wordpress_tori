<?php get_header(); ?>
    <div class="p-blog">
        <div class="c-breadcrumbs">
            兵庫県神戸市のITとWEBが得意な行政書士！とり行政書士事務所 > とりログ
        </div>
        <div class="c-fv">
            <div class="c-fv__title">
                <h2>とりログ</h2>
                <p>BLOG</p>
            </div>
            <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/index/fv_img.jpg" alt="" class="c-fv__img">
        </div>
        <div class="p-blog__inner">
            <section class="main">
                <div class="main__title u-center">
                
                    <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/index/icon_bird.png" alt="">
                    <p>記事一覧</p>
                </div>
                <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                if($paged == 1):
                $args = array(
                    'post_type'=>'post',
                    'posts_per_page' => 1
                );
                $posts = get_posts( $args );
                $post_ids = [];
                ?>
                <?php foreach($posts as $post): ?>
                <a href="<?php the_permalink(); ?>" class="main-new">
                    <?php array_push($post_ids, $post->ID);?>
                    <div class="main-new__left">                        
                        <img src="<?php echo feature_img(get_the_ID()); ?>" alt="" class="c-blog__img">
                    </div>
                    <div class="main-new__right">
                        <h3 class="main-new__title">
                            New Post !!
                        </h3>
                        <div class="sp-row">
                            <p class="c-category"><?php echo get_the_category()[0]->name; ?></p>
                            
                            <p class="c-blog__date"><?php echo custom_date(get_post_time('Y.m.d')); ?></p>
                        </div>
                        <div class="c-blog__title" ><?php echo limit_content_chr( get_the_title(),70); ?></div>
                        <div class="c-more">more</div>
                        <img src="<?php echo T_DIRE_URI; ?>/assets/img/blog/index/main_deco.svg" alt="" class="main-new__deco">
                    </div>
                </a>
                <?php endforeach; ?>
                <?php endif;?>  
                <?php wp_reset_postdata(); ?>
                <div class="main__list">
                    <?php
                    
                    $args = array(
                        'post_type'=>'post',
                        'posts_per_page' => 12,
                        'paged' => $paged
                    );
                    if(count($post_ids) > 0)
                    {
                        $args['post__not_in'] = $post_ids;                       
                    }
                    if($_GET['c_title'] != "")
                    {
                       $args['s'] = $_GET['c_title'];
                    }
                    $date_query = [
                        [
                            'year'  => $_GET['c_y'],
                            'month' => $_GET['c_m'],
                        ]
                    ];                    
                    if($date_query != null) 
                        $args['date_query'] = $date_query;
                    $the_query = new WP_Query($args);
                    if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="main-item c-blog">
                        <p class="c-category ab"><?php echo get_the_category()[0]->name; ?></p>
                        <img src="<?php echo feature_img(get_the_ID()); ?>" alt="" class="c-blog__img">
                        <p class="c-blog__date"><?php echo custom_date(get_post_time('Y.m.d')); ?></p>
                        <div class="c-blog__title"><?php echo limit_content_chr( get_the_title(),68); ?></div>
                        <div class="c-more">more</div>
                    </a>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <?php endif; ?>                    
                </div>
                <?php if(function_exists('wp_pagenavi')) wp_pagenavi(array('query' => $the_query)); ?>         
                <?php wp_reset_postdata(); ?>       
            </section>
        </div>
        <?php $has_bg = true; ?>
        <?php get_template_part('inc', 'contact'); ?>
    </div>    
<?php get_footer(); ?>