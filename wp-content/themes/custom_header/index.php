<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="home_banner blog-bg">
	    <div class="container">
	        <div class="banner-content text-center">
	            <h1><?php the_title(); ?></h1>
	        </div>
	    </div>
</div>

<section class="page-row">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="entry">
						<?php the_content(); ?>
					</div>
									
				</div>
			</div>
		</div>
</section>
<?php endwhile; endif; ?>	
<?php get_footer(); ?>