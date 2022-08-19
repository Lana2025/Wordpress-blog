<?php get_header();?>
<div class="container">
<h1 class="my-4 page-title"><?wp_title();?></h1>
<?php if (have_posts()): while(have_posts()): the_post();?>
<h2 class="card-title"><a href="<?the_permalink();?>"><?php the_title(); ?></a></h2>
<div class="card mb-4">
 <div class="row">
    <div class="col-sm-4">
     <a href="<?php the_permalink();?>"><img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" alt="<?php the_title();?>"></a>
    </div>
    <div class="col-sm-8">
      <div class="card-body">
        <p class="card-text"><small class="text-muted"><?the_time('j F Y');?></small> <?php the_tags('');?></p>
        <?php the_content('');?>
				 
		 <?php the_time('l | d.m.Y') ?> | <?php the_category( ', ' ); ?>
		<a href="<?php the_permalink();?>" class="btn btn-primary shadow-none">Read more →</a>		 
       
    </div>
	</div>
    </div>
    
    
</div>


<?php endwhile; else:?>
    <p>Not found posts.</p>
<?php endif;?>
</div>
<?php get_footer();?>