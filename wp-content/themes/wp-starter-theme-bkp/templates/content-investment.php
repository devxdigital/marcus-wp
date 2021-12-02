<?php while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
			if (has_post_thumbnail()) {
				the_post_thumbnail('post-loop', array('class' => 'mb-3 w-100 img-fluid'));
			}
		?>

        <header class="entry-header">
            <?php the_title('<h1 class="content__title entry-title text-uppercase">', '</h1>');?>
        </header>

        <div class="entry-content">
            <?php the_content(); ?>
            <?php get_template_part('templates/partials/entry-meta'); ?>
        </div>

    </article>

    <?php //this is for <!--nextpage--> tag
    wp_link_pages(array('before' => '<nav class="page-nav">' . __('Pages:', 'wp-starter-theme'), 'after' => '</nav>')); ?>

<?php endwhile; ?>

    <?php comments_template(); ?>

