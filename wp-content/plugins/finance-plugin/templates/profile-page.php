<?php

$form_error = '';
$alert = false;
$redirect = false;

$user = wp_get_current_user();

//post controller
if( wp_verify_nonce( @$_REQUEST['_wpnonce'] ) ){
    // print_r( $_REQUEST );

    switch( $_REQUEST['action'] ){
        case 'change_password': 
            if( !in_array('financial_admin', $user->roles ) ){
                if( wp_check_password( $_REQUEST['current'], $user->data->user_pass, $user->ID ) ){
                    if( $_REQUEST['new_password'] == $_REQUEST['confirm_password'] ){
                        wp_set_password( $_REQUEST['new_password'], $user->ID );
                        $alert = 'Your account password has been changed.';
                    } else {
                        $form_error = 'New password does not match Confirm password!';
                    }
                } else {
                    $form_error = 'Current password is wrong!';
                }
            } else {
                $alert = 'Investor password cannot be changed by Financial Admin.';
            }
            
        break;

        case 'change_profile':
            // print_r( $_REQUEST );
            // exit();
            $type = in_array('financial_admin', $user->roles )? 'An Investor Admin' : 'A user';

            $text = $type.' has requested a change for one of his accounts'."\n\n";
            $text .='PersonID: '.$_REQUEST['person_id']."\n\n";
            $text .='Changes:'."\n\n";
            $text .='First Name: '.$_REQUEST['fname']."\n";
            $text .= 'Last Name: '.$_REQUEST['lname']."\n";
            $text .= 'Phone: '.$_REQUEST['phone']."\n";
            $text .= 'E-mail: '.$_REQUEST['email']."\n";
            $text .= 'Address: '.$_REQUEST['address']."\n";

            $em = wp_mail( '<artweb11@gmail.com>', 'Account Profile Data Change Request', $text );

            // print_r( $em );

            // exit();
            $alert = 'Your user profile will be updated in our database after our review. Thanks.';
            $redirect = true;
        break;
    }

    // exit();
}


if( !is_user_logged_in() ){
    wp_redirect( site_url() );
    exit();
}

$investor_data = array();
$profiles = array();
$sec_account = false;

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

    foreach( $investor_data as $acct ){
        foreach( $acct['account_details'] as $account ){
            $profiles[ $account['PersonID'] ] = $account;
        }        
    }
    $sec_account = FinancePluginHelper::get_authorized_account( $investor_data, $selected_id );
} else {
    if( $user ){
        $investor_data = FinancePluginHelper::get_investor_data( $user->ID );
    
        foreach( $investor_data as $acct ){
            foreach( $acct['account_details'] as $account ){
                $profiles[ $account['PersonID'] ] = $account;
            }        
        }
    }
    $sec_account = FinancePluginHelper::get_authorized_account( $investor_data, $user->ID );
}



// print_r( $investor_data );
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
    <div class="container inner-page mb-4 tpl-home investor-area">
        <div class="row">
            <div class="col-sm-12">
                <div class="inner-page-title">
                    <h5 class="mb-0 ms-1">Profile & Settings</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-3 col-xl-1 col-lg-1 col-md-1 col-sm-2 text-end">
                                        <i class="far fa-2x fa-address-card text-theme" style="margin-top: 3px !important"></i>
                                    </div>
                                    <div class="col-8 gx-0 col-xl-8 col-lg-8">
                                        <h5 class="card-title mb-0"><?php echo $sec_account['FirstName'].' '. $sec_account['LastName']; ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 text-end change-pass-text">
                                <a href="#" id="chp">Change password</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row g-0 border">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 border-end persons-list">
                                <?php if( count( $profiles ) > 0 ): ?>
                                <?php foreach( $profiles as $profile ): ?>
                                <div class="row g-0 ps-3 pt-3 pb-3 border-bottom profile-active-member">
                                    <div class="col-9">
                                        <h5 class="card-title bold-text">
                                            <?php echo $profile['FirstName']. ' '.$profile['LastName']; ?> 
                                            <?php echo $personId == $profile['PersonID']? '(Self)' : ''; ?>
                                        </h5>
                                        <p class="profile-sub-title">Authorized Primary Contact Information ( Person <?php echo $profile['PersonID']; ?> )</p>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center col-3 text-end pe-4">
                                        <span class="profile-edit-button" style="color: #0099cc; " data-person="<?php echo $profile['PersonID']; ?>">Edit</span>
                                        <!-- <span class="profile-edit-button" style="color: #8FAD52; ">Editing</span> -->
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>

                                <!--<div class="row g-0 border-bottom ps-3 pt-3 pb-3 profile-member-focus">
                                    <div class="col-9">
                                        <h5 class="card-title bold-text">Hunter R. Hicks</h5>
                                        <p class="profile-sub-title">Authorized Primary Contact Information</p>
                                    </div>
                                    <div class="d-flex g-0 justify-content-end align-items-center col-3 text-end pe-4">
                                        <span class="profile-edit-button" style="color: #0099cc; ">Edit</span>
                                    </div>
                                </div>
                                <div class="row g-0 border-bottom ps-3 pt-3 pb-3 profile-member-focus">
                                    <div class="col-9">
                                        <h5 class="card-title bold-text">Eddie Vedder</h5>
                                        <p class="profile-sub-title">Authorized Primary Contact Information</p>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center col-3 text-end pe-4">
                                        <span class="profile-edit-button" style="color: #0099cc; ">Edit</span>
                                    </div>
                                </div>
                                <div class="row g-0 border-bottom ps-3 pt-3 pb-3 profile-member-focus">
                                    <div class="col-9">
                                        <h5 class="card-title bold-text">Frank Lloyd Wright</h5>
                                        <p class="profile-sub-title">Authorized Primary Contact Information</p>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center col-3 text-end pe-4">
                                        <span class="profile-edit-button" style="color: #0099cc; ">Edit</span>
                                    </div>
                                </div>
                                -->
                            </div>
                            <!-- right side -->
                            <!-- right side -->

                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 border-end persons-details-profile">
                                <div id="change_pass" style="display: none;">
                                    <form class="change-pass" method="post">
                                        <?php wp_nonce_field(); ?>
                                        <input type="hidden" name="action" value="change_password" />
                                        <div class="input-box">
                                            <label>Current Password</label><input type="password" name="current" />
                                        </div>
                                        <div class="input-box green">
                                            <label>New Password</label><input type="password" name="new_password" />
                                        </div>
                                        <div class="input-box green">
                                            <label>Confirm New Password</label><input type="password" name="confirm_password" />
                                        </div>
                                        <a href="#" class="cancel">Cancel</a>
                                        <button type="submit" class="btn btn-theme generate">Update Password</button>
                                    </form>
                                </div>
                                <div id="view_account" style="display:none;">
                                    <div class="row mx-3 g-0 border-bottom ps-1 pt-3 pb-3 name-mob">
                                        <div class="col-lg-1 col-sm-1 col-xs-2  icon-prof-edit">
                                            <i class="fal fa-edit"></i>
                                        </div>
                                        <div class="col-lg-10 col-sm-11 col-xs-12">
                                            <h5 class="card-title name"></h5>
                                            <p class="profile-sub-title">Name</p>
                                        </div>
                                    </div>
                                    <div class="row mx-3 g-0 border-bottom ps-1 pt-3 pb-3 name-mob">
                                        <div class="col-lg-1 col-sm-1 col-xs-2 icon-prof-edit">
                                            <i class="fal fa-edit"></i>
                                        </div>
                                        <div class="col-lg-10 col-sm-11 col-xs-12">
                                            <h5 class="card-title phone"></h5>
                                            <p class="profile-sub-title">Phone</p>
                                        </div>
                                    </div>
                                    <div class="row mx-3 g-0 border-bottom ps-1 pt-3 pb-3 name-mob">
                                        <div class="col-lg-1 col-sm-1 col-xs-2  icon-prof-edit">
                                            <i class="fal fa-edit"></i>
                                        </div>
                                        <div class="col-lg-10 col-sm-11 col-xs-12">
                                            <h5 class="card-title email"></h5>
                                            <p class="profile-sub-title">Email</p>
                                        </div>
                                    </div>
                                    <div class="row mx-3 g-0 border-bottom ps-1 pt-3 pb-3 name-mob">
                                        <div class="col-lg-1 col-sm-1 col-xs-2  icon-prof-edit">
                                            <i class="fal fa-edit"></i>
                                        </div>
                                        <div class="col-lg-10 col-sm-11 col-xs-12">
                                            <h5 class="card-title address"></h5>
                                            <p class="profile-sub-title">Mailing Address</p>
                                        </div>
                                    </div>
                                </div>

                                <div id="edit_account" class="edit_account" style="display:none;">
                                    <?php if( $form_error != '' ): ?>
                                        <div class="row"><h4 style="color: red; font-size: 14px; padding: 10px;"><?php echo $form_error; ?></h4></div>
                                    <?php endif; ?>
                                    <form method="post">
                                        <?php wp_nonce_field(); ?>
                                        <input type="hidden" name="action" value="change_profile" />
                                        <input type="hidden" class="person_id" name="person_id" value="" />
                                        <div class="row mx-3 g-0 border-bottom ps-5 pt-3 pb-3 name-mob">
                                            <div class="col-lg-1 col-sm-1 col-xs-2  icon-prof-edit">
                                                <i class="fal fa-edit"></i>
                                            </div>
                                            <div class="col-lg-10 col-sm-11 col-xs-12">
                                                <div class="card-title input-box">
                                                    <input type="text" name="fname" value="" class="input-name" />
                                                </div>
                                                <p class="profile-sub-title">Name</p>
                                            </div>
                                        </div>
                                        <div class="row mx-3 g-0 border-bottom ps-5 pt-3 pb-3 name-mob">
                                            <div class="col-lg-1 col-sm-1 col-xs-2  icon-prof-edit">
                                                <i class="fal fa-edit"></i>
                                            </div>
                                            <div class="col-lg-10 col-sm-11 col-xs-12">
                                                <div class="card-title input-box">
                                                    <input type="text" name="lname" value="" class="input-lname" />
                                                </div>
                                                <p class="profile-sub-title">Name</p>
                                            </div>
                                        </div>
                                        <div class="row mx-3 g-0 border-bottom ps-5 pt-3 pb-3 name-mob">
                                            <div class="col-lg-1 col-sm-1 col-xs-2 icon-prof-edit">
                                                <i class="fal fa-edit"></i>
                                            </div>
                                            <div class="col-lg-10 col-sm-11 col-xs-12">
                                                <div class="card-title input-box">
                                                    <input type="text" name="phone" value="" class="input-phone" />
                                                </div>
                                                <p class="profile-sub-title">Phone</p>
                                            </div>
                                        </div>
                                        <div class="row mx-3 g-0 border-bottom ps-5 pt-3 pb-3 name-mob">
                                            <div class="col-lg-1 col-sm-1 col-xs-2  icon-prof-edit">
                                                <i class="fal fa-edit"></i>
                                            </div>
                                            <div class="col-lg-10 col-sm-11 col-xs-12">
                                                <div class="card-title input-box">
                                                    <input type="email" name="email" value="" class="input-email" />
                                                </div>
                                                <p class="profile-sub-title">Email</p>
                                            </div>
                                        </div>
                                        <div class="row mx-3 g-0 border-bottom ps-5 pt-3 pb-3 name-mob">
                                            <div class="col-lg-1 col-sm-1 col-xs-2  icon-prof-edit">
                                                <i class="fal fa-edit"></i>
                                            </div>
                                            <div class="col-lg-10 col-sm-11 col-xs-11">
                                            <div class="card-title input-box">
                                                    <textarea type="text" name="address" value="" class="input-address"></textarea>
                                                </div>
                                                <p class="profile-sub-title">Mailing Address</p>
                                            </div>
                                        </div>
                                        <div class="row mx-3 g-0 ps-5 pt-3 pb-3 name-mob">
                                            <div class="col-lg-1 col-sm-1 col-xs-2 ">
                                                &nbsp;
                                            </div> 
                                            <div class="col-lg-10 col-sm-11 col-xs-11">
                                                <button type="submit" class="col-lg-7 btn btn-theme generate">Update Profile Data</button>
                                            </div>
                                        </div>
                                        <div class="row mx-3 g-0 ps-5 pt-1 pb-3">
                                            <div class="col-lg-1 col-sm-1 col-xs-2 ">
                                                &nbsp;
                                            </div> 
                                            <div class="col-lg-10 col-sm-11 col-xs-11">
                                                <a href="#" style="display: block; margin: 0 auto;" class="cancel">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-0">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <ul class="options-list">
                                    <li><a href="<?php echo site_url(); ?>/investors/account/<?php echo $investor_data[0]['acc_id']; ?>"><i class="fal fa-file-invoice fa-fw"></i> Statements & Transactions Detail</a></li>
                                    <li><a href="<?php echo site_url(); ?>/investors/account-representatives/<?php echo $investor_data[0]['acc_id']; ?>"><i class="fal fa-question-circle fa-fw"></i> Support</a></li>
                                    <li><a href="<?php echo site_url(); ?>/investors/taxes/<?php echo $investor_data[0]['acc_id']; ?>"><i class="fal fa-file-invoice-dollar fa-fw"></i> Taxes</a></li>
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

<script>
jQuery(document).ready( function(){
    console.log('Hello from js');

    var accounts = JSON.parse('<?php echo json_encode( $profiles ); ?>');

    $('.profile-edit-button').on('click', function( e ){
        var acc = $(e.target).data('person');
        console.log('show edit for person ', accounts[ acc ] );
        display_edit( acc );
    });
    $('#chp').on('click', function( e ){
        e.preventDefault();

        $('#change_pass, #view_account, #edit_account').hide();

        $('#change_pass').show();
    });
    $('.cancel').on('click', function( e ){
        e.preventDefault();
        $('#change_pass, #view_account, #edit_account').hide();
        display_user( Object.keys( accounts )[0] );

    })

    function display_user( acc ){
        var user = accounts[ acc ];
        
        $('#change_pass, #view_account, #edit_account').hide();
        $('#view_account .name').html( user['FirstName'] + ' '+ user['LastName'] );
        $('#view_account .phone').html( user['PhoneNumber'] );
        $('#view_account .email').html( user['Email'] );
        $('#view_account .address').html( user['AddressLine1'] + ' '+ user['AddressLine2'] );

        $('#view_account').show();
    }

    function display_edit( acc ){
        var user = accounts[ acc ];
        
        $('#change_pass, #view_account, #edit_account').hide();
        $('#edit_account .person_id').val( user['PersonID'] );
        $('#edit_account .input-name').val( user['FirstName'] );
        $('#edit_account .input-lname').val( user['LastName'] );
        $('#edit_account .input-phone').val( user['PhoneNumber'] );
        $('#edit_account .input-email').val( user['Email'] );
        $('#edit_account .input-address').val( user['AddressLine1'] + ' '+ user['AddressLine2'] );

        $('#edit_account').show();
    }

    <?php if( $form_error != ''): ?>
        display_edit( <?php echo @$_REQUEST['person_id'] || 'Object.keys( accounts )[0]'; ?> );
    <?php else: ?>
        display_user( Object.keys( accounts )[0] );
    <?php endif; ?>

    <?php if( $alert ): ?>
        alert('<?php echo $alert; ?>');
        <?php if( $redirect ): ?>
            setTimeout( function() {
                window.location.href = '<?php echo site_url(); ?>/investors/profile';
            }, 100 );
        <?php endif; ?>
    <?php endif; ?>

    console.log( accounts );
});

</script>

<?php

get_footer();

