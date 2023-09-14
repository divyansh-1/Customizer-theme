<?php get_header(); ?>

<div class="home_banner blog-bg">
    <div class="container">
        <div class="banner-content text-center">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div> 

<section class="blog-row">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="left-blog">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="blog-box single-blog">
                            	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            			<?php $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

								        <div class="post" id="post-<?php the_ID(); ?>">
								            <div class="img-box"><img class="img-responsive" src="<?php echo $feat_image_url; ?>"></div>
								            <div class="box_text">
								            <h4><?php the_title(); ?></h4>

								            <span class="s-dtl">By <?php echo get_the_author(); ?>, In <?php foreach((get_the_category()) as $category){ echo $category->name;}	?>, <?php echo get_comments_number($post->ID);?> Comments </span>

			                              
			                                <div class="blog-content">
			                                	<?php the_content();?>
			                                </div>
			                                </div>
								            
								        </div>

								    <?php endwhile; else: ?>

								        <p>Sorry, no posts matched your criteria.</p>

								<?php endif; ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">                
                <?php get_sidebar(); ?>               
            </div>
        </div>
    </div>
</section>    

<?php get_footer(); ?>
