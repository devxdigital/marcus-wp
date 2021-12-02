<?php get_header(); ?>

<div class="container inner-page mb-4 page-single-news">
    <?php //if_quick_summary(); ?>

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
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card left-sidebar">
                <div class="card-body">
                    <?php $format = get_post_format() ?: 'standard'; ?>
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="list-group list-group-flush left-menu custom-sidebar-space collapse" id="jumpTo">
                                <a id="account-dropdown" class="list-group-item d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <h5>Account Detail</h5>
                                    <span class="text-theme"><i class="fas fa-minus"></i></span>
                                </a>
                                <div class="collapse show list-group-submenu" id="collapseExample">
                                    <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/transactions/" class="list-group-item sub-item" data-parent="#collapseExample">Carrie Cook <span class="float-end">7053</span></a>
                                    <a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/transactions/" class="list-group-item sub-item" data-parent="#collapseExample">Hunter R. Hicks <span class="float-end">8617</span></a>
                                </div>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="#">
                                    <h5>Available Investments</h5>
                                </a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/news-updates/">
                                    <h5>News & Updates</h5>
                                </a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/profile-settings/">
                                    <h5>My Information</h5>
                                </a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="#">
                                    <h5>Referrals</h5>
                                </a>
                                <div class="list-group-item">
                                    <a href="#"><h5 class="mb-3">Reviews</h5></a>
                                    <img class="me-3" src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/themes/wp-starter-theme/assets/images/fb_stars.png">
                                    <img class="me-3" src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/themes/wp-starter-theme/assets/images/g_stars.png">
                                    <img class="" src="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/wp-content/themes/wp-starter-theme/assets/images/bbb_stars.png">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
                            <div role="main" class="pt-1">
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
                        <h3 class="pb-4">Related News</h3>
                        <div class="col-lg-4 col-sm-4 col-12 mb-4 mb-sm-0">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/rel1.png" class="w-100 img-fluid wp-post-image" alt="" loading="lazy" width="280" height="170">
                            <h5>Hard Money Lender Moves in on Hot Phoenix Market</h5>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-12 mb-4 mb-sm-0">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/rel2.png" class="w-100 img-fluid wp-post-image" alt="" loading="lazy" width="280" height="170">
                            <h5>From Old to New: Why Apartment Conversions are Taking the Market by Storm</h5>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-12">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/rel3.png" class="w-100 img-fluid wp-post-image" alt="" loading="lazy" width="280" height="170">
                            <h5>Underwriting: Breaking down the Basics</h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
get_footer();
