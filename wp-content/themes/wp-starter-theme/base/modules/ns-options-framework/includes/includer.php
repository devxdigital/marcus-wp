<?php

//contains usefull functions
include plugin_dir_path(__FILE__).'functions.php';
//contains usefull functions for stings
include plugin_dir_path(__FILE__).'misc/string-utils.php';

//related to Posts Field
include plugin_dir_path(__FILE__).'misc/post-selector.php';
//related to Color Field
include plugin_dir_path(__FILE__).'misc/color.php';
//related to Font Field
include plugin_dir_path(__FILE__).'misc/fonts.php';
//related to Icon Field
include plugin_dir_path(__FILE__).'icons/icons.php';

//loads all classes from a given path
include plugin_dir_path(__FILE__).'autoloader.class.php';
//main nsof class
include plugin_dir_path(__FILE__).'nsof.class.php';
//misc hooks
include plugin_dir_path(__FILE__).'hooks.php';

