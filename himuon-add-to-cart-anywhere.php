<?php

use Himuon\ATCA\Init;
/**
 * Plugin Name:       Himuon – Add to Cart Anywhere (Impreza Extension)
 * Description:       Adds a custom Impreza / US Builder element that allows you to render a WooCommerce Add-to-Cart form anywhere on the page using a specified Product ID.
 * Version:           1.0.0
 * Author:            Reagan Mahinay
 * Author URI:        https://github.com/ReaganM02
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       himuon-atca
 * Requires at least: 6.9
 * Requires PHP: 7.4
 * Tested up to: 6.9
 * Requires Plugins: us-core, woocommerce
 * @package himuon-atca
 */

define('HIMUON_ATCA_VERSION', '1.0.0');
define('HIMUON_ATCA_PATH', plugin_dir_path(__FILE__));
define('HIMUON_ATCA_DIR', plugin_dir_url(__FILE__));


require_once HIMUON_ATCA_PATH . 'vendor/autoload.php';

add_action('plugins_loaded', [Init::class, 'load']);
