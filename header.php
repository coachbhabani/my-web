<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iCare
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="clearfix">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'icarefitness' ); ?></a>
  <!-- Header -->
  <header id="header" class="header"><?php if(get_theme_mod('icare_show_topbar')=='on') { ?>
    <div class="top-header icare-theme-bg-colored sm-text-center">
      <div class="container">
        <div class="row top-row">
		<?php 
		/**
		 * Functions hooked into icare_topbar action
		 *
		 * @hooked icare_topbar_menu                     - 10
		 * @hooked icare_topbar_info                      - 20
		 */
		do_action( 'icare_topbar' ); ?>
        </div>
      </div>
    </div><?php 
    }
	$header_transparent='';
	if(is_page_template('home-page.php')){
		$header_transparent = 'icare-transparent';
	}?>
    <div class="header-main <?php echo esc_attr($header_transparent);?>">
      <div class="header-main-wrapper <?php echo get_theme_mod('icare_fixed_header')=='on' ? 'navbar-scrolltofixed' : ''; ?> header_nav">
        <div id="pmenu" class="container">
			<?php
			/**
			 * Functions hooked into icare_header action
			 * @hooked icare_primary_navigation_wrapper       - 10
			 * @hooked icare_site_logo					      - 12
			 * @hooked icare_primary_navigation               - 20
			 * @hooked icare_primary_navigation_wrapper_close - 30
			 */
			do_action( 'icare_header' ); ?>
			<!-- Start Mobile Menu -->
				<?php wp_nav_menu(array(
						'theme_location' => 'primary-menu',
						'menu_class' => 'wpb-mobile-menu',
						'fallback_cb' => 'icare_fallback_page_menu',
						'walker' => new Icare_Class_Walker(),
					)
				); ?>
			<div class="icare-mobile-menu"></div>
			<!-- End Mobile Menu -->
		</div>
	  </div>
	  
	</div>
	</header>
  <!-- Start main-content -->
  <div class="main-content">
