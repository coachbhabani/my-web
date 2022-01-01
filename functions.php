<?php
	if ( ! function_exists( 'vw_wellness_coach_setup' ) ) :

	function vw_wellness_coach_setup() {
		$GLOBALS['content_width'] = apply_filters( 'vw_wellness_coach_content_width', 640 );
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );

		add_theme_support( 'custom-background', array(
			'default-color' => 'f1f1f1'
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', vw_health_coaching_font_url() ) );

		// Theme Activation Notice
		global $pagenow;

		if (is_admin() || ('themes.php' == $pagenow)) {
			add_action('admin_notices', 'vw_wellness_coach_activation_notice');
		}

	}
	endif;

	add_action( 'after_setup_theme', 'vw_wellness_coach_setup' );

	// Notice after Theme Activation
	function vw_wellness_coach_activation_notice() {
		echo '<div class="notice notice-success is-dismissible welcome-notice">';
		echo '<p>'. esc_html__( 'Thank you for choosing VW Wellness Coach Theme. Would like to have you on our Welcome page so that you can reap all the benefits of our VW Wellness Coach Theme.', 'vw-wellness-coach' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=vw_wellness_coach_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'vw-wellness-coach' ) .'</a></p>';
		echo '</div>';
	}

	add_action( 'wp_enqueue_scripts', 'vw_wellness_coach_enqueue_styles' );
	function vw_wellness_coach_enqueue_styles() {
    	$parent_style = 'vw-health-coaching-basic-style'; // Style handle of parent theme.
    	
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'vw-wellness-coach-style', get_stylesheet_uri(), array( $parent_style ) );
		require get_parent_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'vw-wellness-coach-style',$vw_health_coaching_custom_css );
		require get_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'vw-wellness-coach-style',$vw_wellness_coach_custom_css );
		wp_enqueue_style( 'vw-wellness-coach-block-style', get_theme_file_uri('/css/blocks.css') );
		wp_enqueue_style( 'vw-wellness-coach-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	function vw_wellness_coach_block_editor_styles() {
		wp_enqueue_style( 'vw-wellness-coach-font', vw_wellness_coach_font_url(), array() );
	    wp_enqueue_style( 'vw-wellness-coach-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
	    wp_enqueue_style( 'font-awesome', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css' );
	}
	add_action( 'enqueue_block_editor_assets', 'vw_wellness_coach_block_editor_styles' );

	/* Theme Widgets Setup */
	function vw_wellness_coach_widgets_init() {		
		register_sidebar( array(
			'name'          => __( 'Social Widget', 'vw-wellness-coach' ),
			'description'   => __( 'Appears on header', 'vw-wellness-coach' ),
			'id'            => 'social-widget',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );		
	}
	add_action( 'widgets_init', 'vw_wellness_coach_widgets_init' );
		
	add_action( 'init', 'vw_wellness_coach_remove_parent_function');
	function vw_wellness_coach_remove_parent_function() {
		remove_action( 'admin_notices', 'vw_health_coaching_activation_notice' );
		remove_action( 'admin_menu', 'vw_health_coaching_gettingstarted' );
	}

	function vw_wellness_coach_customize_register() {
		global $wp_customize;
		$wp_customize->remove_section( 'vw_health_coaching_upgrade_pro_link' );
		$wp_customize->remove_section( 'vw_health_coaching_get_started_link' );		
	}
	add_action( 'customize_register', 'vw_wellness_coach_customize_register', 11 );

	add_action( 'wp_enqueue_scripts', 'vw_wellness_coach_header_style' );
	function vw_wellness_coach_header_style() {
		if ( get_header_image() ) :
		$custom_css = "
	        ..main-header-inner{
				background-image:url('".esc_url(get_header_image())."') !important;
				background-position: center top;
				background-size: 100%;
			}";
		   	wp_add_inline_style( 'vw-wellness-coach-style', $custom_css );
		endif;
	}

	function vw_wellness_coach_scripts() {	
		wp_enqueue_script( 'vw-wellness-coach-custom-js ', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );
	}
	add_action( 'wp_enqueue_scripts', 'vw_wellness_coach_scripts' );

	function vw_wellness_coach_font_url() {
		$font_url      = '';
		$font_family   = array();
		$font_family[] = 'Josefin Sans:ital,wght@0,100;0,200;0,300;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,600;1,700';
		$query_args = array(
			'family' => rawurlencode(implode('|', $font_family)),
		);
		$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
		return $font_url;
	}
	
	function vw_wellness_coach_customizer ( $wp_customize ) {

		$wp_customize->add_setting('vw_wellness_coach_appointment_btn_text',array(
		    'default' => '',
		    'sanitize_callback' => 'sanitize_text_field',
	  	));
	  	$wp_customize->add_control('vw_wellness_coach_appointment_btn_text',array(
		    'type'    => 'text',
		    'label' => __('Appointment Text','vw-wellness-coach'),
		    'section' => 'vw_health_coaching_topbar',
		));

		$wp_customize->add_setting('vw_wellness_coach_appointment_btn_link',array(
		    'default' => '',
		    'sanitize_callback' => 'esc_url_raw',
	  	));
	  	$wp_customize->add_control('vw_wellness_coach_appointment_btn_link',array(
		    'type'    => 'url',
		    'label' => __('Appointment URL','vw-wellness-coach'),
		    'section' => 'vw_health_coaching_topbar',
		));

		// Trainer Section
	  	$wp_customize->add_section('vw_wellness_coach_trainer_section',array(
		    'title' => __('Trainer Section','vw-wellness-coach'),
		    'description' => '',
		    'priority'  => 100,
		    'panel' => 'vw_health_coaching_panel_id',
		));

		$wp_customize->add_setting('vw_wellness_coach_trainer_section_title',array(
		    'default' => '',
		    'sanitize_callback' => 'sanitize_text_field',
	  	));
	  	$wp_customize->add_control('vw_wellness_coach_trainer_section_title',array(
		    'type'    => 'text',
		    'label' => __('Section Title','vw-wellness-coach'),
		    'section' => 'vw_wellness_coach_trainer_section',
		));

		$categories = get_categories();
		$cats = array();
		$i = 0;
		$cat_pst1[]= 'select';
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cat_pst1[$category->slug] = $category->name;
		}

		$wp_customize->add_setting('vw_health_coaching_trainer',array(
		    'default' => 'select',
		    'sanitize_callback' => 'vw_health_coaching_sanitize_choices',
	  	));
	  	$wp_customize->add_control('vw_health_coaching_trainer',array(
		    'type'    => 'select',
		    'choices' => $cat_pst1,
		    'label' => __('Select Category to display trainers','vw-wellness-coach'),
		    'section' => 'vw_wellness_coach_trainer_section',
		));

	  	// Trainer excerpt
		$wp_customize->add_setting( 'vw_wellness_coach_trainer_excerpt_number', array(
			'default'              => 30,
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'vw_health_coaching_sanitize_number_range'
		) );
		$wp_customize->add_control( 'vw_wellness_coach_trainer_excerpt_number', array(
			'label'       => esc_html__( 'Trainer Excerpt length','vw-wellness-coach' ),
			'section'     => 'vw_wellness_coach_trainer_section',
			'type'        => 'range',
			'settings'    => 'vw_wellness_coach_trainer_excerpt_number',
			'input_attrs' => array(
				'step'             => 5,
				'min'              => 0,
				'max'              => 50,
			),
		) );

		$wp_customize->add_setting('vw_wellness_coach_trainer_button_text',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_wellness_coach_trainer_button_text',array(
			'label'	=> __('Add Trainer Button Text','vw-wellness-coach'),
			'input_attrs' => array(
	            'placeholder' => __( 'READ MORE', 'vw-wellness-coach' ),
	        ),
			'section'=> 'vw_wellness_coach_trainer_section',
			'type'=> 'text'
		));

	}
	add_action( 'customize_register', 'vw_wellness_coach_customizer' );

	define('VW_WELLNESS_CAOCH_FREE_THEME_DOC',__('https://www.vwthemesdemo.com/docs/free-vw-wellness-coach/','vw-wellness-coach'));
	define('VW_WELLNESS_CAOCH_SUPPORT',__('https://wordpress.org/support/theme/vw-wellness-coach/','vw-wellness-coach'));
	define('VW_WELLNESS_CAOCH_REVIEW',__('https://wordpress.org/support/theme/vw-wellness-coach/reviews','vw-wellness-coach'));
	define('VW_WELLNESS_CAOCH_BUY_NOW',__('https://www.vwthemes.com/themes/wellness-coach-wordpress-theme/','vw-wellness-coach'));
	define('VW_WELLNESS_CAOCH_LIVE_DEMO',__('https://www.vwthemes.net/vw-wellness-coach/','vw-wellness-coach'));
	define('VW_WELLNESS_CAOCH_PRO_DOC',__('https://www.vwthemesdemo.com/docs/vw-health-coach-pro/','vw-wellness-coach'));
	define('VW_WELLNESS_CAOCH_FAQ',__('https://www.vwthemes.com/faqs/','vw-wellness-coach'));
	define('VW_WELLNESS_CAOCH_CONTACT',__('https://www.vwthemes.com/contact/','vw-wellness-coach'));
	define('VW_WELLNESS_CAOCH_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','vw-wellness-coach'));
	define('VW_WELLNESS_CAOCH_CREDIT',__('https://www.vwthemes.com/themes/free-wellness-coach-wordpress-theme/','vw-wellness-coach'));

	if ( ! function_exists( 'vw_wellness_coach_credit' ) ) {
		function vw_wellness_coach_credit(){
			echo "<a href=".esc_url(VW_WELLNESS_CAOCH_CREDIT)." target='_blank'>". esc_html__('VW Wellness Coach WordPress Theme','vw-wellness-coach') ."</a>";
		}
	}

	function vw_wellness_coach_sanitize_choices( $input, $setting ) {
	    global $wp_customize; 
	    $control = $wp_customize->get_control( $setting->id ); 
	    if ( array_key_exists( $input, $control->choices ) ) {
	        return $input;
	    } else {
	        return $setting->default;
	    }
	}

	function vw_wellness_coach_sanitize_dropdown_pages( $page_id, $setting ) {
	  	$page_id = absint( $page_id );
	  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

// Customizer Pro
load_template( ABSPATH . WPINC . '/class-wp-customize-section.php' );

class VW_Wellness_Coach_Customize_Section_Pro extends WP_Customize_Section {
	public $type = 'vw-wellness-coach';
	public $pro_text = '';
	public $pro_url = '';
	public function json() {
		$json = parent::json();
		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );
		return $json;
	}
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

final class VW_Wellness_Coach_Customize {
	public static function get_instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}
		return $instance;
	}
	private function __construct() {}
	private function setup_actions() {
		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );
		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}
	public function sections( $manager ) {
		// Register custom section types.
		$manager->register_section_type( 'VW_Wellness_Coach_Customize_Section_Pro' );
		// Register sections.
		$manager->add_section( new VW_Wellness_Coach_Customize_Section_Pro( $manager, 'vw_wellness_coach_upgrade_pro_link',
		array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW WELLNESS PRO', 'vw-wellness-coach' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-wellness-coach' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wellness-coach-wordpress-theme/'),
		) ) );

		// Register sections.
		$manager->add_section(new VW_Wellness_Coach_Customize_Section_Pro($manager,'vw_wellness_coach_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-wellness-coach' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-wellness-coach' ),
			'pro_url'  => admin_url('themes.php?page=vw_wellness_coach_guide'),
		)));
	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'vw-wellness-coach-customize-controls', get_stylesheet_directory_uri() . '/js/customize-controls-child.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'vw-wellness-coach-customize-controls', get_stylesheet_directory_uri() . '/css/customize-controls-child.css' );
	}
}
VW_Wellness_Coach_Customize::get_instance();

/* getstart */
require get_theme_file_path('/inc/getstart/getstart.php');

/* TGM */
require get_theme_file_path('/inc/tgm/tgm.php');

/* Plugin Activation */
require get_theme_file_path('/inc/getstart/plugin-activation.php');

/* Block Pattern */
require get_theme_file_path('/inc/block-patterns/block-patterns.php');