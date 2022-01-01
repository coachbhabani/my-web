<?php
//about theme info
add_action( 'admin_menu', 'vw_wellness_coach_gettingstarted' );
function vw_wellness_coach_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Wellness Coach', 'vw-wellness-coach'), esc_html__('About VW Wellness Coach', 'vw-wellness-coach'), 'edit_theme_options', 'vw_wellness_coach_guide', 'vw_wellness_coach_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_wellness_coach_admin_theme_style() {
   wp_enqueue_style('vw-wellness-coach-custom-admin-style', get_theme_file_uri() . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-wellness-coach-tabs', get_theme_file_uri() . '/inc/getstart/js/tab.js');
   wp_enqueue_style( 'font-awesome', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'vw_wellness_coach_admin_theme_style');

//guidline for about theme
function vw_wellness_coach_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-wellness-coach' );
?>

<div class="wrapper-info">
	<div class="col-left">
		<h2><?php esc_html_e( 'Welcome to VW Wellness Coach Theme', 'vw-wellness-coach' ); ?> <span class="version"><?php esc_html_e( 'Version', 'vw-wellness-coach' ); ?>: <?php echo esc_html($theme['Version']);?></span></h2>
		<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-wellness-coach'); ?></p>
	</div>

	<div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Wellness Coach at 20% Discount','vw-wellness-coach'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-wellness-coach'); ?> ( <span><?php esc_html_e('vwpro20','vw-wellness-coach'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_WELLNESS_CAOCH_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-wellness-coach' ); ?></a>
			</div>
		</div>
   </div>

 	<div class="tab-sec">
		<div class="tab">
		  	<button class="tablinks" onclick="vw_wellness_coach_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-wellness-coach' ); ?></button>
		  	<button class="tablinks" onclick="vw_wellness_coach_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-wellness-coach' ); ?></button>
			<button class="tablinks" onclick="vw_wellness_coach_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-wellness-coach' ); ?></button>
			<button class="tablinks" onclick="vw_wellness_coach_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-wellness-coach' ); ?></button>
		  	<button class="tablinks" onclick="vw_wellness_coach_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-wellness-coach' ); ?></button>
		</div>

		<?php
			$vw_wellness_coach_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_wellness_coach_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Wellness_Coach_Plugin_Activation_Settings::get_instance();
				$vw_wellness_coach_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-wellness-coach-recommended-plugins">
				    <div class="vw-wellness-coach-action-list">
				        <?php if ($vw_wellness_coach_actions): foreach ($vw_wellness_coach_actions as $key => $vw_wellness_coach_actionValue): ?>
				                <div class="vw-wellness-coach-action" id="<?php echo esc_attr($vw_wellness_coach_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_wellness_coach_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_wellness_coach_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_wellness_coach_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-wellness-coach'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_wellness_coach_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-wellness-coach' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Wellness Coach is a fantastic theme for health and wellness coaches, health training coaches, and mentors. Health specialists, dieticians, fitness coaches, yoga trainers, counselors, holistic life coaches, etc. will also find the design useful. The design is crafted by expert developers and makes use of a minimal approach while crafting the theme. There are elegant and sophisticated content elements included in the theme design that also has a retina-ready display giving the pixel-perfect look of the images and content shown on your web page. Clean and secure codes that are highly optimized are tested for speed and deliver faster page load time. This responsive theme has a beautiful layout that can also be customized with the help of personalization options and there is no need to code. The SEO-friendly theme gives you the great benefit of featuring in the best SEO ranks and get noticed easily. It further includes a well-designed banner, testimonial section, and plenty of Call to Action Button (CTA) fitted at the right places. As this theme is mobile-friendly, your website is going to look fabulous on mobile phones and other small-screen devices. Animations added to the design make the overall website lively and interactive. It is a modern theme with a translation-ready feature.','vw-wellness-coach'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-wellness-coach' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-wellness-coach' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_WELLNESS_CAOCH_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-wellness-coach' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-wellness-coach'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-wellness-coach'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-wellness-coach'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-wellness-coach'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-wellness-coach'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_WELLNESS_CAOCH_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-wellness-coach'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-wellness-coach'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-wellness-coach'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_WELLNESS_CAOCH_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-wellness-coach'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-wellness-coach' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-wellness-coach'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Section','vw-wellness-coach'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-wellness-coach'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-wellness-coach'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-wellness-coach'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-wellness-coach'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-wellness-coach'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-wellness-coach'); ?></a>
								</div> 
							</div>
						</div>
					</div>

			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-wellness-coach'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-wellness-coach'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-wellness-coach'); ?></span><?php esc_html_e(' Go to ','vw-wellness-coach'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-wellness-coach'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-wellness-coach'); ?></p>
	                  	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-wellness-coach'); ?></span><?php esc_html_e(' Go to ','vw-wellness-coach'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-wellness-coach'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-wellness-coach'); ?></p>
	                  	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-wellness-coach'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-wellness-coach/" target="_blank"><?php esc_html_e('Documentation','vw-wellness-coach'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Wellness_Coach_Plugin_Activation_Settings::get_instance();
			$vw_wellness_coach_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-wellness-coach-recommended-plugins">
				    <div class="vw-wellness-coach-action-list">
				        <?php if ($vw_wellness_coach_actions): foreach ($vw_wellness_coach_actions as $key => $vw_wellness_coach_actionValue): ?>
				                <div class="vw-wellness-coach-action" id="<?php echo esc_attr($vw_wellness_coach_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_wellness_coach_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_wellness_coach_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_wellness_coach_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-wellness-coach'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_wellness_coach_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-wellness-coach' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-wellness-coach'); ?></p>
              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-wellness-coach'); ?></span></b></p>
              	<div class="vw-wellness-coach-pattern-page">
			    		<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-wellness-coach'); ?></a>
			    	</div>
              	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	         </div>	

            <div class="block-pattern-link-customizer">
              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-wellness-coach' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-wellness-coach'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-wellness-coach'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-wellness-coach'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-wellness-coach'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-wellness-coach'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-wellness-coach'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-wellness-coach'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-wellness-coach'); ?></a>
								</div> 
							</div>
						</div>
					</div>		
        		</div>
			</div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Wellness_Coach_Plugin_Activation_Settings::get_instance();
			$vw_wellness_coach_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-wellness-coach-recommended-plugins">
				    <div class="vw-wellness-coach-action-list">
				        <?php if ($vw_wellness_coach_actions): foreach ($vw_wellness_coach_actions as $key => $vw_wellness_coach_actionValue): ?>
				                <div class="vw-wellness-coach-action" id="<?php echo esc_attr($vw_wellness_coach_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_wellness_coach_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_wellness_coach_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_wellness_coach_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-wellness-coach' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-wellness-coach-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-wellness-coach'); ?></a>
			   </div>

			   <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-wellness-coach' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-wellness-coach'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-wellness-coach'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-wellness-coach'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-wellness-coach'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-wellness-coach'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-wellness-coach'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_health_coaching_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-wellness-coach'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-wellness-coach'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-wellness-coach' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Wellness Coach WordPress Theme is a fresh and feature-rich solution for creating a modern and trendy wellness coach website that shows your expertise and services in the most appealing and convincing way. This is a fine lead-generating theme for coaching experts, coaches, mentors, therapists, speakers, as well as entrepreneurs. The layout is entirely customizable and gives you enough design options for making the default design completely yours. The layout supports showcasing all your wellness coaching expertise and experience in the field. WP Wellness Coach WordPress Theme has a wonderful sticky header supporting smooth navigation and easy switching between the pages and sections. There are several sections displaying every individual service, how many clients you have served, and their experience with your services. It comes with a full-width slider that instantly catches the eyeballs and draws the attention of your target audience towards the key content without any diversion.','vw-wellness-coach'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_WELLNESS_CAOCH_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-wellness-coach'); ?></a>
					<a href="<?php echo esc_url( VW_WELLNESS_CAOCH_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-wellness-coach'); ?></a>
					<a href="<?php echo esc_url( VW_WELLNESS_CAOCH_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-wellness-coach'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-wellness-coach' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-wellness-coach'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-wellness-coach'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-wellness-coach'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-wellness-coach'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-wellness-coach'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><?php esc_html_e('14', 'vw-wellness-coach'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-wellness-coach'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-wellness-coach'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-wellness-coach'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-wellness-coach'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-wellness-coach'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-wellness-coach'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-wellness-coach'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_WELLNESS_CAOCH_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-wellness-coach'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-wellness-coach'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-wellness-coach'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_WELLNESS_CAOCH_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-wellness-coach'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-wellness-coach'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-wellness-coach'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_WELLNESS_CAOCH_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-wellness-coach'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-wellness-coach'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-wellness-coach'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_WELLNESS_CAOCH_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-wellness-coach'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-wellness-coach'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-wellness-coach'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_WELLNESS_CAOCH_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-wellness-coach'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-wellness-coach'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-wellness-coach'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_WELLNESS_CAOCH_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-wellness-coach'); ?></a>
				</div>
		  	</div>
		</div>

	</div>
</div>
<?php } ?>