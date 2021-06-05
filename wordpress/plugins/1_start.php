<?php
/*
Plugin Name: Mani plugin
Plugin URI: https://manisingh.com/
Description: Just another contact form plugin. Simple but flexible.
Author: Mani singh
Author URI: https://mani.wordpress.com/
Text Domain: mani-plugin
Version: 5.4.1
*/


define("PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
define("PLUGIN_URL", plugin_dir_url(__FILE__));
define("PLUGIN_VERSION","1.0");

include_once PLUGIN_DIR_PATH ."/views/index.php";
