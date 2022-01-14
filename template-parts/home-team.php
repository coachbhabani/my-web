<?php if (get_theme_mod('icare_show_team') == 'on') {    ?>
<section id="icare-home-team-section">
  <div class="container pb-30 pb-sm-0">
  <?php if (get_theme_mod('icare_team_head') != "" || get_theme_mod('icare_team_desc') != "") {?>
    <div class="section-heading text-center">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <?php if (get_theme_mod('icare_team_head') != "") {?>
          <h2 class="mt-zero mb-ten line-height-one text-uppercase"><?php echo esc_attr(get_theme_mod('icare_team_head')); ?></h2>
          <?php } if (get_theme_mod('icare_team_desc') != "") {?>
          <p><?php echo esc_attr(get_theme_mod('icare_team_desc')); ?></p>
          <?php } ?>
        </div>
      </div>
    </div><?php 
    } ?>
    <div class="section-content">
      <div class="row"><?php
        for ($i = 1; $i < 5; $i++) {
          $icarefitness_team_page_id   = get_theme_mod('icare_team_page' . $i);
          if ($icarefitness_team_page_id) {
              $icarefitness_args  = array('page_id' => absint($icarefitness_team_page_id));
              $icarefitness_query = new WP_Query($icarefitness_args);
              if ($icarefitness_query->have_posts()):
                  while ($icarefitness_query->have_posts()): $icarefitness_query->the_post();
                  $icarefitness_team_designation = get_theme_mod('icare_team_designation'.$i);
                  $icarefitness_team_facebook = get_theme_mod('icare_team_facebook'.$i);
                  $icarefitness_team_twitter = get_theme_mod('icare_team_twitter'.$i);
                  $icare_team_linkedin = get_theme_mod('icare_team_linkedin'.$i);?>
        <div class="col-sm-6 col-md-3 mb-sm-30">
          <div class="team-block">
          <a href="<?php the_permalink(); ?>">
            <div class="team-thumb">
            <?php if( has_post_thumbnail() ){
                the_post_thumbnail('icare_home_team_profile',array("class"=>'img-full-width'));
                } ?>
              <div class="team-overlay">
				<div class="info text-center">
				  <a href="<?php the_permalink(); ?>"><h4 class="text-white"><?php the_title(); ?> <small class="mt-10"><?php echo esc_attr($icarefitness_team_designation); ?></small></h4></a>
				  <ul class="styled-icons icon-circled icon-dark icon-sm text-white">
					<li><a href="<?php echo esc_url($icarefitness_team_facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="<?php echo esc_url($icarefitness_team_twitter); ?>"><i class="fab fa-twitter"></i></a></li>
					<li><a href="<?php echo esc_url($icare_team_linkedin); ?>"><i class="fab fa-linkedin-in"></i></a></li>
				  </ul>
				</div>
              </div>
            </div>
            </a>
            <div class="info bg-white text-center">
              <p class="team-info"><?php 
                  if(has_excerpt()){
                    echo wp_kses_post( get_the_excerpt() );
                  }else{
                    echo wp_kses_post( the_excerpt() );
                  }?></p>
            </div>
          </div>
        </div>
      <?php endwhile; 
      endif; 
      } 
    }?>
      </div>
    </div>
  </div>
</section>
<?php } ?>