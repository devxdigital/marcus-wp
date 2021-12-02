<?php
if ( ! defined( 'ABSPATH' ) ) // Or some other WordPress constant
     exit;

$admins = get_users( array(
    'role' => 'financial_admin'
));


?>

<div class="wrap">
    <h1 class="wp-heading-inline">Investor Admins</h1>
    <a href="<?php echo admin_url('user-new.php'); ?>" class="page-title-action">Add New</a>

    <form method="get">
        <div class="tablenav top">
            <div class="tablenav-pages one-page"><span class="displaying-num">4 admins</div>
        </div>
        <table class="wp-list-table widefat fixed striped table-view-list users">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Investors assigned</th>
                </tr>
            </thead>
            <tbody>
                <?php if( count( $admins ) > 0 ): ?>
                <?php foreach( $admins as $key=>$user ): 
                    $edit_url = admin_url('admin.php?page='.FinancePlugin::$path.'/edit-finance-admins.php&action=edit_investors&admin_id='.$user->ID );
                    ?>
                <tr>
                    <td class="username column-username has-row-actions column-primary">
                        <img alt="" src="<?php echo get_avatar_url( $user ); ?>" class="avatar avatar-32 photo" height="32" width="32" loading="lazy">
                        <a href="<?php echo $edit_url; ?>">
                        <strong><?php echo $user->data->user_login; ?></strong></a>
                    </td>
                    <td><a href="<?php echo $edit_url; ?>">
                        <?php echo $user->data->display_name; ?>
                        </a>
                    </td>
                    <td><?php echo $user->data->user_email; ?></td>
                    <td><a href="<?php echo $edit_url; ?>">4 investors assigned</a></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </form>
</div>