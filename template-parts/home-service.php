<!-- Section: Why Choose Us  -->
<?php if (get_theme_mod('icare_show_services') == 'on') {    ?>
<section id="icare-home-service-section" >
  <div class="container pb-thirty"><?php
if (get_theme_mod('icare_service_head') != "" || get_theme_mod('icare_service_desc') != "") {?>
	<div class="section-heading text-center">
	  <div class="row">
		<div class="col-md-12">
		<?php if (get_theme_mod('icare_service_head') != "") {?>
		  <h2 id="service_title" class="mt-zero mb-ten line-height-one text-uppercase"><?php echo esc_attr(get_theme_mod('icare_service_head')); ?></h2>
		  <?php } if (get_theme_mod('icare_service_desc') != "") {?>
          <p id="service_desc"><?php echo esc_attr(get_theme_mod('icare_service_desc')); ?></p>
          <?php } ?>
		</div>
	  </div>
	</div><?php
}?>
	<div class="section-content">
	  <div class="row mtli-row-clearfix"><?php
		for ($i = 1; $i < 7; $i++) {
        	$icarefitness_service_page_id   = get_theme_mod('icare_service_page' . $i);
        	$icarefitness_service_page_icon = get_theme_mod('icare_service_page_icon' . $i);

	        if ($icarefitness_service_page_id) {
	            $icarefitness_args  = array('page_id' => absint($icarefitness_service_page_id));
	            $icarefitness_query = new WP_Query($icarefitness_args);
	            if ($icarefitness_query->have_posts()):
	                while ($icarefitness_query->have_posts()): $icarefitness_query->the_post();
	                    ?>
					<div class="col-xs-12 col-sm-6 col-md-4">
			          <div class="icare-icon-box p-twenty mb-thirty border-1pt hvr-float-shadow">
			            <div class="text-center">
							<a id="service_ico_img<?php echo absint($i);?>" class="icon icon-color flip mb-zero mr-zero mt-five" href="<?php the_permalink(); ?>">
							 <?php if(get_theme_mod('icare_service_img_or_icon' . $i)=='img' && get_theme_mod('icare_service_page_img' . $i)!=""):?>
								<img src="<?php echo esc_url_raw(get_theme_mod('icare_service_page_img' . $i));?>" alt="<?php the_title(); ?>">
							  <?php else: ?>
								<i class="<?php echo esc_attr($icarefitness_service_page_icon); ?> icare-text-colored"></i>
							<?php endif; ?>
							</a>
			            </div>
			            <div class="icon-box-details media-body text-center pt-20">
			              <h5 class="icon-box-title m-zero mb-five"><?php the_title(); ?></h5>
			              <p><?php 
								if(has_excerpt()){
									echo wp_kses_post( get_the_excerpt() );
								}else{
									echo wp_kses_post( the_excerpt() );
								}
							 ?>
							</p>
			              <a href="<?php the_permalink(); ?>" class="btn btn-theme btn-border"><?php esc_html_e( 'Read More', 'icarefitness' ); ?></a>
			            </div>
			          </div>
			        </div>
			        <?php
	   				 endwhile;
	            endif;
            	wp_reset_postdata();
        	}
    	}	?>
	  </div>
	</div>
  </div>
</section>
<?php }?>