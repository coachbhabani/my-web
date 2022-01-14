<?php
/**
 * Template Name: Blog
 *
 * @package icare-fitness
 */
get_header();
get_template_part('breadcrumbs'); ?>
<section class="bg-white">
  <div class="container pt-fifty pb-fifty">
	<div class="row">
	  <div class="col-md-<?php echo is_active_sidebar( 'sidebar-r' ) ? 9 : 12; ?>">
		<div class="blog-posts">
		  <div class="col-md-12">
			<div class="row">
			  <?php
				$icarefitness_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$icarefitness_args = array('post_type' => 'post', 'paged' => $icarefitness_paged);
				$icarefitness_query = new WP_Query($icarefitness_args);
				while ($icarefitness_query->have_posts()):
					$icarefitness_query->the_post();
					get_template_part( 'template-parts/content', 'excerpt' );
				endwhile;
				wp_link_pages();
			   ?>
			</div>
		  </div>
		  <?php icare_pagination(); ?>
		</div>
	  </div>
		  <?php get_sidebar(); ?>
	</div>
  </div>
</section>
<?php
get_footer();