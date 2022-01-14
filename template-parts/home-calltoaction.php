<!-- Section: Call To Action -->
 <?php if (get_theme_mod('icare_show_cta') !='on') {return;}?>
<section id="icare-home-cta-section" class="icare-theme-bg-colored border-left border-3pt">
  <div class="container pt-zero pb-zero">
    <div class="row">
	  <div class="wrap cta-wrap one-fourth clearfix">
			<div class="cta-wrap-inner">
				<div class="column column_image">
					<div class="image_frame image_item no_link scale-with-grid no_border">
						<div class="image_wrapper">
						<?php if (get_theme_mod('icarefitness_cta_image') != "") {?>
						  <img class="scale-with-grid" src="<?php echo esc_url(get_theme_mod('icarefitness_cta_image')); ?>" alt="fitness2-home-steps" title="fitness2-home-steps" width="780" height="780">
						<?php }?>
						</div>
					</div>
				</div>
			</div>
	  </div>
      <div class="ml-30p cta-ml-zero">
        <div class="call-to-action pt-fifty pb-fifty">
        <?php if (get_theme_mod('icare_calltoaction_title') != "") {?>
          <h3 id="cta_title" class="mt-0"><?php echo esc_html(get_theme_mod('icare_calltoaction_title')); ?></h3>
        <?php }?>
		<?php if (get_theme_mod('icarefitness_cta_desc') != "") {?>
		<p><?php echo esc_html(get_theme_mod('icarefitness_cta_desc')); ?></p>
		<?php }?>
        <?php if (get_theme_mod('icare_calltoaction_btn1_url') != "" && get_theme_mod('icare_calltoaction_btn1_text') != ""): ?>
              <a href="<?php echo esc_url(get_theme_mod('icare_calltoaction_btn1_url')); ?>" id="cta_btn" class="btn btn-default btn-transparent mr-ten"><?php echo esc_attr(get_theme_mod('icare_calltoaction_btn1_text')); ?></a>
        <?php endif;?>
          <?php if (get_theme_mod('icare_calltoaction_btn2_url') != "" && get_theme_mod('icare_calltoaction_btn2_text') != ""): ?>
              <a href="<?php echo esc_url(get_theme_mod('icare_calltoaction_btn2_url')); ?>" id="cta_btn" class="btn btn-colored btn-dark"><?php echo esc_attr(get_theme_mod('icare_calltoaction_btn2_text')); ?></a>
        <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</section>