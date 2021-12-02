<?php /* Template Name: Account Representatives */ ?>

<?php get_header(); ?>
<div class="container support-page mb-4">
    <div class="row">
        <div class="col-sm-12">
            <div class="inner-page-title">
                <h5>Support</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header details-ad card-header-padding">
                    <div class="row">
                        <div class="col-lg-7 col-sm-7 col-xs-12 mb-2 mb-sm-0">
                            <h5 class="card-title mb-0 f20 fw-700">Carrie Cook</h5>
                            <p class="card-text fine-print f12 fw-400">a single woman as her sole and separate property</p>
                        </div>
                        <div class="col-lg-5 col-sm-5 col-xs-12 text-end">
                            <h5 class="card-title mb-0 f20 fw-400 text-letter-spacing" style="font-family: 'helveticaregular'">7053</h5>
                            <p class="card-text fine-print f12 fw-400">Account Number</p>
                        </div>
                    </div>
                </div>
                <?php if_quick_summary(); ?>
                <div class="row account-details-single">
                    <div class="col-lg-8 col-sm-12 col-md-8 ">
                        <div class="row">
                            <h5 class="mt-4 mb-3 text-xl-left text-lg-left text-md-left text-sm-center text-center">Account Representatives</h5>
                            <div class="col-lg-6 col-sm-6 col-md-6 person1 ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 col-md-4 col-12 text-center">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/images/female.png" class="w-100 img-fluid wp-post-image" alt="" loading="lazy" width="71" height="71">
                                    </div>
                                    <div class="col-lg-8 col-sm-12 col-md-8 text-center text-md-left">
                                        <div class="name">Melissa Harris</div>
                                        <div class="phone">1.800.555.6666</div>
                                        <div class="mail"><a href="mailto:MHarris@ignitefunding.com">MHarris@ignitefunding.com</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 person2">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 col-md-4 col-12 text-center">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/images/male.png" class="w-100 img-fluid wp-post-image" alt="" loading="lazy" width="71" height="71">
                                    </div>
                                    <div class="col-lg-8 col-sm-12 col-md-8 text-center text-md-left">
                                        <div class="name">Howard Robbins</div>
                                        <div class="phone">1.800.555.6666</div>
                                        <div class="mail"><a href="mailto:HRobbins@ignitefunding.com">HRobbins@ignitefunding.com</a></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-4 right-box text-center">
                        <h5 class="mt-4 mb-4">Associated Independent Advisor</h5> 
                        <p class="green">Wealth Teams Alliance</p>
                    </div>
                </div>
                <div class="card-footer p-0">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 ">
                            <ul class="options-list">
                                <li><a href="http://swphdev.com/sandbox/marcus-solomon/ignite-funding/account-detail/"><i class="fal fa-file-invoice fa-fw"></i> Statements & Transactions Detail</a></li>
                                <li><a href="#"><i class="fal fa-question-circle fa-fw"></i> Support</a></li>
                                <li><a href="#"><i class="fal fa-file-invoice-dollar fa-fw"></i> Taxes</a></li>
                                <li><a href="#"><i class="fal fa-chart-bar fa-fw"></i> Defaults</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
