<?php

if( is_user_logged_in() ){
    $user = wp_get_current_user();

    if( in_array('financial_admin', $user->roles ) || in_array('financial_investor', $user->roles ) ){
        wp_redirect( site_url().'/investors/dashboard');
        exit();
    }
}

get_header();

// wp_nav_menu();
?>
<div class="container">
    <div class="row mt-5">
        <?php include( plugin_dir_path( __FILE__ ).'/menu.php'); ?>
    </div>

</div>
<div class="content">
    <div class="container inner-page mb-4 investor-area">
        <div class="row pt-1 pb-4">
            <div class="col col-md-4"></div>
            <div class="col col-md-4 text-center">
                <h4>Investor login</h4>
                <div class="mt-4"></div>
                
                <form method="post" action="<?php echo wp_login_url(); ?>">
                    <?php wp_nonce_field(); ?>
                    <table>
                        <thead>
                            <tr>
                                <col colspan="2">&nbsp;</col>
                            </tr>
                        </thead>
                        <tr>
                            <td><label>User name</label></td><td><input type="text" name="log" /></td>
                        </tr>

                        <tr>
                            <td><label>Password</label></td><td><input type="password" name="pwd" /></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td><td><input type="submit" class="button" value="Login" /></td>
                        </tr>
                    </table>    
                </form>
            </div>
            <div class="col col-md-4"></div>
        </div>            
    </div>        
</div>

<?php

get_footer();