<?php
/*
Template Name: FrontPage
*/
if ( !defined( 'ABSPATH' ) )exit;
get_header();
?>
<div class="p-top" id="top">
  <section class="fv">
    <div class="fv__left">
      <div class="fv__txtarea"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/fv_logo.svg" alt="" class="fv__logo sp-hidden">
        <h1 class="fv__title u-color-white"> お客様に背中を<br> まかせてもらえる <br> パートナーでありたい </h1>
      </div>
      <div alt="" class="fv__rect sp-hidden"></div>
    </div>
    <header class="l-header" id="header_mainvis">
      <div class="l-header__inner">
        <div class="l-header__left"> <a href="<?php echo HOME;?>" class="l-header__txtarea">
          <div class="l-header__title"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/common/logo_title.svg" alt=""> </div>
          <p class="l-header__lead"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/common/logo_lead.svg" alt=""> </p>
          </a> </div>
        <div class="l-header__right u-center sp-hidden">
          <div class="l-header__menu"> <a href="<?php echo HOME;?>#about" class="item"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/common/icon_book_o.svg" alt="" width="15.6px" height="24px">
            <p>当事務所について</p>
            </a> <a href="<?php echo HOME.'service';?>" class="item"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/common/icon_computer_o.svg" alt="" width="27px" height="24px">
            <p>業務内容</p>
            </a> <a href="<?php echo HOME.'profile';?>" class="item"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/common/icon_peng_o.svg" alt="" width="24px" height="24px">
            <p>代表紹介</p>
            </a> <a href="<?php echo HOME.'blog';?>" class="item"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/common/icon_bird_o.svg" alt="" width="25px" height="24px">
            <p>とりログ</p>
            </a> </div>
          <div class="l-header__contact u-bg-blue"> <a href="<?php echo HOME.'#contact';?>"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/common/icon_mail_o.svg" alt="">
            <p class="u-color-white">お問合わせ</p>
            </a> </div>
        </div>
        <div class="sp-link pc-hidden">
          <div class="line"> <span></span> <span></span> <span></span> </div>
          <p class="txt">MENU</p>
        </div>
      </div>
    </header>
    <div class="fv__bg"> 
      <!-- <ul class="cb-slideshow">
                    <li><span></span></li>
                    <li><span></span></li>
                    <li><span></span></li>
                    <li><span></span></li>
                    <li><span></span></li>
                    <li><span></span></li>
                </ul> -->
      <div class="intro_top_slider_container">
        <div class="intro_top_page_slider">
          <div class="intro_top_slider_item">
            <div class="intro_top_slider_item_inner">
              <div class="intro_top_slider_image"></div>
            </div>
          </div>
          <div class="intro_top_slider_item">
            <div class="intro_top_slider_item_inner">
              <div class="intro_top_slider_image"></div>
            </div>
          </div>
          <div class="intro_top_slider_item">
            <div class="intro_top_slider_item_inner">
              <div class="intro_top_slider_image"></div>
            </div>
          </div>
          <div class="intro_top_slider_item">
            <div class="intro_top_slider_item_inner">
              <div class="intro_top_slider_image"></div>
            </div>
          </div>
          <div class="intro_top_slider_item">
            <div class="intro_top_slider_item_inner">
              <div class="intro_top_slider_image"></div>
            </div>
          </div>
          <div class="intro_top_slider_item">
            <div class="intro_top_slider_item_inner">
              <div class="intro_top_slider_image"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <p class="fv__lead"> 兵庫県神戸市のITが得意な行政書士！とり行政書士事務所 </p>
    <div class="followSns sp-hidden">
      <p class="followSns__txt u-color-blue">Please Follow me! </p>
      <div class="followSns__icons"> <a href="https://twitter.com/yttm130" target="_blank" class="followSns__icon"> 
        <!-- <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/icon_twitter_blue.svg" alt=""> -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.33 39.45">
          <g id="Layer_2" data-name="Layer 2">
            <g id="マウスオーバー">
              <path class="cls-1" d="M19.67.14h0A19.55,19.55,0,0,1,39.19,19.72h0A19.56,19.56,0,0,1,19.67,39.31h0A19.56,19.56,0,0,1,.14,19.72h0A19.55,19.55,0,0,1,19.67.14Z"/>
              <path class="cls-2" d="M27.39,15.23a3,3,0,0,1-1.86,1h0a3.08,3.08,0,0,0,1-1.14,3,3,0,0,0,.27-.73,3.13,3.13,0,0,1-1.63.65h-.49a3.07,3.07,0,0,0-1.89-.83h-.22a2.83,2.83,0,0,0-.41,0,2.57,2.57,0,0,0-.78.21,3.47,3.47,0,0,0-.81.51,3,3,0,0,0-1.06,2.32,3.45,3.45,0,0,0,.05.57c-.06.06-3.55.36-6.41-3.14a3.08,3.08,0,0,0-.47,1.64A3,3,0,0,0,13,17.48a3.05,3.05,0,0,0,1.24,1.46,5.09,5.09,0,0,1-1.55-.6,3.88,3.88,0,0,0,1,2.52,3,3,0,0,0,2,.86h-.3a5.92,5.92,0,0,1-1.59-.12,2.81,2.81,0,0,0,2.79,2.18c.18,0-1.09,1.24-3.92,1.24l-.66,0a8.73,8.73,0,0,0,13.74-7.18c0-.13,0-.26,0-.39s0-.12,0-.19,0-.08,0-.13A3,3,0,0,0,27.39,15.23Z"/>
              <path class="cls-3" d="M19.67.14h0A19.55,19.55,0,0,1,39.19,19.72h0A19.56,19.56,0,0,1,19.67,39.31h0A19.56,19.56,0,0,1,.14,19.72h0A19.55,19.55,0,0,1,19.67.14Z"/>
              <path class="cls-4" d="M27.39,15.23a3,3,0,0,1-1.86,1h0a3.08,3.08,0,0,0,1-1.14,3,3,0,0,0,.27-.73,3.13,3.13,0,0,1-1.63.65h-.49a3.07,3.07,0,0,0-1.89-.83h-.22a2.83,2.83,0,0,0-.41,0,2.57,2.57,0,0,0-.78.21,3.47,3.47,0,0,0-.81.51,3,3,0,0,0-1.06,2.32,3.45,3.45,0,0,0,.05.57c-.06.06-3.55.36-6.41-3.14a3.08,3.08,0,0,0-.47,1.64A3,3,0,0,0,13,17.48a3.05,3.05,0,0,0,1.24,1.46,5.09,5.09,0,0,1-1.55-.6,3.88,3.88,0,0,0,1,2.52,3,3,0,0,0,2,.86h-.3a5.92,5.92,0,0,1-1.59-.12,2.81,2.81,0,0,0,2.79,2.18c.18,0-1.09,1.24-3.92,1.24l-.66,0a8.73,8.73,0,0,0,13.74-7.18c0-.13,0-.26,0-.39s0-.12,0-.19,0-.08,0-.13A3,3,0,0,0,27.39,15.23Z"/>
            </g>
          </g>
        </svg>
        </a> <a href="https://www.facebook.com/torigyo/" target="_blank" class="followSns__icon"> 
        <!-- <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/icon_facebook_blue.svg" alt=""> -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.33 39.45">
          <g id="Layer_2" data-name="Layer 2">
            <g id="マウスオーバー">
              <path class="cls-1" d="M19.67.14h0A19.55,19.55,0,0,1,39.19,19.72h0A19.56,19.56,0,0,1,19.67,39.31h0A19.56,19.56,0,0,1,.14,19.72h0A19.55,19.55,0,0,1,19.67.14Z"/>
              <path class="cls-2" d="M18.31,26.59h2.47V18.88h1.64V17.12H20.78v-.81a.73.73,0,0,1,.88-.73c.32,0,.55,0,.69,0v-2l-.52,0-.43,0c-1.37,0-2.25.29-2.62.86a3.29,3.29,0,0,0-.5,2.12v.61H16.91v1.76h1.4Z"/>
              <path class="cls-3" d="M19.67.14h0A19.55,19.55,0,0,1,39.19,19.72h0A19.56,19.56,0,0,1,19.67,39.31h0A19.56,19.56,0,0,1,.14,19.72h0A19.55,19.55,0,0,1,19.67.14Z"/>
              <path class="cls-4" d="M18.31,26.59h2.47V18.88h1.64V17.12H20.78v-.81a.73.73,0,0,1,.88-.73c.32,0,.55,0,.69,0v-2l-.52,0-.43,0c-1.37,0-2.25.29-2.62.86a3.29,3.29,0,0,0-.5,2.12v.61H16.91v1.76h1.4Z"/>
            </g>
          </g>
        </svg>
        </a> </div>
    </div>
  </section>
  <section class="about" id="about">
    <?php
    $args = array(
      'posts_per_page' => 1,
      'post_type' => 'post',
      'cat' => '22'
      //'offset' => 1,
    );
    //$posts = get_posts($args);     
    $start = 300;
    $the_query = new WP_Query( $args );
    ?>
    <?php /*foreach($posts as $post): */?>
    <?php if($the_query->have_posts()):?>
    <?php while($the_query->have_posts()) : $the_query->the_post();?>
    <div class="new">
      <div class="bg"></div>
      <a href="<?php the_permalink(); ?>" class="content">
      <p class="category sp-hidden"> <span>
        <?php//
                            //$cats = get_the_category();
                            //foreach($cats as $cat):
                            //echo $cat->cat_name;
                            //endforeach;
                        ?>
        お知らせ </span> <span>NEWS</span> </p>
      <p class="date">
        <?php
        $days = array( 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun' );
        $date = get_post_time( 'Y.m.d' );
        $day = date_format( $date, "w" );
        echo $date . "(" . $days[ $day ] . ")";
        ?>
      </p>
      <p class="title"> <span><?php echo limit_content_chr( get_the_title(),15); ?></span><span>...</span> </p>
      <p class="more">more</p>
      </a> </div>
    <?php endwhile;?>
    <?php/* endforeach; */?>
    <?php endif;?>
    <?php wp_reset_postdata(); ?>
    <?php wp_reset_query(); ?>
    <div class="scrolldown1"><span class="txt">SCROLL</span><span class="line"></span></div>
    <div class="wave">
      <canvas id="waveCanvas"></canvas>
    </div>
    <div id="about_sec" class="c-sec__title">
      <p><span>ABOUT US</span></p>
      <h3>当事務所の思い</h3>
    </div>
    <div class="about__inner"  data-aos="fade-right" data-aos-duration="1500">
      <div class="about__left" data-aos="fade-right" data-aos-duration="1500"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/about_img1.png" alt="" class="about__pic"> </div>
      <h2 class="c-en-title about__en">MESSAGES</h2>
      <div class="about__right u-color-white ">
        <p class="about__lead"> いつでもとなりに。全国対応の<br> オンライン専門行政書士事務所です。 </p>
        <p class="about__txt"> この度はとり行政書士事務所のWEBサイトをご訪問いただき、ありがとうございます。当事務所は事業の拡大に欠かせない補助金や助成金活用のサポートを得意とする行政書士事務所です。気軽に出来るオンライン相談で、まずはお悩みごとやお困りごとをお聞かせください。 </p>
        <div class="about__btn"> <a href="<?php echo HOME.'profile';?>" class="c-btn"><span>代表紹介</span><span>代表について詳しく</span></a> </div>
      </div>
    </div>
  </section>
  <section class="design">
    <div class="design__inner">
      <div class="c-sec__title">
        <p><span>LOGO DESIGN</span></p>
        <h3>当事務所のコンセプト</h3>
      </div>
      <p class="design__date"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/design_date.svg" alt=""> </p>
      <p class="design__deco sp-hidden"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/design_deco.gif" alt=""> </p>
      <div class="design__row">
        <div class="design__left"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/design_logo.svg" class="design__logo" alt=""> </div>
        <div class="design__right">
          <p class="design__lead "><span class="u-highlight">「背中を預けてもらえるような存在に」</span></p>
          <p class="design__txt">羽を広げたペンギンの後ろ姿には、「安心して任せてもらえるような存在になる」という意味を込めました。「とり行政書士事務所」と、代表「辰巳」の頭文字である「t」に見えるシルエットで、足跡は行政書士の徽章に採用されているコスモスの花びらを模した形となっています。</p>
        </div>
      </div>
    </div>
  </section>
  <section class="blog">
    <div class="blog__inner">
      <div class="c-sec__title">
        <p><span>BLOG</span></p>
        <h3>代表ブログ「とりログ」</h3>
      </div>
      <div class="blog__list">
        <?php
        $stickies = get_option( 'sticky_posts' );
        if ( $stickies ):
          $args = array(
            'post_type' => 'post',
            'post__in' => $stickies,
            'posts_per_page' => 3,
            'ignore_sticky_posts' => 1
          );
        $posts = get_posts( $args );
        $start = 300;
        ?>
        <?php foreach($posts as $post): ?>
        <a href="<?php the_permalink(); ?>" class="blog-item">
        <div class="blog-item__img"> <img src="<?php echo feature_img(get_the_ID()); ?>" alt="">
          <p class="blog-item__category c-category ab">
            <?php
            $cats = get_the_category();
            foreach ( $cats as $cat ):
              echo $cat->cat_name;
            endforeach;
            ?>
          </p>
        </div>
        <div class="blog-item__txtarea">
          <p class="blog-item__title"> <?php echo custom_date(get_post_time('Y.m.d')); ?> </p>
          <div class="blog-item__txt"> <?php echo get_the_title(); ?> </div>
        </div>
        <div class="c-more"> <span>more</span> </div>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        <a href="" class="blog-item pc-hidden" data-aos="fade-up" data-aos-duration="1500"  data-aos-delay="<?php echo $start += 100;?>"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/blog_sp_img.png" alt=""> </a> </div>
      <div class="blog__btn u-center"> <a href="<?php echo HOME.'blog';?>" class="c-btn"><span>とりログ</span><span>とりログ</span></a> </div>
      <h2 class="c-en-title blog__en sp-hidden">BLOG</h2>
    </div>
  </section>
  <section class="promises ">
    <h2 class="promises__en c-en-title"><span>PROMISES</span></h2>
    <h3 class="promises__title u-center"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/promises_title.svg" alt=""  class="retina"> </h3>
    <p class="promises__lead u-center"> 当事務所は、ITの分野を得意とする<br class="pc-hidden">行政書士が対応。<br> ビジネスや生活のお困りごとなど、<br class="pc-hidden">さまざまな課題の相談相手となり、 <br> 問題解決のサポートをいたします。 </p>
    <div class="promises__list">
      <div class="promises-item" data-aos="fade-up" data-aos-duration="300">
        <div class="promises-item__img"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/promises_img1.svg" alt=""> </div>
        <div class="promises-item__title">
          <h3>1</h3>
          <p>お客様の時間を大切に<br>考えています </p>
        </div>
        <p class="promises-item__txt">効率的に業務を進められるよう、ご対応は原則オンラインツールを使用し非対面で行っています。</p>
      </div>
      <div class="promises-item" data-aos="fade-up" data-aos-duration="1000">
        <div class="promises-item__img"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/promises_img2.svg" alt=""> </div>
        <div class="promises-item__title">
          <h3>2</h3>
          <p>専門用語や難しい<br>言葉は使いません。 </p>
        </div>
        <p class="promises-item__txt">やさしい言葉やたくさんの図表などを使い、誰にでも分かりやすい説明を心がけています。</p>
      </div>
      <div class="promises-item" data-aos="fade-up" data-aos-duration="2000">
        <div class="promises-item__img"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/promises_img3.svg" alt=""> </div>
        <div class="promises-item__title">
          <h3>3</h3>
          <p>代表本人がお客様対応<br>いたします。 </p>
        </div>
        <p class="promises-item__txt">小さな事務所ならではの強みを活かし、お客様からのご相談には必ず代表本人が対応いたします。</p>
      </div>
    </div>
  </section>
  <section class="service" id="service">
    <h2 class="service__en c-en-title"><span>SERVICE</span></h2>
    <div class="c-sec__title">
      <p><span>業務内容</span></p>
      <h3>とり行政書士事務所が<br class="pc-hidden">お客様にお手伝いできること</h3>
    </div>
    <div class="service-work">
      <div class="service-work__inner">
        <div class="service-work__left"> <a href="<?php echo HOME.'service';?>#loan" class="service-work__row" data-aos="fade-right" data-aos-duration="1500">
          <p>補助金・融資業務</p>
          </a> <a href="<?php echo HOME.'service';?>#law" class="service-work__row" data-aos="fade-right" data-aos-duration="1500">
          <p>動物法務</p>
          </a> <a href="<?php echo HOME.'service';?>#doc" class="service-work__row" data-aos="fade-right" data-aos-duration="1500">
          <p>各種書面作成サポート</p>
          </a> </div>
        <div class="service-work__right"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/service_img1.gif" alt=""> </div>
      </div>
    </div>
    <div class="service-consult">
      <div class="service-consult__title u-center u-color-white"> <span>ご相談の際、事務所まで<br class="pc-hidden">お越し頂く必要はありません！</span> </div>
      <div class="service-consult__lead u-center u-color-point sp-hidden"> <span class="u-highlight">オンラインでのご相談をメインに対応しています！</span> </div>
      <div class="service-consult__lead u-center u-color-point pc-hidden"> <span class="u-highlight">オンラインでのご相談を</span><br><span class="u-highlight">メインに対応しています！</span> </div>
      <div class="service-consult__row">
        <div class="service-consult__left"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/service_img2.gif" alt=""> </div>
        <div class="service-consult-right" data-aos="fade-left" data-aos-duration="1500">
          <div class="service-benefits__lead u-color-point"> オンライン相談のメリット </div>
          <div class="service-benefits__row">
            <p class="service-benefits__number"> 01 </p>
            <p class="service-benefits__txt"> 移動にかかるコストがないので、<br class="sp-hidden">お気軽にご相談可能です。 </p>
          </div>
          <div class="service-benefits__row">
            <p class="service-benefits__number"> 02 </p>
            <p class="service-benefits__txt"> ZoomやGoogle Meet、Teamsなど<br class="sp-hidden">お客様が普段使用されているツールで<br class="sp-hidden">お打ち合わせが可能です。 </p>
          </div>
          <div class="service-benefits__row">
            <p class="service-benefits__number"> 03 </p>
            <p class="service-benefits__txt"> オンラインでのご相談メインで対応。<br class="sp-hidden">スピーディにお返事が可能です。<br class="sp-hidden">（対面の場合は別途交通費がかかります） </p>
          </div>
        </div>
      </div>
    </div>
    <div class="service__btn u-center"> <a href="<?php echo HOME.'service';?>" class="c-btn"><span>業務案内</span><span>業務案内</span></a> </div>
  </section>
  <section class="calendar">
    <?php
    $calendar = get_field( 'calendar' );
    $calendar_date = $calendar[ 'date' ];
    $calendar_days = $calendar[ 'days' ];

    $date = new DateTime( $calendar_date );

    $c_date = $date->format( 'Y.m' );
    $firstdate = $date->format( 'Y-m-d' );
    $lastdate = $date->format( 'Y-m-t' );
    $en_date = $date->format( 'F' );

    function getWeekday( $date ) {
      return date( 'w', strtotime( $date ) );
    }

    function getDay( $date ) {
      $timestamp = strtotime( $date );
      return date( 'j', $timestamp );
    }
    $spaceCount = getWeekday( $firstdate );
    $count = getDay( $lastdate );
    ?>
    <div class="calendar__inner">
      <h2 class="calendar__title u-center sp-hidden">営業カレンダー</h2>
      <div class="c-sec__title pc-hidden">
        <p><span>CALENDAR</span></p>
        <h3>営業カレンダー</h3>
      </div>
      <div class="calendar__row">
        <div class="calendar__content">
          <div class="calendar__left">
            <div class="calendar-date">
              <p class="calendar-date__number"><?php echo $c_date;?><span class="pc-hidden"><?php echo $en_date; ?></span></p>
              <p class="calendar-date__en sp-hidden">CALENDAR</p>
            </div>
            <div class="calendar__txtarea sp-hidden">
              <div class="calendar-time">
                <p class="calendar-time__title"> 営業時間 </p>
                <p class="calendar-time__txt"> 平日&nbsp;<br class="sp-hidden">10:00～17:00 </p>
              </div>
              <div class="calendar-type">
                <p class="calendar-type__item"> <span>…営業日</span> </p>
                <p class="calendar-type__item"> <span>…定休日</span> </p>
              </div>
            </div>
          </div>
          <div class="calendar__right">
            <ul class="calendar__week">
              <li>日</li>
              <li>月</li>
              <li>火</li>
              <li>水</li>
              <li>木</li>
              <li>金</li>
              <li>土</li>
            </ul>
            <ul class="calendar__days">
              <?php
              for ( $i = 0; $i < $spaceCount; $i++ ):
                ?>
              <li class="empty"></li>
              <?php endfor; ?>
              <?php
              for ( $i = 1; $i <= $count; $i++ ):
                ?>
              <li class="<?php echo in_array($i, $calendar_days)?"active":""; ?>"><?php echo $i; ?></li>
              <?php endfor; ?>
            </ul>
          </div>
          <div class="calendar__txtarea pc-hidden">
            <div class="calendar-time">
              <p class="calendar-time__title"> 営業時間 </p>
              <p class="calendar-time__txt"> 平日&nbsp;<br class="sp-hidden">10:00～17:00 </p>
            </div>
            <div class="calendar-type">
              <p class="calendar-type__item"> <span>…営業日</span> </p>
              <p class="calendar-type__item"> <span>…定休日</span> </p>
            </div>
          </div>
        </div>
        <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/calender_table.png" alt="" class="calendar__bg"> </div>
    </div>
    <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/calender_bg.png" alt="" class="calendar__bg out"> </section>
  <section class="contact">
    <div class="contact-form__triangle pc-hidden"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/contact_triangle_white.png" alt=""> </div>
    <div class="contact-free">
      <div class="c-contact">
        <div class="c-contact__inner">
          <div class="c-sec__title">
            <p class="pc-hidden"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/contact_lead_txt.svg" alt=""> </p>
            <h3>お問い合わせ</h3>
          </div>
          <div class="contact-free__inner">
            <div class="c-contact__lead"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/contact_txt.svg" alt="" class="sp-hidden">
              <p class="pc-hidden">まずはお気軽にご相談</p>
            </div>
            <div class="c-contact__list">
              <div class="c-contact-item" data-aos="fade-up" data-aos-duration="1500">
                <div class="c-contact-item__lead">メール/オンラインでのご相談</div>
                <div class="c-contact__img"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/contact_img1.gif" alt="" class="img1"> </div>
                <p class="c-contact-item__txt"> フォーム送信後、<span class="u-highlight">日程調整についてご案内</span>いたします。
                  その後、状況に応じて<span class="u-highlight u-color-blue">メール・チャットでのご相談</span>、<br><span class="u-highlight u-color-point">Zoom・Skypeなどでの打ち合わせ</span>を行います。<br> ご要望がございましたら、お気軽にお申し付けください。 </p>
              </div>
              <div class="c-contact-item" data-aos="fade-up" data-aos-duration="1500">
                <div class="c-contact-item__lead">お急ぎの場合はお電話で</div>
                <div class="c-contact__img"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/contact_img2.gif" alt="" class="img2"> </div>
                <p class="c-contact-item__phone"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/common/contact_phone.svg" alt=""> <span> 078-600-2340 </span> </p>
                <p class="c-contact-item__time"> <span>電話受付時間  平日 </span> <span>10:00～17:00</span> </p>
                <p class="c-contact-item__txt">お急ぎの場合はお電話でのご相談も承ります。<br> お気軽にお問い合わせください。 </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="contact-form mw_wp_form" id="contact">
      <div class="contact-form__triangle pc-hidden"> <img src="<?php echo T_DIRE_URI; ?>/assets/img/top/contact_triangle.png" alt=""> </div>
      <div class="contact-form__inner">
        <div class="contact-form__title u-center  u-color-white"> <span class="u-bg-point">以下のフォームに必要事項をご入力の上、<br class="pc-hidden">送信してください。</span> </div>
        <div class="contact-form__lead u-center"> <span class="u-highlight">フォームからご連絡頂いた場合、<br class="pc-hidden"><span class="u-color-blue">2営業日以内にお返事</span></span>いたします。<br> <span class="u-highlight">添付ファイルをお送り頂くことが出来ません</span>ので、 <br class="sp-hidden"><span class="u-highlight">データ便</span>もしくは、<span class="u-highlight">当事務所からの返信後のメール</span>にてご送付ください。 </div>
        <!-- <div class="contact-form__inner">
                            <div class="contact-form__row">
                                <div class="contact-form__column">
                                    <div class="form-group">
                                        <label><span class="txt">会社名</span><span class="required">必須</span><span class="error">※必須項目です</span></label>
                                        <input type="text" placeholder="例）株式会社〇〇" id="company_name" name="company_name">
                                    </div>
                                    <div class="form-group">
                                        <label><span class="txt">氏名(漢字)</span><span class="required">必須</span><span class="error">※必須項目です</span></label>
                                        <div class="row">
                                            <p>姓</p>
                                            <input type="text" placeholder="例）田中" id="chinese_last" name="chinese_last">
                                            <p>名</p>
                                            <input type="text" placeholder="例）太郎" id="chinese_first" name="chinese_first">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><span class="txt">氏名(フリガナ)</span><span class="required">必須</span><span class="error">※必須項目です</span></label>
                                        <div class="row">
                                            <p>セイ</p>
                                            <input type="text" placeholder="例）タナカ" id="furigana_last" name="furigana_last">
                                            <p>メイ</p>
                                            <input type="text" placeholder="例）タロウ" id="furigana_first" name="furigana_first">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><span class="txt">折り返しのご連絡方法</span><span class="required">必須</span><span class="error">※必須項目です</span></label>
                                        <div>
                                            <label class="u-check">メール
                                                <input type="radio" checked="checked" name="method" value="メール">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="u-check">お電話
                                                <input type="radio" name="method" value="お電話">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="u-check">その他(以下に詳細ご記入ください)
                                                <input type="radio" name="method" value="その他">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-form__column">
                                    <div class="form-group">
                                        <label><span class="txt">電話番号</span><span class="required">必須</span><span class="error">※必須項目です</span></label>
                                        <input type="text" placeholder="例）000-0000-0000"  id="phone" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label><span class="txt">メールアドレス</span><span class="required">必須</span><span class="error">※必須項目です</span></label>
                                        <input type="text" placeholder="例）sample@mail.com"  id="email" name="email">
                                    </div>
                                    <div class="form-group last">
                                        <label><span class="txt">ご相談内容</span><span class="required">必須</span><span class="error">※必須項目です</span></label>
                                        <textarea name="message" id="message" placeholder="オンラインご希望の際はこちらにご記入ください"></textarea>
                                    </div>
                                    <div class="contact-form__privacy">
                                        プライバシーポリシー<br> 個人情報保護方針については<a href="#">こちら</a>をご確認ください
                                    </div>
                                </div>
                            </div>
                            <div class="contact__btn u-center">
                                <button type="submit" name="subBtn" id="subBtn" class="c-btn"><span>上記の内容で送信</span></button>
                            </div>
                        </div> -->
        <div> <?php echo do_shortcode ('[mwform_formkey key = "2290"]'); ?> </div>
      </div>
    </div>
  </section>
  <div class="wave">
    <canvas id="waveCanvas1"></canvas>
  </div>
</div>
<?php get_footer(); ?>
