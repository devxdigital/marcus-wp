<?php while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('pe-sm-4'); ?>>

	    <header class="entry-header">
	        <?php the_title('<h1 class="content__title entry-title text-uppercase">', '</h1>');?>
	    </header>

		<div class="entry-content">
	        <?php the_content(); ?>
	    </div>

	</article>

	<?php //this is for <!--nextpage--> tag
	wp_link_pages(array('before' => '<nav class="page-nav">' . __('Pages:', 'wp-starter-theme'), 'after' => '</nav>')); ?>

<?php endwhile; ?>