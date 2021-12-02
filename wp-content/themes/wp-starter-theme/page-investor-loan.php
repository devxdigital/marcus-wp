<?php /* Template Name: Investor Loan Services */ ?>

<?php get_header(); ?>

<div class="container inner-page mb-4">
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
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="list-group list-group-flush left-menu custom-sidebar-space" id="jumpTo">
                                <a id="account-dropdown" class="list-group-item d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <h5>Account Detail</h5>
                                    <span class="text-theme"><i class="fas fa-minus"></i></span>
                                </a>
                                <div class="collapse show list-group-submenu" id="collapseExample">
                                    <!-- <a href="<?php echo site_url(); ?>/transactions/" class="list-group-item sub-item" data-parent="#collapseExample">Carrie Cook <span class="float-end">7053</span></a>
                                    <a href="<?php echo site_url(); ?>/transactions/" class="list-group-item sub-item" data-parent="#collapseExample">Hunter R. Hicks <span class="float-end">8617</span></a> -->
                                </div>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="#">
                                    <h5>Available Investments</h5>
                                </a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="<?php echo site_url(); ?>/news-updates/">
                                    <h5>News & Updates</h5>
                                </a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="<?php echo site_url(); ?>/profile-settings/">
                                    <h5>My Information</h5>
                                </a>
                                <a class="list-group-item d-flex justify-content-between align-items-center" href="#">
                                    <h5>Referrals</h5>
                                </a>
                                <div class="list-group-item">
                                    <a href="#"><h5 class="mb-3">Reviews</h5></a>
                                    <img class="" src="<?php echo get_bloginfo('template_directory');?>/assets/images/fb_stars.png">
                                    <img class="" src="<?php echo get_bloginfo('template_directory');?>/assets/images/g_stars.png">
                                    <img class="" src="<?php echo get_bloginfo('template_directory');?>/assets/images/bbb_stars.png">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9 default-page">
                            <h1>INVESTOR LOAN SERVICES</h1>
                            <p>
                                Ignite Funding acts as the loan servicing agent for Trust Deed investments, which includes, among other items, keeping current and accurate records on all loans and Borrowers, tracking and processing payments, and if necessary, handling foreclosure proceedings. 
                            </p>
                            <h5>Loan Servicing Department</h5>
                            <p>
                                Our customer loan services do not stop after you place money on an investment at Ignite Funding. Atter an investment has recorded, the Ignite Funding Loan Servicing Department will address any questions you may have in relation to monthly interest payments, account statements, and other payment-related matters.
                            </p>
                            <p>
                                An Investment Representative or a member of the Investor Relations team will maintain active communications with you regarding investment payoffs and new opportunities as they become available.
                            </p>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check-circle text-theme"></i></span><a href="#">Online Statements Tutorial</a></li>
                                <li><span class="fa-li"><i class="fas fa-check-circle text-theme"></i></span><a href="#">Schedule an Online Notary Appointment</a></li>
                                <li><span class="fa-li"><i class="fas fa-check-circle text-theme"></i></span><a href="#">Tranche System FAQs</a></li>
                            </ul>
                            <h5>Loan Resolution Department</h5>
                            <p>We encourage our Investors to review the materials below to have a clear understanding about the default/foreclosure process, should a Borrower default on a loan.</p>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check-circle text-theme"></i></span><a href="#">2011-2020 Asset Management Performance Record</a></li>
                                <li><span class="fa-li"><i class="fas fa-check-circle text-theme"></i></span><a href="#">Understanding & Managing Defaults</a></li>
                                <li><span class="fa-li"><i class="fas fa-check-circle text-theme"></i></span><a href="#">Default Q&A</a></li>
                                <li><span class="fa-li"><i class="fas fa-check-circle text-theme"></i></span><a href="#">Default Terminology</a></li>
                                <li><span class="fa-li"><i class="fas fa-check-circle text-theme"></i></span><a href="#">Loan Default Portal</a></li>
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
