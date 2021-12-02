<?php
    if ( ! defined( 'ABSPATH' ) ) // Or some other WordPress constant
    exit;
    

    $uid = intval( $_GET['admin_id'] );
    $user = get_user_by('id', $uid );

    $assigned_investors = FinancePluginHelper::get_investors( $uid );

    if( wp_verify_nonce( @$_REQUEST['_wpnonce'] ) ){
        if( isset( $_POST['add_investor'] ) ){
            //add investor to admin
            $iid = $_POST['add_investor'];
            $assigned_investors[] = $iid;
        }
        if( isset( $_POST['remove_investor'] ) ){
            //remove investor to admin
            $iid = $_POST['remove_investor'];
            unset( $assigned_investors[ array_search( $iid, $assigned_investors ) ] );            
        }        
        
       update_user_meta( $uid, 'assigned_investors', json_encode( $assigned_investors ) );
    }

    $investors = get_users( array(
        'role' => 'financial_investor'
    ));

    list( $assigned, $to_add ) = FinancePluginHelper::get_investors_to_add( $investors, $assigned_investors );

    // print_r( $assigned_investors );
?>

<div class="wrap">
    <br>
    <ul class="subsubsub">
        <li><a href="<?php echo admin_url('admin.php?page='.FinancePlugin::$path.'/edit-finance-admins.php'); ?>">Investor Admins</a> &gt; </li>
        <li><span><?php echo $user->data->display_name; ?> ( FinancialAdmin )</span></li>
    </ul>
    <br><br><br>

    <section>
        <table class="wp-list-table widefat fixed" role="presentation">
            <tbody>
                <tr>
                    <td rowspan="3">
                        <img alt="" src="<?php echo get_avatar_url( $user ); ?>" class="avatar avatar-32 photo" height="80" width="80" loading="lazy">
                    </td>
                    <td><h2 style="margin: 0"><?php echo $user->data->display_name; ?></h2></td>
                    <td rowspan="3" colspan="8">

                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo FinancePlugin::get_role_name( $user->roles[0] ); ?></strong></td>
                </tr>
                <!-- <tr>
                    <td><h5 style="margin: 0">InvestorID: <?php echo get_the_author_meta('person_id', $user->ID ); ?></h5></td>
                </tr> -->
            </tbody>
        </table>
    </section>
    <br>

        <div class="tablenav top">
            <h1 class="wp-heading-inline">Edit Investors</h1>
            <a href="http://localhost/wp-admin/user-new.php" class="page-title-action">Add New</a>

            <div class="tablenav-pages one-page"><span class="displaying-num">4 admins</div>
        </div>
        <div style="height: 16px">&nbsp;</div>
        <table class="wp-list-table widefat fixed striped table-view-list users">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Name</th>
                    <th scope="col">Person ID</th>
                    <th scope="col">IMS accounts</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if( count( $assigned ) ):
                foreach( $assigned as $investor ): ?>

                    <?php $investor_link = admin_url('admin.php?page=finance-plugin/edit-finance-admins.php&action=edit_accounts&admin_id='.$user->ID.'&investor_id='.$investor->ID); ?>
                    <tr>
                        <td class="username column-username has-row-actions column-primary">
                            <?php get_avatar( $investor );  ?>
                            <!-- <img alt="" src="http://2.gravatar.com/avatar/84a9f7ace88904c4c4edc29df3af85b4?s=32&amp;d=mm&amp;r=g" srcset="http://2.gravatar.com/avatar/84a9f7ace88904c4c4edc29df3af85b4?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="32" width="32" loading="lazy"> -->
                            <a href="<?php echo $investor_link; ?>">
                                <?php echo $investor->data->display_name; ?></strong></a>
                        </td>

                        <td><?php echo $investor->data->user_login; ?></td>
                        <td><?php echo get_the_author_meta( 'person_id', $investor->ID ); ?></td>
                        <td><a href="<?php echo $investor_link;?>">
                            <?php echo count( FinancePluginHelper::get_investor_accounts( $investor->ID ) ); ?> accounts
                        </a></td>
                        <td><form method="post">
                                <?php wp_nonce_field(); ?>
                                <input type="hidden" name="remove_investor" value="<?php echo $investor->ID; ?>" />
                                <button type="submit" class="button delete-btn" onClick="if(confirm('Remove?')){ return true; }else{ return false;}">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; else: ?>
                    <tr><td colspan="5">
                        <h4 style="color: #777777;">No investors assigned.</h4>
                    </td></tr>
                <?php endif; ?>
            </tbody>
        </table>

    <form method="post">
        <?php wp_nonce_field(); ?>
        <section>
            <h3>Assign new Investor to this InvestorAdmin</h3>
            <table class="wp-list-table widefat fixed" role="presentation">
                <tbody>
                    <tr>
                        <td>
                            <select name="add_investor" style="max-width: 300px; width:100%;">
                                <?php if( count( $to_add )): ?>
                                    <option value="">Select</option>
                                <?php foreach( $to_add as $investor ): ?>
                                    <option value="<?php echo $investor->ID; ?>"><?php echo $investor->data->display_name; ?> (<?php echo $investor->data->user_email; ?>)</option>
                                <?php endforeach; else: ?>
                                    <option value="" selected disabled>No more investors to add</option>
                                <?php endif; ?>
                            </select>
                        </td>
                        <td colspan="3">
                            <button type="submit" class="button">Add Investor</button>
                        </td>
                    </tr>
                </tbody>
            </table>            
        </section>
    </form>
</div>