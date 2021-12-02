<?php while (have_posts()) : the_post(); ?>

     <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('post-loop', array('class' => 'mb-4 w-100 img-fluid'));
            }
        ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('pe-1'); ?>>
       

        <header class="entry-header mt-4 mb-4">
            <?php the_title('<h1 class="content__title entry-title text-uppercase">', '</h1>');?>
        </header>

        <div class="entry-content pe-sm-4">
            <?php the_content(); ?>
            <?php get_template_part('templates/partials/entry-meta'); ?>
        </div>

    </article>

    <?php //this is for <!--nextpage--> tag
    wp_link_pages(array('before' => '<nav class="page-nav">' . __('Pages:', 'wp-starter-theme'), 'after' => '</nav>')); ?>

<?php endwhile; ?>

    <?php //comments_template(); ?>

