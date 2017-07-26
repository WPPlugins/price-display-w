<?php
/*
Plugin Name: Price Display Change for Welcart
Plugin URI: http://templx.com/
Description: This plugin am dedicated to Welcart-Commerce. Welcarte-Commerce Valid only when Available.
Author: TEMPLX
Version: 1.2
Text Domain: TEMPLX
Author URI: http://templx.com/
*/

 define('PDCWTX_VERSION', '1.2');
 define('PDCWTX_WP_CONTENT_DIR', ABSPATH . 'wp-content');
 define('PDCWTX_WP_PLUGIN_DIR', PDCWTX_WP_CONTENT_DIR . '/plugins');
 define('PDCWTX_PLUGIN_DIR', PDCWTX_WP_PLUGIN_DIR . '/' . plugin_basename(dirname(__FILE__)));
 define('PDCWTX_CONTENT_URL', get_option('siteurl') . '/wp-content/plugins');
 define('PDCWTX_PLUGIN_URL', PDCWTX_CONTENT_URL . '/' . plugin_basename(dirname(__FILE__)));

  function pdcwtx_update_setting(){
    //update_option('pdcwtx_crform_option', 'true');
    update_option('PDCWTX_VERSION', '1.2');
  }
  register_activation_hook(__FILE__, 'pdcwtx_update_setting');

    $pdcwtx_languages = basename(dirname(__FILE__));
    load_plugin_textdomain('pdcwtx', false, $pdcwtx_languages. '/languages');
    require_once(PDCWTX_PLUGIN_DIR."/pdcwtx_itempage.php");
    require_once(PDCWTX_PLUGIN_DIR."/pdcwtx_cart.php");
    require_once(PDCWTX_PLUGIN_DIR."/pdcwtx_other.php");

      add_action('usces_action_shop_admin_menue', 'price_display_change_add');
        function price_display_change_add(){
          add_submenu_page(USCES_PLUGIN_BASENAME, __('Price Display Change','pdcwtx'), __('Price Display Change','pdcwtx'), 'level_6', 'pdcwtx_add', 'price_display_change_admin_pages');
        }

          function price_display_change_admin_pages(){
            if(isset($_REQUEST['pdcwtx_crform_option'])){
              update_option('pdcwtx_crform_option', $_REQUEST['pdcwtx_crform_option']);
              check_admin_referer( 'pdcwtx_add' );
            }
            require_once(PDCWTX_PLUGIN_DIR.'/pdcwtx_admin.php');
          }

     add_action('wp_head', 'pdcwtx_css_style');
       function pdcwtx_css_style(){
         echo '<link rel="stylesheet" type="text/css" href="'.PDCWTX_PLUGIN_URL.'/css/pdcwtx.css" media="all" />';
       }
?>