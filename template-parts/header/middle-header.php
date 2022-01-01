<?php
/**
 * The template part for header
 *
 * @package VW Wellness Coach
 * @subpackage vw_wellness_coach
 * @since VW Wellness Coach 1.0
 */
?>
<?php
  $vw_health_coaching_search_hide_show = get_theme_mod( 'vw_health_coaching_search_hide_show' );
  if ( 'Disable' == $vw_health_coaching_search_hide_show ) {
   $colmd = 'col-lg-7 col-md-7';
  } else {
   $colmd = 'col-lg-6 col-md-3 col-6';
  }
?>
<div class="main-header">
  <div class="main-header-inner py-3">
     <div class="header-menu <?php if( get_theme_mod( 'vw_health_coaching_sticky_header', false) != '' || get_theme_mod( 'vw_health_coaching_stickyheader_hide_show', false) != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-4">
            <div class="logo text-center text-md-start">
              <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <?php if( get_theme_mod('vw_health_coaching_logo_title_hide_show',true) != ''){ ?>
                      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php } ?>
                  <?php else : ?>
                    <?php if( get_theme_mod('vw_health_coaching_logo_title_hide_show',true) != ''){ ?>
                      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php } ?>
                  <?php endif; ?>
                <?php endif; ?>
                <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) :
                ?>
                <?php if( get_theme_mod('vw_health_coaching_tagline_hide_show',true) != ''){ ?>
                  <p class="site-description">
                    <?php echo esc_html($description); ?>
                  </p>
                <?php } ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="<?php echo esc_html( $colmd ); ?> align-self-center">
            <?php get_template_part( 'template-parts/header/navigation' ); ?>
          </div>
          <?php if ( 'Disable' != $vw_health_coaching_search_hide_show ) {?>
            <div class="col-lg-1 col-md-1 col-6 align-self-center border-start">
              <div class="search-box">
                <span><a href="#"><i class="<?php echo esc_attr(get_theme_mod('vw_health_coaching_search_icon','fas fa-search')); ?>"></i></a></span>
              </div>
            </div>
          <?php } ?>
          <div class="col-lg-2 col-md-3 col-sm-3 align-self-center">
            <?php if( get_theme_mod('vw_wellness_coach_appointment_btn_link') != '' || get_theme_mod('vw_wellness_coach_appointment_btn_text') != '' ){ ?>
              <div class="appointment-btn text-center text-md-end mt-4 mt-md-0">
                <a href="<?php echo esc_url(get_theme_mod('vw_wellness_coach_appointment_btn_link','')); ?>"><?php echo esc_html(get_theme_mod('vw_wellness_coach_appointment_btn_text','')); ?></a>
              </div>
            <?php }?>
          </div>
        </div>
        <div class="serach_outer">
          <div class="closepop"><a href="#maincontent"><i class="<?php echo esc_attr(get_theme_mod('vw_health_coaching_search_close_icon','fa fa-window-close')); ?>"></i></a></div>
          <div class="serach_inner">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>