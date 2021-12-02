<?php /* Template Name: FinanceLogin */ ?>

<?php 

$user = wp_get_current_user();
if( in_array('financial_admin', $user->roles ) || in_array('financial_investor', $user->roles ) ){
    wp_redirect( site_url().'/investors/dashboard');
    exit();
}
?>

<?php get_header(); ?>

<div class="container inner-page mb-4 tpl-home">
    <div class="row pt-1 pb-4">
        <div class="col-12">
            <img class="img-fluid" src="<?php echo site_url(); ?>/wp-content/uploads/2021/06/header_image_2.png" alt="Header">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            
            <div id="login-form">

                <div class="inner-page-title">
                    <h5><?php _e('My Accounts', 'ignite-funding') ?></h5>
                </div>
            
                    <div class="card account custom-border-gray no-top">
                    <div class="card-header">
                        <div class="row ps-0">
                            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 text-start text-md-start text-lg-start text-xl-start">
                                <h5 class="card-title f20 color_000 mb-0 ">Login to your account</h5>
                                <!-- <p class="card-text fine-print">a single woman as her sole and separate property</p> -->
                            </div>
                            
                        </div>
                    </div>
                    <?php if( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ): ?>
                        <div class="pt-1 pb-2">
                            <p style="color: #ff0000;">The username or password is incorrect.</p>
                        </div>
                    <?php endif; ?>

                    <div class="card-body pt-0">
                        <form method="post" action="<?php echo wp_login_url(); ?>">
                            <?php wp_nonce_field(); ?>
                            <table>
                                <thead>
                                    <tr>
                                        <col colspan="2">&nbsp;</col>
                                    </tr>
                                </thead>
                                <tr>
                                    <td style="width: 110px; padding: 10px 0 10px 0;"><label>User name</label></td><td><input type="text" name="log" /></td>
                                </tr>
                                <tr>
                                    <td style="width: 110px; padding: 10px 0 10px 0;"><label>Password</label></td><td><input type="password" name="pwd" /></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td><td><input type="submit" class="button" value="Login" /></td>
                                </tr>
                            </table>    
                        </form>
                    </div>
                </div>
            </div>
          
        </div>

        <div class="col-sm-5 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-0 mt-4">
            <div class="inner-page-title">
                <h5 class="">News & Updates</h5>
            </div>
            <div class="card mb-4">
                <div id="newsUpdatesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-keyboard="false" data-bs-touch="false" data-bs-interval="5000">
                    <div class="card-body carousel-general">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h5 class="text-uppercase">Voucher Control: Why do Lenders Use It 1?</h5>
                                <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/04/blog-demo-724x240.jpg" class="d-block mb-3 w-100 img-fluid wp-post-image" alt="" width="724" height="240">
                                <div class="">
                                    <p>At Ignite Funding, we believe that understanding every aspect of your investment(s) is important. This includes understanding certain lending practices and strategies that we adhere to in your Trust Deed investments...</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h5 class="text-uppercase">Voucher Control: Why do Lenders Use It 2?</h5>
                                <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/04/blog-demo-724x240.jpg" class="d-block mb-3 w-100 img-fluid wp-post-image" alt="" width="724" height="240">
                                <div class="">
                                    <p>At Ignite Funding, we believe that understanding every aspect of your investment(s) is important. This includes understanding certain lending practices and strategies that we adhere to in your Trust Deed investments...</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h5 class="text-uppercase">Voucher Control: Why do Lenders Use It 3?</h5>
                                <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/04/blog-demo-724x240.jpg" class="d-block mb-3 w-100 img-fluid wp-post-image" alt="" width="724" height="240">
                                <div class="">
                                    <p>At Ignite Funding, we believe that understanding every aspect of your investment(s) is important. This includes understanding certain lending practices and strategies that we adhere to in your Trust Deed investments...</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h5 class="text-uppercase">Voucher Control: Why do Lenders Use It 4?</h5>
                                <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/04/blog-demo-724x240.jpg" class="d-block mb-3 w-100 img-fluid wp-post-image" alt="" width="724" height="240">
                                <div class="">
                                    <p>At Ignite Funding, we believe that understanding every aspect of your investment(s) is important. This includes understanding certain lending practices and strategies that we adhere to in your Trust Deed investments...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#newsUpdatesCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
                                    <button type="button" data-bs-target="#newsUpdatesCarousel" data-bs-slide-to="1"></button>
                                    <button type="button" data-bs-target="#newsUpdatesCarousel" data-bs-slide-to="2"></button>
                                    <button type="button" data-bs-target="#newsUpdatesCarousel" data-bs-slide-to="3"></button>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="inner-page-title">
                <h5 class="">Like Us?</h5>
            </div>
            <div class="card mb-4 referrals">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <h5 class="card-title mb-3">Referrals</h5>
                            <h6 class="fw-bold text-theme">Know someone interested in investing at Ignite Funding?</h6>
                            <p class="card-text text-spacing">Earn $100 the first time your collegue invests with us.</p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <h5 class="card-title mb-3">Reviews</h5>
                            <h6 class="fw-bold text-theme">Please leave your review of our services / products.</h6>
                        </div>
                    </div>
                    <div class="row bottom justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 text-end refferals_text_link">
                            <p class="card-text " style="font-size: 12px"><a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/referrals/">Learn More</a></p>
                        </div>
                        <div class="col-9 col-sm-12 col-md-12 col-lg-6 col-xl-6 refferals_icons">
                            <!-- <img class="me-3 rounded" src="https://via.placeholder.com/38/67a102/ffffff/?text=FB">
                            <img class="me-3 rounded" src="https://via.placeholder.com/38/67a102/ffffff/?text=G">
                            <img class="rounded" src="https://via.placeholder.com/38/67a102/ffffff/?text=BBB"> -->
                            <img class="" src="<?php echo get_bloginfo('template_directory');?>/assets/images/fb_stars.png">
                            <img class="" src="<?php echo get_bloginfo('template_directory');?>/assets/images/g_stars.png">
                            <img class="" src="<?php echo get_bloginfo('template_directory');?>/assets/images/bbb_stars.png">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 audited">
                <div class="card-body">
                    <div class='audit_icon'><i class="fal fa-file-spreadsheet fa-2x "></i></div>
                    <div class='audit_text'> <a href="<?php echo do_shortcode('[audited-financials-link]'); ?>" target="_blank">Audited Ignite Funding Financials</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready( function(){
    console.log('ok');
    var ld = $('#login-form');
    ld.find('form').on('submit', function( e ){
        ld.addClass('loading');
    });
});

</script>

<?php
get_footer();
