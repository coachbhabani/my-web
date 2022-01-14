<?php
if(get_theme_mod('icare_slider_shortcode') && get_theme_mod('icare_slider_shortcode')!="" && get_theme_mod('icare_show_hero')=='on'){
	echo do_shortcode(get_theme_mod('icare_slider_shortcode'));
}elseif(get_theme_mod('icare_hero_image') && get_theme_mod('icare_hero_image')!="" && get_theme_mod('icare_show_hero')=='on') {?>
<section id="icare-home-slider-section" class="layer-overlay">
	<div class="container-fluid p-zero wrap">
		<div class="h_bg"><img class="img-responsive" alt="<?php echo esc_attr(get_theme_mod('icare_hero_title'));?>" src="<?php echo esc_url(get_theme_mod('icare_hero_image'));?>"/></div>
		<div class="text-wrap">
		<?php if(get_theme_mod('icare_hero_title')!=""){?>
			<div id="h_title" class="text-uppercase text-white font-raleway icare-theme-bg-colored-transparent slider-title"><?php echo esc_attr(get_theme_mod('icare_hero_title'));?></div>
		<?php } ?>
		<?php if(get_theme_mod('icare_hero_desc')!=""){?>
			<div id="h_subtitle" class="text-uppercase text-white font-raleway slider-desc"><?php echo esc_attr(get_theme_mod('icare_hero_desc'));?></div>
		<?php } ?>
		
		<?php if(get_theme_mod('icarefitness_hero_btn')!= "" && get_theme_mod('icarefitness_hero_btn_url')!= ""){?>
			<a href="<?php echo esc_url(get_theme_mod('icarefitness_hero_btn_url')); ?>" class="btn btn-theme mt-20 btn-slider"><?php echo esc_html(get_theme_mod('icarefitness_hero_btn')); ?></a>
		<?php } ?>
		</div>
	</div>
</section>
<?php } ?>