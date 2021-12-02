<?php
if ( ! defined( 'ABSPATH' ) ) // Or some other WordPress constant
exit;

$aid = intval( $_GET['admin_id'] );
$admin = get_user_by('id', $aid );

$uid = intval( $_GET['investor_id'] );
$user = get_user_by('id', $uid );

if( wp_verify_nonce( @$_REQUEST['_wpnonce'] ) ){
    // echo 'verified';
    if( isset( $_POST['sync_ims'] ) ){   
        FinancePluginHelper::get_and_save_ims_accounts( $uid );
    }
}

$ims_accounts = FinancePluginHelper::get_investor_accounts( $uid );

?>
<div class="wrap">
    <br>
    <ul class="subsubsub">
        <li><a href="<?php echo admin_url('admin.php?page=finance-plugin/edit-finance-admins.php'); ?>">Investor Admins</a> &gt; </li>
        <li><a href="<?php echo admin_url('admin.php?page=finance-plugin/edit-finance-admins.php&action=edit_investors&admin_id='.$admin->ID ); ?>">
            <?php echo $admin->data->display_name;?></a> &gt;
        </li>
        <li><span><?php echo $user->data->display_name;?></span></li>
    </ul>
    <br><br><br>

    <section>
        <table class="wp-list-table widefat fixed" role="presentation">
            <tbody>
                <tr>
                    <td rowspan="3">
                    <img alt="" src="<?php echo get_avatar_url( $user ); ?>" class="avatar avatar-32 photo" height="80" width="80" loading="lazy">
                    </td>
                    <td><h2 style="margin: 0"><?php echo $user->data->display_name;?></h2></td>
                    <td rowspan="3" colspan="3">

                    </td>
                    <td rowspan="3" colspan="5" style="vertical-align:middle; text-align: center;"> 
                        <form method="post">
                            <?php wp_nonce_field(); ?>
                            <input type="hidden" name="sync_ims" value="1" />
                            <button type="submit" class="button" style="padding: 10px 20px; background: #8888ff;color:#fff;" >SYNC with IMS</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo FinancePlugin::get_role_name( $user->roles[0] ); ?></strong></td>
                </tr>
                <tr>
                    <td><h5 style="margin: 0">PersonID: <?php echo get_the_author_meta( 'person_id', $uid ); ?></h5></td>
                </tr>
            </tbody>
        </table>
    </section>
    <br>

    <form method="get">
        <div class="tablenav top">
            <h1 class="wp-heading-inline">Accounts</h1>
            <div class="tablenav-pages one-page"><span class="displaying-num"><?php echo count( $ims_accounts ); ?> accounts</div>
        </div>
        <div style="height: 16px">&nbsp;</div>
        <table class="wp-list-table widefat fixed striped table-view-list users">
            <thead>
                <tr>
                    <th scope="col">Account Id</th>
                    <th scope="col">Legal Name</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php if( count( $ims_accounts ) ): ?>
                <?php foreach( $ims_accounts as $account ): ?>
                    <tr>
                        <td class="username column-username has-row-actions column-primary"><strong><?php echo $account; ?></strong></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="3"><h4 style="color: #777777;">No accounts on this personID.</h4></td></tr>
                <?php endif; ?>
            </tbody>
        </table>

    </form>
</div>