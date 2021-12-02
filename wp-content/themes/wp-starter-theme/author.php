<?php get_header();?>

<div class="container">

    <h1 class="content__title">Latest Posts From <?php the_author_meta('display_name'); ?></h1>

    <?php do_action('ns_show_breadcrumb'); ?>

    <?php get_template_part('templates/content', 'sidebar-left'); ?>

</div>

<?php get_footer(); ?>

