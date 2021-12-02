<?php
if ( ! defined( 'ABSPATH' ) ) // Or some other WordPress constant
exit;


if( @$_GET['action'] == 'edit_investors'){
    require_once( dirname( __FILE__ ). '/includes/edit-investors.php' );
} else if( @$_GET['action'] == 'edit_accounts') {
    require_once( dirname( __FILE__ ). '/includes/edit-accounts.php' );    
} else {
    require_once( dirname( __FILE__ ). '/includes/edit-admins.php' );    
}