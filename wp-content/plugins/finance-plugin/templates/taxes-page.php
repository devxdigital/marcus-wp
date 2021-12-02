<?php
if( !is_user_logged_in() ){
    wp_redirect( site_url() );
    exit();
}

$investor = false;
$investor_data = array();
$user = wp_get_current_user();
$personId = get_the_author_meta('person_id', $user->ID );

if( in_array('financial_admin', $user->roles ) ){

    if( isset( $_COOKIE['wpb_financial_admin_selected_user'] ) ){
        $selected_id = intval( $_COOKIE['wpb_financial_admin_selected_user'] );

        // print_r( $selected_id );
    } else {
        $assigned_investors = FinancePluginHelper::get_investors( $user->ID );
        $selected_id = intval( array_values( $assigned_investors )[0] );
    }
    
    $investor_data = FinancePluginHelper::get_investor_data( $selected_id );
    $investor = array_values( @array_filter( $investor_data, function( $el ){ return $el['acc_id'] == get_query_var('qid'); } ) )[0];
    $pri_account = FinancePluginHelper::get_primary_account( $investor_data, $selected_id );
} else {
    if( $user ){
        $investor_data = FinancePluginHelper::get_investor_data( $user->ID );
        $investor = array_values( @array_filter( $investor_data, function( $el ){ return $el['acc_id'] == get_query_var('qid'); } ) )[0];
    }
    $pri_account = FinancePluginHelper::get_primary_account( $investor_data, $user->ID );
}


get_header();

?>
<div class="container">
    <div class="row mt-5">
        <?php include( plugin_dir_path( __FILE__ ).'/menu.php'); ?>
    </div>

</div>
<div class="content">
    <div class="container inner-page mb-4 page-tax-information ">
        <div class="row">
            <div class="col-sm-12">
                <div class="inner-page-title">
                    <h5 class="">Taxes</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header details-ad card-header-padding">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <h5 class="card-title mb-0 f20 fw-700"><?php echo $pri_account['FirstName'].' '. $pri_account['LastName']; ?></h5>
                                <p class="card-text fine-print f12 fw-400"><?php echo $investor['account_data']['Vesting']; ?></p>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-xs-12 text-end">
                                <h5 class="card-title mb-0 f20 fw-400 text-letter-spacing"><?php echo $investor['acc_id']; ?></h5>
                                <p class="card-text fine-print f12 fw-400">Account Number</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body ps-0 pe-0 pt-0">

                        <!-- accounts summary     -->
                        <div class="row g-0 mb-3 summary accounts">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                <div class="card text-white text-center">
                                    <div class="card-body tax-information-boxes">
                                        <h3 class="mb-0"><?php echo FinancePluginHelper::currency( $investor['account_data']['Fundings'] ); ?></h3>
                                        <p class="card-text fine-print">Invested Amount</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                <div class="card text-white text-center">
                                    <div class="card-body tax-information-boxes">
                                        <h3 class="mb-0"><?php echo FinancePluginHelper::currency( $investor['account_data']['Pledges'] ); ?></h3>
                                        <p class="card-text fine-print">Pledged on Investments</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                <div class="card text-white text-center">
                                    <div class="card-body tax-information-boxes">
                                        <h3 class="mb-0"><?php echo FinancePluginHelper::currency( $investor['account_data']['AmtRemainingToInvest'] ); ?></h3>
                                        <p class="card-text fine-print">Remaining Amount to Invest</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                <div class="card text-white text-center">
                                    <div class="card-body tax-information-boxes">
                                        <h3 class="mb-0"><?php echo FinancePluginHelper::currency( $investor['account_data']['InterestEarned'] ); ?></h3>
                                        <p class="card-text fine-print">Interest Earned to Date</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end accounts -->


                        <div class="row gx-0">
                            <div class='select-rows-wrapper'>
                                <div class="col-6 select-row-left">
                                    <div class="my-3">
                                        <select id="account" class="form-select form-select-lg">
                                            <option disabled selected>Select Account</option>
                                            <?php if( count( $investor_data ) ): ?>
                                            <?php foreach( $investor_data as $account ): ?>
                                            <?php $title = array_filter( $account['account_details'], function( $el ){ return $el['SignerType'] == 'Primary'; } ); ?>
                                                <option value="<?php echo $account['acc_id']; ?>"><?php echo @$title[0]['FirstName'].' '.@$title[0]['LastName'].' - '.@$account['acc_id']; ?></option>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 select-row-right">
                                    <div class="my-3">
                                        <select id="taxYear" class="form-select form-select-lg">
                                            <option disabled selected>Select Tax Year</option>
                                            <?php 
                                                $current = date('Y');
                                                $year = 2018;

                                            ?>
                                            <?php while( $year <= $current ): ?>
                                                <option><?php echo $year++; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 select-row-btns">
                            <div class="col-6 text-end">
                                <button type="submit" class="btn btn-theme btn-select">1099</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-theme btn-select">K1</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer tax-info-footer">
                        <div class="row d-flex align-items-center mt-4">
                            <div class="col-12 col-md-7">
                                <p class="fine-print">
                                    Note: Tax documents will open in a new browser window/tab using Adobe Acrobat.<br/>
                                    If you are prompted to open/save the document, choose "open".<br/>
                                    You will then be able to save or print the document from within the browser window.
                                </p>
                            </div>
                            <div class="col-12 col-md-5 text-md-end">
                                <a href="https://get.adobe.com/reader/" target="_blank" class="text-dark">
                                    <h5>
                                        <span class="image"><img class="" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/adobe-acrobat-reader-logo.png' ?>"></span>
                                        <span class="text">Get Adobe Acrobat Reader</span>
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 ">
                                <ul class="options-list">
                                    <li><a href="<?php echo site_url(); ?>/investors/account/<?php echo $investor['acc_id']; ?>"><i class="fal fa-file-invoice fa-fw"></i> Statements & Transactions Detail</a></li>
                                    <li><a href="<?php echo site_url(); ?>/investors/account-representatives/<?php echo $account['acc_id']; ?>"><i class="fal fa-question-circle fa-fw"></i> Support</a></li>
                                    <li><a href="<?php echo site_url(); ?>/investors/taxes/<?php echo $account['acc_id']; ?>"><i class="fal fa-file-invoice-dollar fa-fw"></i> Taxes</a></li>
                                    <li><a href="<?php echo site_url(); ?>/loan-default-portal/"><i class="fal fa-chart-bar fa-fw"></i> Defaults</a></li>
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