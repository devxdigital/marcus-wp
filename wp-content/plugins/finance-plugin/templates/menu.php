<?php

$page = get_query_var('investor_page');
$active_menu = $page;

if( empty( $investor_data ) || count( $investor_data ) == 0 ){
    if( is_user_logged_in() ){
        if( empty( $_investor_data ) ){
            $investor_data = array();
        }

        $user = wp_get_current_user();
        if( $user && count( $investor_data ) == 0 ){
            $investor_data = FinancePluginHelper::get_investor_data( $user->ID );
        }
        // print_r( $investor_data );
        // exit();
    }
}

?>

<div class="col" style="--bs-gutter-x:0;">
    <nav class="navbar navbar-expand-lg navbar-dark secondary-menu new-custom-navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item <?php echo $active_menu == 'index' && 'current-menu-item'; ?>">
                        <a class="nav-link" aria-current="page" href="<?php echo site_url(); ?>/investors/dashboard">Home</a>
                    </li>
                    <?php if (is_user_logged_in()) : ?>
                    <li class="nav-item dropdown <?php echo $active_menu == 'account'? 'current-menu-item' : ''; ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Statements & Transaction Detail
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if( count( $investor_data ) > 0 ): ?>
                            <?php foreach( $investor_data as $key => $account ): ?>
                            <li><a class="dropdown-item" href="<?php echo site_url(); ?>/investors/account/<?php echo $account['acc_id']; ?>">
                                <span class="me-2"><?php echo $account['acc_id']; ?></span> 
                                <?php $acc = array_filter( $account['account_details'], function( $el ){ return $el['SignerType'] == 'Primary'; } ); ?>
                                <?php echo @$acc[0]['FirstName'].' '.@$acc[0]['LastName']; ?></a></li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown <?php echo $active_menu == 'profile'? 'current-menu-item' : ''; ?>">
                        <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Client Resources</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <li>
                                <a class="dropdown-item" href="<?php echo site_url(); ?>/investors/profile">Profile & Settings</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo site_url(); ?>/available-investments/">Available Investments</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo site_url(); ?>/news-updates/">News & Updates</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo site_url(); ?>/loan-default-portal/">Loan Default Portal</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        
                    </li>
                    <li class="nav-item">
                        
                    </li>
                    <?php else: ?>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                    <?php endif; ?>
                </ul>
                <?php if (is_user_logged_in()) : ?>
                    <div class="d-flex">
                        <ul class="navbar-nav log-status me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="<?php echo wp_logout_url(home_url('/')); ?>" style="color: #67A102">Log Out</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="d-flex">
                        <ul class="navbar-nav log-status me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="<?php echo wp_logout_url(home_url('/wp-admin')); ?>" style="color: #67A102">Login</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        
        
        </div>
    </div>
</div>