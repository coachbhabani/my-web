<?php
/**
 * iCare Fitness functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package iCare Fitness
 */
 
function icarefitness_enqueue_styles() {

    $parent_style = 'icare-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array( 'bootstrap','icare-css-plugin-collections' )  );
    wp_enqueue_style( 'icarefitness',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    if(get_theme_mod('icare_primary_color')==''){
    	wp_enqueue_style( 'icare-theme-color-scheme', get_stylesheet_directory_uri() . '/assets/css/color/theme-skin-dark-blue.css', array( 'icarefitness' )  );
    }

}
add_action( 'wp_enqueue_scripts', 'icarefitness_enqueue_styles');

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function icarefitness_excerpt_more($more)
{
    return sprintf('<br><a class="btn btn-theme btn-read-more mt-ten" href="%1$s">%2$s</a>',
        get_permalink(get_the_ID()),
        esc_html__('Read More', 'icarefitness')
    );
}
add_filter('excerpt_more', 'icarefitness_excerpt_more', 15);

add_filter("the_excerpt", "icarefitness_break_text");
function icarefitness_break_text($text){
    $length = 100;
	
    if(strlen($text)<$length+10) return $text;//don't cut if too short

    $break_pos = strpos($text, ' ', $length);//find next space after desired length
    $visible = substr($text, 0, $break_pos);
    return balanceTags($visible) . "...";
}


add_action( 'customize_register', 'icarefitness_customizer', 20 );
function icarefitness_customizer( $wp_customize ) {
	
	$parent_theme = wp_get_theme( 'icare', '');

	// Overwriting parent documentation link 
	if( $parent_theme['Version'] > '1.3.1' ){
		$wp_customize->get_section('button')->pro_url = esc_url( 'https://www.webhuntinfotech.com/icare-fitness-theme-documentation/', 'icarefitness' );
	}
	
	// Removing Parent option	
	//$wp_customize->remove_control('icare_menu_bg_color');
	
	$wp_customize->add_setting(
		'icarefitness_hero_btn',
		array(
			'type'    			=> 'theme_mod',
			'sanitize_callback'	=> 'icare_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	
	$wp_customize->add_control('icarefitness_hero_btn',array(
		'label' 	=> esc_html__('Button Text','icarefitness'),
		'section' 	=> 'slider',
		'settings' 	=> 'icarefitness_hero_btn',
		'type' 		=> 'text',
		'priority' 	=> 11,
		)
	);
	
	$wp_customize->add_setting(
		'icarefitness_hero_btn_url',
		array(
			'type'    			=> 'theme_mod',
			'sanitize_callback'	=> 'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	
	$wp_customize->add_control('icarefitness_hero_btn_url',array(
		'label' 	=> esc_html__('Button Url','icarefitness'),
		'section' 	=> 'slider',
		'settings' 	=> 'icarefitness_hero_btn_url',
		'type' 		=> 'url',
		'priority' 	=> 11,
		)
	);
	
	$wp_customize->add_setting(
		'icarefitness_cta_desc',
		array(
			'type'    			=> 'theme_mod',
			'sanitize_callback'	=> 'icare_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	
	$wp_customize->add_control('icarefitness_cta_desc',array(
		'label' 	=> esc_html__('Description','icarefitness'),
		'section' 	=> 'calltoaction',
		'settings' 	=> 'icarefitness_cta_desc',
		'type' 		=> 'textarea',
		'priority' 	=> 11,
		)
	);
	
	$wp_customize->add_setting(
		'icarefitness_cta_image',
		array(
			'type'    			=> 'theme_mod',
			'sanitize_callback'	=> 'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	
	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'icarefitness_cta_image',
           array(
               'label'      => esc_html__('Image','icarefitness'),
			   'description' => esc_html__('Recommended Image Size: 300x300px', 'icarefitness'),
               'section' 	=> 'calltoaction',
               'settings' 	=> 'icarefitness_cta_image',
			   'priority' 		=> 11
           )
       )
   );
	
}
add_filter('icare_setting_default_values','icarefitness_setting_default_values', 10, 1);
function icarefitness_setting_default_values($args){
	$args['icarefitness_hero_btn'] 		= __("Book Appointment","icarefitness");
	$args['icarefitness_hero_btn_url'] 	= esc_url(get_home_url());
	$args['icarefitness_cta_desc'] 		= esc_html("Curabitur sed iaculis dolor, non congue ligula. Maecenas imperdiet ante eget hendrerit posuere.");
	$args['icarefitness_cta_image'] 	= esc_url(get_stylesheet_directory_uri() . '/assets/images/icarefitness-cta-img.jpg');
	
	/* Reset Default Settings */
	$args['icare_hero_image'] 				= esc_url(get_stylesheet_directory_uri() . '/assets/images/icarefitness-hero-img.jpg');
	$args['icare_primary_color'] 			= '';
	$args['icare_breadcrumbs_bg_image'] 	= esc_url(get_stylesheet_directory_uri() . '/assets/images/icarefitness-Breadcrumb-img.jpg');
	$args['icare_breadcrumbs_font_color'] 	= '#ffffff';
	$args['header_textcolor'] 				= '000000';
	$args['icare_br_s_p_t'] 				= '60px';
	$args['icare_br_s_p_b'] 				= '60px';

	return $args;
}

add_filter( 'icare_get_elements_array', 'icarefitness_elements_array', 10, 1 );
function icarefitness_elements_array($elements){
	$els = array(
		'background-color' => array(
			'.btn-slider,.btn-border:focus,.btn-border:hover,.header_nav:not(.scroll-to-fixed-fixed) #cssmenu ul > li::before'=>get_theme_mod('icare_primary_color'),

		),
		'color'=>array(
			'.btn-border:focus,.btn-border:hover'=>'#fff',
			'.btn-border'=>get_theme_mod('icare_primary_color'),
		),
		'border-color'=>array(
			'.btn-border'=>get_theme_mod('icare_primary_color'),
		),
	);

	foreach ($els as $property => $props) {
		foreach ($props as $el => $value) {
			$elements[$property][$el] = $value;
		}
	}
	if(get_theme_mod('icare_menu_bg_color')){
		$elements['background-color']['.header_nav:not(.scroll-to-fixed-fixed) #cssmenu ul > li::before'] = get_theme_mod('icare_menu_bg_color');
	}
	
	//var_dump($elements);die;
	return $elements;
}

function icarefitness_theme_setup()
{
	load_child_theme_textdomain('icarefitness', get_template_directory() . '/lang');
}
add_action('after_setup_theme', 'icarefitness_theme_setup', 20);