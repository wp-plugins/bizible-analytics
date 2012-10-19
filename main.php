<?php
/*
Copyright © 2012: Bizible.com

Plugin Name: Bizible Analytics
Plugin URI: http://bizible.com/
Description: Local search analytics plugin to help track the offline conversion. Please visit <a href="http://bizible.com">Bizible</a> for more information.
Version: 0.1.0
Author: Aaron Bird, Peter Thompson, Jason Li
Author URI: http://bizible.com

*/


$biz_plugin_version     = '0.1.0';
$biz_plugin_script      = 'js/analytics.js';
$biz_script_handle      = 'biz_analytics_js';


function enqueue_biz_analytics()
{
    global $biz_plugin_version;
    global $biz_plugin_script;
    global $biz_script_handle;

    wp_enqueue_script ( 
        $biz_script_handle,
        plugins_url($biz_plugin_script, __FILE__),
        false,
        $biz_plugin_version,
        false);
}

// Hooked only to front-end pages (non-admin)
add_action('wp_enqueue_scripts', 'enqueue_biz_analytics');

?>