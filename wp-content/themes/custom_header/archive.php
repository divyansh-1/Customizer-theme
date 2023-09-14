<?php get_header(); ?>

<div class="home_banner blog-bg">
    <div class="container">
        <div class="banner-content text-center">
            <h1>Archive</h1>
        </div>
    </div>
</div> 

<section class="blog-row">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12">
            	<?php if (have_posts()) : ?>

			 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			 	  <?php /* If this is a category archive */ if (is_category()) { ?>
					<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
			 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
					<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
			 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
					<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
			 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
					<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
			 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
					<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
				  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
					<h2 class="pagetitle">Author Archive</h2>
			 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<h2 class="pagetitle">Blog Archives</h2>
			 	  <?php } ?>

					<?php while (have_posts()) : the_post(); ?>
					<div class="post">
							<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							<small><?php the_time('l, F jS, Y') ?></small>

							<div class="entry">
								<?php the_content() ?>
							</div>

							<p class="postmetadata"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_ID(); ?></a> | posted at <b><?php the_time('F jS, Y') ?></b> in <?php the_category(', ') ?> <?php the_tags('| Tags: ', ', ', ''); ?> <?php edit_post_link('Edit', ' | ', ''); ?></p>

						</div>

					<?php endwhile; ?>

					<div class="navigation">
						<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
						<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
					</div>

				<?php else : ?>

					<h2 class="center">Not Found</h2>
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>

				<?php endif; ?>

			</div>
			 <div class="col-sm-3">                
                <?php get_sidebar(); ?>               
            </div>
            </div>
           

        </div>
    </div>
</section> 

<?php get_footer(); ?>