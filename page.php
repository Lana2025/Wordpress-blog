
<?php 
/**
 * The page template file
 * 
 * @package bootstrap-basic
 */

get_header(); ?>


    <div class="container">
				<div class="col-md-12 content-area" id="main-column-1">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
	  	<?php the_content(); ?>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>
  </div>
  </div>

  
</div>


<?php get_footer(); ?>