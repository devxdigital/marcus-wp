<?php
    print_r( $investor_data );

    if( in_array('financial_admin', $user->roles ) ){

        if( !isset( $user ) && !isset( $investor_data ) && count( $investor_data ) == 0 ){
            $user = wp_get_current_user();
            $investor_data = FinancePluginHelper::get_investor_data( $selected_id );
        }
    
        $pri_account = FinancePluginHelper::get_primary_account( $investor_data, $selected_id );
        $sec_account = FinancePluginHelper::get_authorized_account( $investor_data, $selected_id );

    } else {
        if( !isset( $user ) && !isset( $investor_data ) && count( $investor_data ) == 0 ){
            $user = wp_get_current_user();
            $investor_data = FinancePluginHelper::get_investor_data( $user->ID );
        }
    
        $pri_account = FinancePluginHelper::get_primary_account( $investor_data, $user->ID );
        $sec_account = FinancePluginHelper::get_authorized_account( $investor_data, $user->ID );
    }
    
?>
<div class="col-sm-7">
    <div class="inner-page-title">
        <h5><?php _e('My Accounts', 'ignite-funding') ?></h5>
    </div>

    <?php if( count( $investor_data ) ): ?>
    <?php foreach( $investor_data as $key => $account ): ?>
    <?php $class = ( $key == 0 )? 'no-top' : ''; ?>
        <div class="card account custom-border-gray $class">
            <div class="card-header">
                <div class="row ps-0">
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 text-start text-md-start text-lg-start text-xl-start">
                        <h5 class="card-title f20 color_000 mb-0 "><?php echo @$pri_account['FirstName'].' '.@$pri_account['LastName']; ?></h5>
                        <p class="card-text fine-print"><?php echo $account['account_data']['Vesting']; ?></p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-start text-md-end text-lg-end text-xl-end">
                        <h5 class="card-title mb-0 text-number-letter-spacing"><?php echo $account['acc_id']; ?></h5>
                        <p class="card-text fine-print">Account Number</p>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <!-- accounts summary     -->

                <div class="row g-0 mb-3 summary accounts">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                        <div class="card text-white text-center">
                            <div class="card-body tax-information-boxes">
                                <h3 class="mb-0"><?php echo FinancePluginHelper::currency( $account['account_data']['Fundings'] ); ?></h3>
                                <p class="card-text fine-print">Invested Amount</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                        <div class="card text-white text-center">
                            <div class="card-body tax-information-boxes">
                                <h3 class="mb-0"><?php echo FinancePluginHelper::currency( $account['account_data']['Pledges'] ); ?></h3>
                                <p class="card-text fine-print">Pledged on Investments</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                        <div class="card text-white text-center">
                            <div class="card-body tax-information-boxes">
                                <h3 class="mb-0"><?php echo FinancePluginHelper::currency( $account['account_data']['AmtRemainingToInvest'] ); ?></h3>
                                <p class="card-text fine-print">Remaining Amount to Invest</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                        <div class="card text-white text-center">
                            <div class="card-body tax-information-boxes">
                                <h3 class="mb-0"><?php echo FinancePluginHelper::currency( $account['account_data']['InterestEarned'] ); ?></h3>
                                <p class="card-text fine-print">Interest Earned to Date</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end accounts -->
            

                <div class="row">
                    <div class=" col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <h5 class="card-title f20 fw-400 color_000 account-type"><?php echo $account['account_data']['AccountType']; ?>
                            <span class="text-theme card-dash-v"></span>&nbsp;&nbsp;<?php echo $account['account_data']['Sub-Type']; ?>
                        </h5>
                        <p class="card-text fine-print f12 fw-400 color_000">Account Type</p>
                    </div>
                    <div class=" col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <h5 class="card-title f20 fw-400 color_000 account-type"><?php echo $account['account_data']['account_status']; ?></h5>
                        <p class="card-text fine-print f12 fw-400 color_000">Account Status</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class='card-actions'>
                            <div class='card-action-item card-flex-grow-1'>
                                <div class='card-action-item-icon'>
                                    <i class="fal fa-file-invoice option-list-icon fa-fw"></i>
                                </div>
                                <div class='card-action-item-link'>
                                    <a href="<?php echo site_url(); ?>/investors/account/<?php echo $account['acc_id']; ?>">Statements & Transactions Detail</a>
                                </div>
                            </div>
                            <div class='card-action-item card-flex-grow-0'>
                                <div class='card-action-item-icon'>
                                    <i class="fal fa-question-circle option-list-icon fa-fw"></i>
                                </div>
                                <div class='card-action-item-link'>
                                    <a href="<?php echo site_url(); ?>/investors/account-representatives/<?php echo $account['acc_id']; ?>">Support</a>
                                </div>
                            </div>
                            <div class='card-action-item card-flex-grow-0'>
                                <div class='card-action-item-icon'>
                                    <i class="fal fa-file-invoice-dollar option-list-icon fa-fw"></i>
                                </div>
                                <div class='card-action-item-link'>
                                    <a href="<?php echo site_url(); ?>/investors/taxes/<?php echo $account['acc_id']; ?>"> Taxes</a>
                                </div>
                            </div>
                            <div class='card-action-item card-flex-grow-0'>
                                <div class='card-action-item-icon'>
                                    <i class="fal fa-chart-bar option-list-icon fa-fw"></i>
                                </div>
                                <div class='card-action-item-link'>
                                    <a href="<?php echo site_url(); ?>/loan-default-portal/"> Defaults</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <ul class="options-list">
                        <li><a href="#"><i class="fal fa-file-invoice"></i> Statements & Transactions Detail</a></li>
                        <li><a href="#"><i class="fal fa-question-circle"></i> Support</a></li>
                        <li><a href="#"><i class="fal fa-file-invoice-dollar"></i> Taxes</a></li>
                        <li><a href="#"><i class="fal fa-chart-bar"></i> Defaults</a></li>
                </ul> -->
            </div>
            <div class="card-extra-footer">
                <div class="card my-2">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class='col-lg-12 card-footer-member'>
                                <div class='card-footer-member-icon'>
                                    <i class="fas fa-2x fa-address-card text-theme fa-fw"></i>
                                </div>
                                <div class='card-footer-member-desc'>
                                    <h5 class="card-title mb-10 f20 color_000">
                                    <?php echo $sec_account['FirstName'].' '.$sec_account['LastName']; ?></h5>
                                    <p class="card-text fine-print f12 color_000">Authorized <?php echo @$sec_account['SignerType']; ?> Account Holder</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row ps-2">
                            <div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fal fa-user-circle option-list-icon fa-fw"></i> 
                                    </div>
                                    <div class="col-10 col-xl-8 col-lg-8">
                                        <a href="<?php echo site_url(); ?>/investors/profile/" class='f12 letter-spacing-min-044'>Edit Profile & Settings</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-0 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fal fa-mobile option-list-icon fa-fw"></i> 
                                    </div>
                                    <div class="col-10 col-xl-6 col-lg-6">
                                        <a href="https://platform.trumpia.com/onlineSignup/IGNITEFUNDING/client" class='f12 letter-spacing-min-044'>Sign up for Text Alerts</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <ul class="options-list">
                                <li><a href="#"><i class="fal fa-user-circle"></i> Edit Profile & Settings</a></li>
                                <li class="text-end"><a href="#"><i class="fal fa-mobile"></i> Sign up for Text Alerts</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php else: ?>
        <div class="row mt-4 ps-3">
            <p><strong>There are no accounts associated with this account.</strong></p>
            <p>Please contact your Investment Manager.</p>
        </div>
    <?php endif; ?>
</div>