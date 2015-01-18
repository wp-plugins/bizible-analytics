<?php
/*
Copyright © 2013: Bizible.com

Plugin Name: Bizible Analytics
Plugin URI: http://bizible.com/
Description: Local search analytics plugin to help track the offline conversion. Please visit <a href="http://bizible.com">Bizible</a> for more information.
Version: 0.2.2
Author: Aaron Bird, Peter Thompson, Jason Li
Author URI: http://bizible.com

*/


$biz_plugin_script      = '//cdn.bizible.com/scripts/bizible.js';
$biz_script_handle      = 'biz_analytics_js';


function enqueue_biz_analytics()
{
    global $biz_plugin_script;
    global $biz_script_handle;
    
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https:" : "http:";
    wp_enqueue_script ( 
        $biz_script_handle,
        $protocol . $biz_plugin_script,
        false,
        null,
        false);
}

function add_async_attribute($url)
{
    if ( FALSE === strpos($url, 'cdn.bizible.com/scripts/bizible'))
    {
        return $url;
    }
    // Must be a ', not "!
    return "$url' async='";
}


// Hooked only to front-end pages (non-admin)
add_action('wp_enqueue_scripts', 'enqueue_biz_analytics');
add_filter( 'clean_url', 'add_async_attribute', 11, 1 );
?>