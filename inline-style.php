<?php

	/*---------------------First highlight color----------------*/

	$vw_health_coaching_first_color = get_theme_mod('vw_health_coaching_first_color');

	$vw_wellness_coach_custom_css = '';

	if($vw_health_coaching_first_color != false){
		$vw_wellness_coach_custom_css .='a.button:hover, .view-more,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,.scrollup i,.category_main:nth-child(odd),input[type="submit"], input.button,#footer .tagcloud a:hover,#footer-2,.pagination span, .pagination a,#sidebar .woocommerce-product-search button,#sidebar .tagcloud a:hover,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.toggle-nav i, .appointment-btn a, #trainer-sec hr, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button{';
			$vw_wellness_coach_custom_css .='background-color: '.esc_attr($vw_health_coaching_first_color).';';
		$vw_wellness_coach_custom_css .='}';
	}
	if($vw_health_coaching_first_color != false){
		$vw_wellness_coach_custom_css .='a, #topbar i,#topbar .custom-social-icons i:hover,.logo h1 a, .logo p.site-title a,.category_main .view-more,#footer li a:hover, #sidebar li a:hover,.post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a,.main-navigation a:hover,.main-navigation ul.sub-menu a:hover{';
			$vw_wellness_coach_custom_css .='color: '.esc_attr($vw_health_coaching_first_color).';';
		$vw_wellness_coach_custom_css .='}';
	}
	if($vw_health_coaching_first_color != false){
		$vw_wellness_coach_custom_css .='.woocommerce-product-details__short-description p a, .textwidget p a, .entry-content a, .sidebar p a, #comments p a, .comment-meta.commentmetadata a{';
			$vw_wellness_coach_custom_css .='color: '.esc_attr($vw_health_coaching_first_color).'!important;';
		$vw_wellness_coach_custom_css .='}';
	}
	if($vw_health_coaching_first_color != false){
		$vw_wellness_coach_custom_css .='a.button:hover, .post-info hr,.main-navigation ul ul{';
			$vw_wellness_coach_custom_css .='border-color: '.esc_attr($vw_health_coaching_first_color).';';
		$vw_wellness_coach_custom_css .='}';
	}
	
	/*---------------------Second highlight color----------------*/
	
	$vw_health_coaching_second_color = get_theme_mod('vw_health_coaching_second_color');

	if($vw_health_coaching_second_color != false){
		$vw_wellness_coach_custom_css .='#topbar,#slider,.category_main:nth-child(even),#footer,#comments input[type="submit"].submit:hover, #sidebar input[type="submit"]:hover, .error-btn a:hover, .content-bttn a:hover, #footer input[type="submit"]:hover,.pagination .current,.pagination a:hover,#sidebar .woocommerce-product-search button:hover,.appointment-btn a:hover, .header-fixed{';
			$vw_wellness_coach_custom_css .='background-color: '.esc_attr($vw_health_coaching_second_color).';';
		$vw_wellness_coach_custom_css .='}';
	}

	if($vw_health_coaching_second_color != false){
		$vw_wellness_coach_custom_css .=' #sidebar h3,.post-main-box h2 a, .main-navigation a,.search-box i, #trainer-sec h3, #sidebar .wp-block-search .wp-block-search__label{';
			$vw_wellness_coach_custom_css .='color: '.esc_attr($vw_health_coaching_second_color).';';
		$vw_wellness_coach_custom_css .='}';
	}