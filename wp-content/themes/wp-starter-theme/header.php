<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php if (have_posts()) : ?>
            <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name') ?> Feed" href="<?php echo esc_url(home_url('/feed/')); ?>">
        <?php endif; ?>

        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet"> -->
        <?php wp_head(); ?>

        <!--[if lt IE 9]>
        <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/html5shiv.min.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body <?php body_class($GLOBALS['is_header_sticky']); ?>>
<?php
if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        do_action('wp_body_open');
    }

}
?>

        <header class="header bg-light text-dark">
            <?php if (!is_user_logged_in()): ?>
            <section class="topbar p-3 p-md-0">
                <div class="container">
                    <div class="row py-1">
                        <div class="col-12 d-flex align-items-center justify-content-center justify-content-md-start col-md-9 col-lg-10 mb-2 mb-md-0 client-login d-none d-sm-none d-md-block d-lg-block d-xl-block">
                            <?php if (!is_user_logged_in()) : ?>
                                <form action="<?php the_permalink(); ?>" method="post" class="row g-2 align-items-center sign-in">
                                    <input type="hidden" name="redirect" value="<?php echo home_url('/investors/dashboard'); ?>" />
                                    <p class="col-sm-auto col-form-label top-bar-client-text text-white text-uppercase fine-print custom-on-mobile"><?php _e('Client Login'); ?></p>
                                    <div class="col-5 col-sm-auto">
                                        <input type="text" class="form-control form-control-sm" name="username" id="username" placeholder="<?php _e('Username'); ?>">
                                    </div>
                                    <div class="col-5 col-sm-auto">
                                        <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="<?php _e('Password'); ?>">
                                    </div>
                                    <div class="col-2 col-sm-auto">
                                        <button type="submit" name="sign-in" class="btn btn-sm  btn-top-login-client">
                                            <!-- <i class="fas fa-play"></i> -->
                                            <img class="" src="<?php echo get_bloginfo('template_directory');?>/assets/images/clientgo.png">
                                        </button>
                                    </div>
                                    <?php
                                    $error = if_get_login_error();
                                    if ($error) :
                                        ?>
                                        <div class="col-auto">
                                            <p class="text-danger my-1 fine-print"><?php echo $error; ?></p>
                                        </div>
                                    <?php endif; ?>
                                </form>
                            <?php else : ?>
                                <div class="col-auto">
                                <?php if( function_exists('financial_admin_render_bar') ): ?>
                                    <?php //financial_admin_render_bar(); ?>
                                <?php endif; ?>
                                    <!-- <p class="text-light my-1 col-auto">
                                        <?php
                                        //$current_user = wp_get_current_user();
                                        //echo 'Hello, <a href="'.site_url().'/investors/profile">' . $current_user->user_firstname . '</a>!';
                                        ?>
                                    </p> -->
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 d-flex align-items-center flex-row-reverse justify-content-center col-md-3 col-lg-2">
                            <ul class="fa-ul text-end social-top">
                                <li><a href="https://www.facebook.com/IgniteFunding" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Facebook"><span class="fa-li"><i class="fab fa-facebook-f"></i></span></a></li>
                                <li><a href="https://twitter.com/ignitefunding" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Twitter"><span class="fa-li"><i class="fab fa-twitter"></i></span></a></li>
                                <li><a href="http://www.linkedin.com/company/2123947?trk=tyah&trkInfo=tas%3Aignite%20funding%2Cidx%3A1-1-1" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="LinkedIn"><span class="fa-li"><i class="fab fa-linkedin-in"></i></span></a></li>
                                <li><a href="http://www.youtube.com/channel/UCZIuuoRIYMpMtYHF0DaDkHA" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="YouTube"><span class="fa-li"><i class="fab fa-youtube"></i></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <section class="main-menu-container p-3 p-lg-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-9 d-none d-lg-block">
                            <nav class="navbar navbar-expand-lg navbar-dark pr-0 text-uppercase text-white primary-menu">
                                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <?php
                                wp_nav_menu([
                                    'menu' => 'top',
                                    'theme_location' => 'header-menu',
                                    'container' => 'div',
                                    'container_id' => 'bs4navbar',
                                    'container_class' => 'collapse navbar-collapse',
                                    'menu_id' => false,
                                    'menu_class' => 'navbar-nav ml-auto',
                                    'depth' => 1,
                                    // 'fallback_cb' => 'swph_Nav_walker::fallback',
                                    // 'walker' => new swph_Nav_walker()
                                ]);
                                ?>
                            </nav>
                        </div>
                        <div class="col-12 text-center text-lg-right col-lg-3">
                            <?php if (!empty($GLOBALS['logo_type'])): ?>
                                <div class="header__logo">
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo $GLOBALS['logo_type']; ?></a>
                                </div>
                            <?php else : ?>
                                <h1 class="header_logo_text text-end"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('title'); ?></a></h1>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </section>
            <section class="header-title">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center text-sm-left col-sm-6 col-lg-6">
                            <h1 class="py-4 mb-0">IMS Portal</h1>
                        </div>
                    </div>
                </div>
                <section class="header-title" style="background: #232323; padding: 10px 0;">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 d-flex align-items-center justify-content-center justify-content-sm-end mb-2 mb-sm-0">
                                <?php do_action('ns_show_breadcrumb'); ?>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </header>

        <!-- <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <nav class="navbar navbar-expand-lg navbar-dark secondary-menu">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item current-menu-item">
                                        <a class="nav-link" aria-current="page" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/">Home</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Statements & Transaction Detail
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/"><span class="me-2">7053</span> Carrie Cook</a></li>
                                            <li><a class="dropdown-item" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/"><span class="me-2">8617</span> Hunter R. Hicks</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="https://swphdev.com/sandbox/marcus-solomon/ignite-funding/client-resources/" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Client Resources</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                            <li>
                                                <a class="dropdown-item" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/profile-settings/">Profile & Settings</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/available-investments/">Available Investments</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/news-updates/">News & Updates</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="https://swphdev.com/sandbox/marcus-solomon/ignite-funding/loan-default-portal/">Loan Default Portal</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                       
                                    </li>
                                    <li class="nav-item">
                                        
                                    </li>
                                </ul>
                                <?php if (is_user_logged_in()) : ?>
                                    <div class="d-flex">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item"><a class="nav-link" href="<?php echo wp_logout_url(home_url('/')); ?>" style="color: #67A102">Log Out</a></li>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <div class="d-flex">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item"><a class="nav-link" href="<?php echo wp_logout_url(home_url('/wp-admin')); ?>" style="color: #67A102">Login</a></li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </div> -->


            <div class="content">
