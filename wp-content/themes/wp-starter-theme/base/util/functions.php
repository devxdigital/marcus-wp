<?php


if ( !function_exists( 'of_get_option' ) ) {
    /*
     * Helper function to return the theme option value. If no value has been saved, it returns $default.
     * Needed because options are saved as serialized strings.
     * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
     */
    function of_get_option($name, $default = false) {

        $optionsframework_settings = get_option('optionsframework');

        // Gets the unique option id
        $option_name = $optionsframework_settings['id'];

        if ( get_option($option_name) ) {
            $options = get_option($option_name);
        }

        if ( isset($options[$name]) ) {
            return $options[$name];
        } else {
            return $default;
        }
    }
}



if ( !function_exists( 'ns_print_r' ) ) {
    /**
    * Print an array|object in <pre> html tags
    * @param array|object $param
    * @param boolean $exit
    * @param string $type
    */
    function ns_print_r($param, $exit=true, $type=''){

        switch ($type) {

            default:
                echo '<pre>'.print_r($param, true).'</pre>';
                break;

            case 'var_dump':
                echo '<pre>'.var_dump($param, true).'</pre>';
                break;
        }


        if($exit){exit;}
    }
}



if ( !function_exists( 'ns_get_digits' ) ) {
    /**
     * Extract digits from a string
     * @param  string $str
     * @return string
     */
    function ns_get_digits($str){

        if(!empty($str)){
            return preg_replace("/[^0-9]/", "", $str);
        }
    }
}



if ( !function_exists( 'ns_get_last_post' ) ) {
    /**
     * Return last post of a given post type or taxonomy
     * @param  string $post_type
     * @return object
     */
    function ns_get_last_post($category = '', $post_type = '', $tax_query = ''){

        global $wp_query;

        $post_type = empty($post_type) ? get_post_type() : $post_type;

        $args = array(
            'post_type' => $post_type,
            'post__not_in' => get_option('sticky_posts'),
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'DESC',
        );

        if(!empty($category)){
            $args['category'] = $category;
        }

        if(!empty($wp_query->tax_query->queries)){
            $args['tax_query'] = $wp_query->tax_query->queries;
        }


        $last_post = new WP_Query($args);

        if(is_array($last_post->posts) && count($last_post->posts) > 0){
            return $last_post->posts[0];

        }

    }
}




if ( !function_exists( 'ns_get_author_role' ) ) {
    /**
     * Get author role. Works only in loop.
     * @return string
     */
    function ns_get_author_role(){
        global $authordata;

        $author_roles = $authordata->roles;
        $author_role = array_shift($author_roles);

        return ucfirst($author_role);
    }
}



if ( !function_exists( 'ns_get_user_data' ) ) {
    /**
     * Get data of the current user or a certain user
     * @param  string  $return - ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered,
     *                           display_name, first_name, last_name, nickname, description, wp_capabilities
     * @param  boolean $logged - if to get data from current user logged or ot get from a certain user
     * @param  string|int  $id - id of the user you want to get the data if $logged = false
     * @return string|false
     */
    function ns_get_user_data($return = null, $logged = true, $id = null){

        $user_id = $logged == true ? get_current_user_id() : $id;

        if($user_id != null){

            $user_data = get_userdata($user_id);

            if($return == null){
                return $user_data;
            }

            if(isset($user_data->$return)){
                return $user_data->$return;
            }else{
                return fasle;
            }

        }else{
            return fasle;
        }

    }
}



if ( !function_exists( 'ns_get_random_string' ) ) {
    /**
     * Generate a random string
     * @param  integer $length
     * @return string
     */
    function ns_get_random_string($length = 10) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}



if ( !function_exists( 'ns_remove_empty_array_values' ) ) {
    /**
     * Remove empty values from an array keeping same keys
     * @param  array $array
     * @return array|string
     */
    function ns_remove_empty_array_values($array) {

        if (!is_array($array)) {
          return $array;
        }
        $non_empty_items = array();

        foreach ($array as $key => $value) {
          if(!empty($value)) {
            $non_empty_items[$key] = ns_remove_empty_array_values($value);
          }
        }
        return $non_empty_items;
    }
}



if ( !function_exists( 'ns_strpos_array' ) ) {
    /**
     * Check if a value exists in the array
     * @param string $haystack - what is searching
     * @param array $needles - the array where to search
     */
    function ns_strpos_array($haystack, $needles) {

        if ( is_array($needles) ) {
            foreach ($needles as $str) {
                if ( is_array($str) ) {
                    $pos = fw_strposArray($haystack, $str);
                } else {
                    $pos = strpos($haystack, $str);
                }

                if ($pos !== false) {
                    return $pos;
                }
            }
        } else {
            return strpos($haystack, $needles);
        }
    }
}



if ( !function_exists( 'ns_get_terms_by_post_type' ) ) {
    /**
     * Return terms (categories) of custom post types
     * @param  array $taxonomies
     * @param  array $post_types
     * @return array with objects
     */
    function ns_get_terms_by_post_type( $taxonomies, $post_types ) {

        global $wpdb;

        $query = $wpdb->prepare(
            "SELECT t.*, COUNT(*) from $wpdb->terms AS t
            INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id
            INNER JOIN $wpdb->term_relationships AS r ON r.term_taxonomy_id = tt.term_taxonomy_id
            INNER JOIN $wpdb->posts AS p ON p.ID = r.object_id
            WHERE p.post_type IN('%s') AND tt.taxonomy IN('%s')
            GROUP BY t.term_id",
            join( "', '", $post_types ),
            join( "', '", $taxonomies )
        );

        $results = $wpdb->get_results( $query );

        return $results;

    }
}



if ( !function_exists( 'ns_count_sidebar_widgets' ) ) {
    /**
     * Count all widgets from a sidebar
     * @param string $sidebar_id
     * @param int $cols
     * @param boolean $echo
     */
    function ns_count_sidebar_widgets( $sidebar_id, $cols=12, $echo = true) {

        $the_sidebars = wp_get_sidebars_widgets();

        if(!isset($the_sidebars[$sidebar_id])){
            return __( 'Invalid sidebar ID', 'wp-starter-theme' );
        }

        $num = count($the_sidebars[$sidebar_id])== 0 ? $cols/1 : $cols/count($the_sidebars[$sidebar_id]);

        if($echo){
            echo $num;
        }else{
            return $num;
        }
    }
}

/** Custom Functions for Ignite Funding **/

function if_quick_summary() {
    $output  = '';
    $output .= '<div class="row g-0 mb-0 summary">';
    $output .= '    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">';
    $output .= '        <div class="card text-white text-center">';
    $output .= '            <div class="card-body">';
    $output .= '                <h3 class="mb-0">$39,534.08</h3>';
    $output .= '                <p class="card-text fine-print">Loans Funded</p>';
    $output .= '            </div>';
    $output .= '        </div>';
    $output .= '    </div>';
    $output .= '    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">';
    $output .= '        <div class="card text-white text-center">';
    $output .= '            <div class="card-body">';
    $output .= '                <h3 class="mb-0">$15,000.00</h3>';
    $output .= '                <p class="card-text fine-print">Pledges</p>';
    $output .= '            </div>';
    $output .= '        </div>';
    $output .= '    </div>';
    $output .= '    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">';
    $output .= '        <div class="card text-white text-center">';
    $output .= '            <div class="card-body">';
    $output .= '                <h3 class="mb-0">$153,235.21</h3>';
    $output .= '                <p class="card-text fine-print">Remaining Balance Available to Invest</p>';
    $output .= '            </div>';
    $output .= '        </div>';
    $output .= '    </div>';
    $output .= '    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">';
    $output .= '        <div class="card text-white text-center">';
    $output .= '            <div class="card-body">';
    $output .= '                <h3 class="mb-0">$83,000.00</h3>';
    $output .= '                <p class="card-text fine-print">Interest Earned to Date</p>';
    $output .= '            </div>';
    $output .= '        </div>';
    $output .= '    </div>';
    $output .= '</div>';

    echo $output;
}

function if_accounts_summary() {
    $output  = '';
    $output .= '<div class="row g-0 mb-3 summary accounts">';
    $output .= '    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">';
    $output .= '        <div class="card text-white text-center">';
    $output .= '            <div class="card-body tax-information-boxes">';
    $output .= '                <h3 class="mb-0">$39,534.08</h3>';
    $output .= '                <p class="card-text fine-print">Invested Amount</p>';
    $output .= '            </div>';
    $output .= '        </div>';
    $output .= '    </div>';
    $output .= '    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">';
    $output .= '        <div class="card text-white text-center">';
    $output .= '            <div class="card-body tax-information-boxes">';
    $output .= '                <h3 class="mb-0">$15,000.00</h3>';
    $output .= '                <p class="card-text fine-print">Pledged on Investments</p>';
    $output .= '            </div>';
    $output .= '        </div>';
    $output .= '    </div>';
    $output .= '    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">';
    $output .= '        <div class="card text-white text-center">';
    $output .= '            <div class="card-body tax-information-boxes">';
    $output .= '                <h3 class="mb-0">$153,235.21</h3>';
    $output .= '                <p class="card-text fine-print">Remaining Amount to Invest</p>';
    $output .= '            </div>';
    $output .= '        </div>';
    $output .= '    </div>';
    $output .= '    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">';
    $output .= '        <div class="card text-white text-center">';
    $output .= '            <div class="card-body tax-information-boxes">';
    $output .= '                <h3 class="mb-0">$83,000.00</h3>';
    $output .= '                <p class="card-text fine-print">Interest Earned to Date</p>';
    $output .= '            </div>';
    $output .= '        </div>';
    $output .= '    </div>';
    $output .= '</div>';

    echo $output;
}