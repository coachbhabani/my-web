<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package iCare
 */
$icarefitness_class = is_single() ? 'clearfix mb-zero' : 'clearfix mb-twenty pb-twenty';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($icarefitness_class); ?>>
<?php if(has_post_thumbnail()): ?>
	<div class="content_entry">
	  <div class="meta-thumb thumb"> 
		<?php the_post_thumbnail('icare_blog_classic_img', array('class'=>'img-responsive img-fullwidth')); ?>
	  </div>
	</div>
	<?php endif; ?>
	<div class="entry-content border-1pt p-twenty pr-ten">
	  <div class="entry-meta media mt-zero bg-none border-none pb-twenty">
	   <?php if ( 'post' === get_post_type() ) : ?>
		<div class="meta-date media-left text-center flip icare-theme-bg-colored pt-five pr-fifteen pb-five pl-fifteen">
		<div class="entry-meta">
			<?php icare_posted_on(); ?>
		</div><!-- .entry-meta -->
		</div>
		<?php
		endif; ?>
		<div class="media-body pl-fifteen">
		  <div class="event-content pull-left flip">
			<?php if ( is_single() ) :
			the_title( '<h4 class="enrty-title text-uppercase m-zero mt-five">', '</h4>' );
		else :
			the_title( '<h5 class="entry-title text-white text-uppercase m-zero mt-five"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
		endif;?>
		<?php if ( 'post' === get_post_type() ) : ?>
			<span class="mb-ten text-darkgray mr-ten font-thirteen author vcard"><i class="fa fa-user mr-five icare-text-colored"></i> <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
			<span class="mb-ten text-darkgray mr-ten font-thirteen post-cats"><i class="fa fa-folder-open mr-five icare-text-colored"></i><?php echo get_the_category_list(','); ?> </span>
			<span class="mb-ten text-darkgray mr-ten font-thirteen"><i class="fa fa-commenting-o mr-five icare-text-colored"></i> <?php esc_url(comments_popup_link(esc_html__('No Comments', 'icarefitness'), esc_html__('1 Comment', 'icarefitness'), esc_html__('% Comments', 'icarefitness'))); ?></span>
			<?php
		endif; ?>
		  </div>
		</div>
	  </div>
	 <?php
			the_excerpt();
		?>
	  <div class="clearfix"></div>
	</div>
</article>
<?php if(is_single()):
icare_tags_links();
icare_about_author();
  endif; ?>
