<?php
/**
 * @package Finance
 * @version 1.0.0
 */
/*
Plugin Name: FinancePlugin
Plugin URI: http://example.com
Description: Finance Plugin by Bratu
Author: Bratu Sebastian
Version: 1.0.0
Author URI: http://example.com/
*/

require_once( 'helpers/helper.php' );

class FinancePlugin {
    static $path = 'finance-plugin';

    function __construct(){
        
    }

    function init(){
        
    }

    function install(){
        $this->add_roles();
        $this->add_endpoints();

        add_option('finance_plugin_audited_financials_file',  false );
    }
    function uninstall(){
        flush_rewrite_rules(true);
    }
    function add_actions(){ 
        add_action('admin_menu', array( $this, 'init_admin') );
        
        //add custom personID meta field to user of type FinancialAdmin
        add_action( 'edit_user_profile', array( $this, 'init_custom_user_profile_fields') );
        add_action( 'edit_user_profile_update', array( $this, 'save_custom_user_profile_fields') );

        remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

        // redirect Investor accounts to custom dashboard
        add_filter( 'login_redirect', array( $this, 'investor_login_redirect'), 10, 3 );
        //re-load data from IMS on login
        add_action('wp_login', array( $this, 'user_login_pulldata'), 10, 2 );
        add_action('wp_logout', array( $this, 'user_logout'), 10, 2 );
        //remove admin bar for all users
        add_action('wp_loaded', array( $this, 'remove_admin_bar'), 10, 2 );
        add_action( 'wp_before_admin_bar_render', array( $this, 'investor_bar_render') );

        //frontend actions
        add_filter( 'query_vars', function( $query_vars ){
            $query_vars[] = 'investor_page';
            $query_vars[] = 'qid';
            return $query_vars;
        } );
        add_action( 'template_redirect', function(){
            $pname = strval( get_query_var( 'investor_page' ) );

            if ( $pname && file_exists( plugin_dir_path( __FILE__ ). 'templates/'.$pname.'-page.php') ) {
                include plugin_dir_path( __FILE__ ) . 'templates/'.$pname.'-page.php';
                exit;
            }
        } );

        add_action('wp_enqueue_scripts', array( $this, 'register_styles') );
        $this->add_shortcodes();


        // change admin investor id hook
        $this->hook_investor_admin();


        add_action( 'wp_login_failed', array( $this, 'front_end_login_fail') );  // hook failed login
    }

    function front_end_login_fail( $username ) {
        $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
        // if there's a valid referrer, and it's not the default log-in screen
        if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
            wp_redirect( $referrer . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
            exit;
        }
    }

    function add_shortcodes(){
        add_shortcode( 'audited-financials-link', array( $this, 'get_audited_financials_link') );
    }

    function get_audited_financials_link( $atts ) {
        return get_option('finance_plugin_audited_financials_file');
    }
    
    function add_endpoints(){
        
        add_rewrite_rule('^investors/account/([^/]+)/?$', 'index.php?investor_page=account&qid=$matches[1]', 'top' );
        add_rewrite_rule('^investors/taxes/([^/]+)/?$', 'index.php?investor_page=taxes&qid=$matches[1]', 'top' );
        add_rewrite_rule('^investors/account-representatives/([^/]+)/?$', 'index.php?investor_page=representatives&qid=$matches[1]', 'top' );
        add_rewrite_rule('^investors/profile', 'index.php?investor_page=profile', 'top' );
        add_rewrite_rule('^investors/([^/]+)/?$', 'index.php?investor_page=$matches[1]', 'top' );
        add_rewrite_rule('^investors/?$', 'index.php?investor_page=index', 'top' );

        flush_rewrite_rules(true);
    }
    function register_styles(){
        wp_enqueue_style( 'style1', plugins_url( 'css/style.css' , __FILE__ ) );
    }
    function remove_admin_bar(){

        if (current_user_can('administrator') ) {
            show_admin_bar(true);
        } else if( current_user_can('view_investors_financial_accounts') ){
            show_admin_bar(true);
        } else {
            show_admin_bar(false);
        }
    }

    function investor_bar_render(){
        if( current_user_can('view_investors_financial_accounts') ){
            global $wp_admin_bar; 

            $all = get_users( array(
                'role' => 'financial_investor'
            ));
            $investors = FinancePluginHelper::get_investors( get_current_user_id() );
            $active_investor = intval( @$_COOKIE['wpb_financial_admin_selected_user'] );

            //print_r( array('chosen'=>$active_investor ) );

            $investor_nodes = $active_investor? '' : '<option value="">Select ...</option>';
            foreach( $all as $investor ){
                if( in_array( $investor->ID, $investors ) ){
                    $investor_nodes .= '<option value="'.$investor->ID.'" '.( $active_investor == $investor->ID? 'selected="selected"' : '').'>'.$investor->data->display_name.'</option>';
                }
            }
    
            foreach( $wp_admin_bar->get_nodes() as $key => $node ){
                $wp_admin_bar->remove_node( $key );
            }
            $wp_admin_bar->add_node( array('id'=>'investor_admin_bar_menu', 'ttile'=>'Select Investor Account &nbsp;&nbsp;', 'meta'=> 
                array( 'html' => '<div style="position: absolute; width: 100vw; left: 0; top: 0; display:flex; justify-content:center;background: #000; padding: 8px 0;">
                    <form method="post" id="finance_plugin_selector_form">
                        <input type="hidden" name="select_investor" value="1" />
                        <label for="selector1">SELECT INVESTOR ACCOUNT: 
                            <select name="investor_chosen" id="finance_plugin_selector1" style="padding: 2px 10px;">'.$investor_nodes.'</select>
                        </label>
                    </form>
                    <script>jQuery("#finance_plugin_selector1").on("change", function( e ){ 
                        const d = new Date();
                        d.setTime(d.getTime() + (24*60*60*1000));
                        let expires = "expires="+ d.toUTCString();
                        document.cookie="wpb_financial_admin_selected_user="+jQuery(e.target).val()+"; expires="+expires+"; path=/;";
                        setTimeout( function(){
                            jQuery("#finance_plugin_selector_form").submit();
                        }, 100 ); });</script>
                </div>'))
            );
        }
    }

    function add_roles(){
        add_role( 'financial_admin', 'Financial Admin', array( 'read' => true, 'level_0' => true ) );
        $role = get_role( 'financial_admin' );
        $role->add_cap( 'view_financial_accounts' );
        $role->add_cap( 'view_investors_financial_accounts' );

        add_role( 'financial_investor', 'Investor', array( 'read' => true, 'level_0' => true ) );
        $role = get_role( 'financial_investor' );
        $role->add_cap( 'view_financial_accounts' );
        
    }

    function user_login_pulldata( $user_login, $user ){
        if( in_array('financial_investor', $user->roles ) ){
            FinancePluginHelper::get_and_save_ims_accounts( $user->ID );
            FinancePluginHelper::pull_investor_data( $user->ID );
        } else if( in_array('financial_admin', $user->roles ) ){
            $assigned_investors = FinancePluginHelper::get_investors( $user->ID );
            if( count( $assigned_investors ) ){
                //print_r( $assigned_investors );
                setcookie('wpb_financial_admin_selected_user',  $assigned_investors[0], time()+31556926, '/' );
            }
            
            foreach( $assigned_investors as $investor ){
                FinancePluginHelper::get_and_save_ims_accounts( $investor );
                FinancePluginHelper::pull_investor_data( $investor );
            }
            
        }
    }

    function user_logout( $user_id ){
        setcookie('wpb_financial_admin_selected_user', '', time()-3600, '/' );
    }

    function hook_investor_admin(){
        
        // if( isset($_POST['select_investor']) ){
            
        //     // setcookie('wpb_financial_admin_selected_user',  intval( $_POST['investor_chosen'] ), time()+31556926, '/' );

        //     // print_r('HELLO '.intval( $_POST['investor_chosen'] ).' END');
        //     wp_redirect( site_url().'/investors/dashboard' );
        // }
    }





    // admin functions
    function init_admin(){
        $this->create_menu();
        // $this->add_user_meta();
    }

    function create_menu(){
        add_menu_page(
            __( 'Financial Admins', 'textdomain' ),
            'Financial Area',
            'manage_options',
            'finance-plugin/edit-finance-admins.php',
            ''
        );
        add_submenu_page(
            'finance-plugin/edit-finance-admins.php',
            __( 'Audited Financials', 'textdomain' ),
            'Audited Financials',
            'manage_options',
            'finance-plugin/edit-audited-financials.php'
        );
    }

    function init_custom_user_profile_fields( $user ) {
        if( in_array('financial_investor', $user->roles ) ){  ?>
            <h3>Person ID (in IMS)</h3>
            
            <table class="form-table">
                <tr>
                    <th>
                        <label for="address"><?php _e('Person ID', 'your_textdomain'); ?>
                    </label></th>
                    <td>
                        <input type="text" name="person_id" id="person_id" value="<?php echo esc_attr( get_the_author_meta( 'person_id', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php _e('Please enter your PersonID code.', 'your_textdomain'); ?></span>
                    </td>
                </tr>
            </table>
        <?php }
    }
    
    function save_custom_user_profile_fields( $user_id ) {
        if ( !current_user_can( 'edit_user', $user_id ) )
            return FALSE;
        
        update_user_meta( $user_id, 'person_id', $_POST['person_id'] );
    }

    static function get_role_name( $role ){
        global $wp_roles;

        return $wp_roles->roles[ $role ]['name'];
    }

    //investor login
    function investor_login_redirect( $to, $req, $user ){
        if( @$user->errors ){
            return $to;
        }
        
        if( is_array( @$user->roles ) && in_array( 'financial_investor', @$user->roles ) || in_array( 'financial_admin', @$user->roles ) ){
            return site_url('/investors/dashboard');
        }

        return $to;
    }

}
$f = new FinancePlugin();

function financial_admin_render_bar(){
    
    echo '<p class="text-light my-1 col-auto"> Hello sir! </p>';
}

add_action('init', array( $f, 'add_actions') );
register_activation_hook( __FILE__, array( $f, 'install') );
