<?php
/**
 *
 * @Avoid to use this file for developing your custom code!!!
 *
 */

//load framework
if(file_exists(get_template_directory().'/base/index.php')){
    require_once get_template_directory().'/base/index.php';
}

global $NS;

$NS::load_root_folder_files(array(
   'path' => array(
        get_template_directory().'/includes/',
   )
));