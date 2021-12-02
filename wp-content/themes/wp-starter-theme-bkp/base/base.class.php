<?php


class NS{

    public function __construct(){

        //check if the PHP version matches with the one we set up in config
        self::compare_php_version(NS_PHP_VERSION);

        //include base modules files
        self::load_base_modules($GLOBALS['ns_cfg']['base_modules']);

        //remove certain widgets
        self::unregister_widgets($GLOBALS['ns_cfg']['remove_widgets']);

        //hide certain plugins
        self::hide_plugins($GLOBALS['ns_cfg']['hidden_plugins']);

        //add custom thumbnail size
        self::add_thumbnail_sizes($GLOBALS['ns_cfg']['thumbnail_sizes']);


        if( $GLOBALS['ns_cfg']['phpinfo'] === true ){
            phpinfo();
            exit;
        }

    }




    public static function compare_php_version($version){

        if(version_compare(phpversion(), $version, '<')){
            exit("Sorry, your PHP version is older than ".$version.", please upgrade it!");
        }
    }




    /**
     * Add custom thumbnail size
     * @param array $sizes
     */
    public static function add_thumbnail_sizes($sizes){

        if(is_array($sizes) && count($sizes) > 0){
            foreach($sizes as $size){
                add_image_size( $size['name'], $size['size']['w'], $size['size']['h'], $size['crop'] );
            }
        }

    }




    public static function register_menu_locations($locations){

        $menus = array();

        if(is_array($locations) && count($locations) > 0){

            foreach($locations as $location){

                if(!empty($location) && !has_nav_menu(sanitize_title($location))){

                    $menus[sanitize_title($location)] = ucwords(str_replace(array('-', '_'), array(' ', ' '), $location));
                }
            }

            if(count($menus) >0){
                register_nav_menus($menus);
            }
        }
    }




    /**
     * Uregistered post types
     * @param array $types
     */
    public static function unregister_types( $types ) {

        //this needs at least PHP 5.3 to works
        add_action('init', function() use ($types){
            global $wp_post_types;

            //echo '<pre>'.print_r($wp_post_types,1).'</pre>'; exit;

            if(is_array($types)){

                foreach($types as $type){

                    if ( isset( $wp_post_types[ $type ] ) ) {
                        unset( $wp_post_types[ $type ] );
                    }
                }
            }

        }, 99);
    }




    /**
     * Unregister widgets
     * @return array $widgets
     */
    public static function unregister_widgets($widgets = null) {

        if( is_array($widgets) && count($widgets) > 0 ){

            add_action('widgets_init', function() use($widgets){

                foreach($widgets as $widget){
                    unregister_widget($widget);
                }

            });
        }

    }




    /**
     * Hide specified plugins from dashboad plugins section
     * @param array $hide_these
     */
    public static function hide_plugins($hide_these){

        //this needs at least PHP 5.3 to works
        add_filter('all_plugins', function($plugins) use ($hide_these){

            foreach($hide_these as $hide){
                unset($plugins[$hide] );
            }

            return $plugins;
        });
    }



    /**
     * Include core extensions
     *
     * @param array $files - an array with file paths
     */
    public static function load_inc_extensions($files){

        foreach ($files as $file) {

            if (file_exists(NS_INCLUDES.'/extensions/'.$file)) {
                require_once NS_INCLUDES.'/extensions/'.$file;
            }
        }
    }


    /**
     * Include core extensions
     *
     * @param array $files - an array with file paths
     */
    public static function load_base_modules($files){

        foreach ($files as $file) {

            if (file_exists(NS_BASE.'/modules/'.$file)) {
                require_once NS_BASE.'/modules/'.$file;
            }
        }
    }




    private static function usort_by_priority($a, $b) {
        return $a['priority'] - $b['priority'];
    }



    /**
     * Include all PHP files found in the given path
     * @param array $params - $params['path']
     */
    public static function load_root_folder_files($params){

        if(is_array($params) && isset($params['path']) && !empty($params['path'])){
            $wrap_arr = array();
            $final = array();
            $rest = array();

            foreach($params['path'] as $path){
                $path_files = glob("{$path}*php");

                if(is_array($path_files) && !empty($path_files)){
                    foreach (glob("{$path}*php") as $filename){
                        if(!is_dir($filename)){
                            $spec_files = self::get_file_specs($filename, array('priority', 'exclude'));

                            if(is_array($spec_files)){
                                $spec_files['path'] = $filename;
                                $wrap_arr[] = $spec_files;
                            }else{
                                $rest[] = $filename;
                            }
                        }
                    }
                }
            }


            if(is_array($wrap_arr) && !empty($wrap_arr)){
                usort($wrap_arr, array('NS','usort_by_priority'));
                arsort($wrap_arr);

                $arr = array();

                foreach($wrap_arr as $item){
                    if(isset($item['exclude'])){
                        unset($wrap_arr[array_search($item, $wrap_arr)]);
                    }else{
                        $arr[] = $item['path'];
                    }
                }

                $final = array_merge($arr, $rest);
            }else{
                $final = $rest;
            }

            foreach($final as $item){
                require_once $item;
            }
        }
    }





    /**
     * Return file specifications from the top comment of file
     * @param string $path
     * @param string|array $finds
     */
    public static function get_file_specs($path, $finds){
        $handle = @fopen($path, "r");
        $output = '';
        $lines = array();

        if ($handle) {
            $line=0;
            while (($buffer = fgets($handle, 4096)) !== false) {
                if($line < 5 && $buffer !=''){
                    $lines[] = $buffer;
                }
                $line++;
            }

            foreach ($lines as $line){
                if(is_array($finds)){
                    foreach ($finds as $find){
                        if(stripos($line, $find) !==false){
                            $values = explode(':', $line);
                            if(isset($output[$find])){
                              $output[$find] = trim($values[1]);
                            }
                        }
                    }

                }else{
                    $output = trim($line);
                }
            }

            fclose($handle);

            return $output;

        }
    }


}

global $NS;
$NS = new NS;