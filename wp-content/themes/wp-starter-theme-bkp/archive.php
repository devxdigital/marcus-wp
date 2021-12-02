<?php get_header(); ?>


<div class="container">

    <h1 class="content__title entry-title">
        <?php
        if ( is_day() ){
            echo 'Daily Archives: <span>' . get_the_date() . '</span>';
        }elseif ( is_month() ) {
            echo 'Monthly Archives: <span>' . get_the_date('F Y') . '</span>';
        }elseif ( is_year() ) {
            echo 'Yearly Archives: <span>' . get_the_date('Y') . '</span>';
        }elseif (get_the_archive_title () !='') {
            echo get_the_archive_title();
        }else {
            echo 'Blog Archives';
        } ?>
    </h1>

    <?php do_action('ns_show_breadcrumb'); ?>

    <?php get_template_part('templates/content', 'sidebar-left'); ?>

</div>


<?php get_footer(); ?>