<?php

if( !is_user_logged_in() ){
    wp_redirect( site_url() );
    exit();
}

$selected_id = false;
$user = wp_get_current_user();
$investor_data = array();

if( in_array('financial_admin', $user->roles ) ){

    if( isset( $_COOKIE['wpb_financial_admin_selected_user'] ) ){
        $selected_id = intval( $_COOKIE['wpb_financial_admin_selected_user'] );

        // print_r( $selected_id );
    } else {
        $assigned_investors = FinancePluginHelper::get_investors( $user->ID );
        $selected_id = intval( array_values( $assigned_investors )[0] );
    }
    
    $investor_data = FinancePluginHelper::get_investor_data( $selected_id );
} else {
    $investor_data = FinancePluginHelper::get_investor_data( $user->ID );
}
// print_r( $investor_data );

get_header();

// wp_nav_menu();
?>
<div class="container">
    <div class="row mt-5">
        <?php include( plugin_dir_path( __FILE__ ).'/menu.php'); ?>
    </div>

</div>
<div class="content">
    <div class="container inner-page mb-4 tpl-home investor-area">
        <div class="row pt-1 pb-4">
            <div class="col-12">
                <img class="img-fluid" src="<?php echo site_url(); ?>/wp-content/uploads/2021/06/header_image_2.png" alt="Header">
            </div>
        </div>
        <div class="row">
            <?php include( plugin_dir_path( __FILE__ ).'/accounts.php'); ?>          
            <?php include( plugin_dir_path( __FILE__ ).'/sidebar.php'); ?>
        </div>

    </div>        
</div>

<?php

get_footer();