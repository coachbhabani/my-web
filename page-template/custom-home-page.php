<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_health_coaching_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_health_coaching_slider_hide_show', false) != '' || get_theme_mod( 'vw_health_coaching_resp_slider_hide_show', false) != '') { ?>

    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_health_coaching_slider_speed',4000)) ?>"> 
        <?php $vw_health_coaching_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_health_coaching_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_health_coaching_slider_pages[] = $mod;
            }
          }
          if( !empty($vw_health_coaching_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_health_coaching_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_health_coaching_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_health_coaching_slider_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_health_coaching_slider_button_text','READ MORE') != ''){ ?>
                    <div class="more-btn">
                      <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_health_coaching_slider_button_text',__('READ MORE','vw-wellness-coach')));?><i class="<?php echo esc_attr(get_theme_mod('vw_health_coaching_sliders_button_icon','fa fa-angle-right')); ?>"></i>
                      <span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_health_coaching_slider_button_text',__('READ MORE','vw-wellness-coach')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-wellness-coach' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-wellness-coach' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>

  <?php } ?>

  <?php do_action( 'vw_health_coaching_after_slider' ); ?>

  <?php if(get_theme_mod('vw_health_coaching_services') != ''){ ?>

  <section id="service-sec">
    <div class="row m-0">
      <?php
        $vw_health_coaching_catData =  get_theme_mod('vw_health_coaching_services','');
        if($vw_health_coaching_catData){
        $page_query = new WP_Query(array( 'category_name' => esc_html($vw_health_coaching_catData,'vw-wellness-coach'))); ?>
        <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
          <div class="col-lg-4 col-md-4 category_main p-0">
            <div class="catgory-box">
              <?php the_post_thumbnail(); ?>
              <h2><?php the_title(); ?></h2>
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_health_coaching_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_health_coaching_services_excerpt_number','30')))); ?></p>
              <?php if( get_theme_mod('vw_health_coaching_services_button_text','READ MORE') != ''){ ?>
                <div class="more-btn">
                  <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_health_coaching_services_button_text',__('READ MORE','vw-wellness-coach')));?><i class="<?php echo esc_attr(get_theme_mod('vw_health_coaching_services_button_icon','fa fa-angle-right')); ?>"></i>
                  <span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_health_coaching_services_button_text',__('READ MORE','vw-wellness-coach')));?></span></a>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata();
      } ?>
    </div>
  </section>

  <?php }?>

  <?php do_action( 'vw_health_coaching_after_services' ); ?>

  <?php if(get_theme_mod('vw_health_coaching_trainer') != ''){ ?>

  <section id="trainer-sec" class="py-5">
    <div class="container">
      <?php if( get_theme_mod('vw_wellness_coach_trainer_section_title') != ''){ ?>
        <h3 class="text-center"><?php echo esc_html(get_theme_mod('vw_wellness_coach_trainer_section_title'));?><h3>
        <hr>
      <?php }?>
      <div class="row m-0">
        <?php
          $vw_wellness_coach_trainer_category =  get_theme_mod('vw_health_coaching_trainer','');
          if($vw_wellness_coach_trainer_category){
          $page_query = new WP_Query(array( 'category_name' => esc_html($vw_wellness_coach_trainer_category,'vw-wellness-coach'))); ?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="box mb-3">
                <?php the_post_thumbnail(); ?>
                <div class="box-content p-3">
                    <h2 class="title"><?php the_title(); ?></h2>
                    <p class="post"><?php $excerpt = get_the_excerpt(); echo esc_html( vw_health_coaching_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_wellness_coach_trainer_excerpt_number','10')))); ?></p>
                    <?php if( get_theme_mod('vw_wellness_coach_trainer_button_text','READ MORE') != ''){ ?>
                      <div class="more-btn">
                        <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_wellness_coach_trainer_button_text',__('READ MORE','vw-wellness-coach')));?><i class="fa fa-angle-right"></i>
                        <span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_wellness_coach_trainer_button_text',__('READ MORE','vw-wellness-coach')));?></span></a>
                      </div>
                    <?php } ?>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>

  <?php }?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>