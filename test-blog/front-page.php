<?php
/**
 * The main template file
 * 
 * @package bootstrap-basic
 */

get_header();
?>

 				<div class="container">
				<div class="col-md-12 content-area" id="main-column">
					<main id="main" class="site-main" role="main">						
                       <?php the_content(); ?>
					</main>
				</div>
				</div>
 
<?php get_footer(); ?> 