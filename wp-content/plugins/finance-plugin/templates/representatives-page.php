<?php

if( !is_user_logged_in() ){
    wp_redirect( site_url() );
    exit();
}

$investor = false;
$investor_data = false;
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
    if( $user ){
        $investor_data = FinancePluginHelper::get_investor_data( $selected_id );
        $investor = array_values( @array_filter( $investor_data, function( $el ){ return $el['acc_id'] == get_query_var('qid'); } ) )[0];
    }
    
    $pri_account = FinancePluginHelper::get_primary_account( $investor_data, $selected_id );
} else {
    if( $user ){
        $investor_data = FinancePluginHelper::get_investor_data( $user->ID );
        $investor = array_values( @array_filter( $investor_data, function( $el ){ return $el['acc_id'] == get_query_var('qid'); } ) )[0];
    }
    
    $pri_account = FinancePluginHelper::get_primary_account( $investor_data, $user->ID );
}

// print_r( $investor );
// exit();

get_header();

// wp_nav_menu();
?>
<div class="container">
    <div class="row mt-5">
        <?php include( plugin_dir_path( __FILE__ ).'/menu.php'); ?>
    </div>

</div>
<div class="content">
    <div class="container support-page mb-4 investor-area">
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
                                <h5 class="card-title mb-0 f20 fw-700"><?php echo $pri_account['FirstName'].' '. $pri_account['LastName']; ?></h5>
                                <p class="card-text fine-print f12 fw-400"><?php echo $investor['account_data']['Vesting']; ?></p>
                            </div>
                            <div class="col-lg-5 col-sm-5 col-xs-12 text-end">
                                <h5 class="card-title mb-0 f20 fw-400 text-letter-spacing" style="font-family: 'helveticaregular'"><?php echo $account['acc_id']; ?></h5>
                                <p class="card-text fine-print f12 fw-400">Account Number</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row account-details-single">
                        <div class="col-lg-8 col-sm-12 col-md-8 ">
                            <div class="row">
                                <h5 class="mt-4 mb-3 text-xl-left text-lg-left text-md-left text-sm-center text-center">Account Representatives</h5>
                                <div class="col-lg-6 col-sm-6 col-md-6 person1 ">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12 col-md-4 col-12 text-center">
                                            <img src="<?php echo get_avatar_url( $investor['account_data']['PrimaryAgentEmail']) ?>" class="w-100 img-fluid wp-post-image" alt="" loading="lazy" width="71" height="71">
                                        </div>
                                        <div class="col-lg-8 col-sm-12 col-md-8 text-center text-md-left">
                                            <div class="name"><?php echo $investor['account_data']['PrimaryAgentFirstName']. ' '.$investor['account_data']['PrimaryAgentLastName'] ; ?></div>
                                            <div class="phone"><?php echo $investor['account_data']['PrimaryAgentPhoneNumber']; ?></div>
                                            <div class="mail"><a href="mailto:<?php echo $investor['account_data']['PrimaryAgentEmail']; ?>"><?php echo $investor['account_data']['PrimaryAgentEmail']; ?></a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6 person2">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12 col-md-4 col-12 text-center">
                                            <img src="<?php echo get_avatar_url( $investor['account_data']['SecondaryAgentEmail']) ?>" class="w-100 img-fluid wp-post-image" alt="" loading="lazy" width="71" height="71">
                                        </div>
                                        <div class="col-lg-8 col-sm-12 col-md-8 text-center text-md-left">
                                            <div class="name"><?php echo $investor['account_data']['SecondaryAgentFirstName']. ' '.$investor['account_data']['SecondaryAgentLastName'] ; ?></div>
                                            <div class="phone"><?php echo $investor['account_data']['SecondaryAgentPhoneNumber']; ?></div>
                                            <div class="mail"><a href="mailto:<?php echo $investor['account_data']['SecondaryAgentEmail']; ?>"><?php echo $investor['account_data']['SecondaryAgentEmail']; ?></a></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php if( isset( $investor['ria_data']['RIAName'] ) ): ?>
                        <div class="col-lg-4 col-sm-12 col-md-4 right-box text-center">
                            <h5 class="mt-4 mb-4">Associated Independent Advisor</h5> 
                            <p class="green"><?php echo @$investor['ria_data']['RIAName']; ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer p-0">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 ">
                                <ul class="options-list">
                                    <li><a href="<?php echo site_url(); ?>/investors/account/<?php echo $investor['acc_id']; ?>">
                                        <i class="fal fa-file-invoice fa-fw"></i> Statements & Transactions Detail</a></li>
                                    <li><a href="<?php echo site_url(); ?>/investors/account-representatives/<?php echo $investor['acc_id']; ?>">
                                        <i class="fal fa-question-circle fa-fw"></i> Support</a></li>
                                    <li><a href="<?php echo site_url(); ?>/investors/taxes/<?php echo $investor['acc_id']; ?>"><i class="fal fa-file-invoice-dollar fa-fw">
                                        </i> Taxes</a></li>
                                    <li><a href="<?php echo site_url(); ?>/loan-default-portal/"><i class="fal fa-chart-bar fa-fw"></i> Defaults</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>      
</div>

<?php

get_footer();