<div class="row g-0">
    <div class="col-12 col-lg-3">
        <div id="dropdown-menu" class="inner-page-title" href="#jumpTo" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="jumpTo">
            <div class="row g-0">
                <div class="col-6">
                    <h5>Jump to...</h5>

                </div>
                <div class="col-6 text-end">
                    <span class="dropdown-toggle"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-9 d-none d-lg-block">
        <div class="inner-page-title">
            <h5>&nbsp;</h5>
        </div>
        <div role="main" class="pt-5">
            <?php if (have_posts()) : ?>

                <?php
                if (is_page() || is_single()) {

                    get_template_part('templates/content', get_post_type());
                } else {
                    while (have_posts()) {
                        the_post();
                        get_template_part('templates/loop');
                    }
                ?>
                    <div class="pagination pagination-bot">
                        <a class="prev">&lt;&lt; PREVIOUS</a>
                        <a class="next">NEXT &gt;&gt;</a>
                    </div>
                <?php
                    //do_action('ns_show_pagination');
                }
                ?>

            <?php else : ?>

                <div class="alert alert-warning" role="alert">
                    <?php _e('Sorry, no results were found.', 'wp-starter-theme'); ?>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>
