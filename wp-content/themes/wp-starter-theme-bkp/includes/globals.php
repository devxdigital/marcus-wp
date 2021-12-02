<?php

//Priority: 670

/**
 * Use this file to set your global variables.
 * We specified a priority index to include this file
 * first, before the rest of the files from the includes folder
 */

//get all theme option values
$GLOBALS['th_opt'] = nsof_get_option('', 'nsof-theme-options');


//logo state
$GLOBALS['logo_type'] = nsof_get_option('main_logo', $GLOBALS['th_opt'])!='' ? wp_get_attachment_image( nsof_get_option('main_logo', $GLOBALS['th_opt']), 'full') : '';

//sticky header
$GLOBALS['is_header_sticky'] = (nsof_get_option('is_header_sticky', $GLOBALS['th_opt'])!='' && nsof_get_option('is_header_sticky', $GLOBALS['th_opt'])!='no') ? nsof_get_option('is_header_sticky', $GLOBALS['th_opt']) : '';
