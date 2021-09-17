<?php

/*
  Plugin Name: Autoupdate from cbr.ru for Currency per Product
  Plugin URI: http://shikarno.net
  Description: Autoupdate exchange rate from cbr.ru for Currency per Product WooCommerce plugin
  Author: Павел Воробьев
  Version: 1.0
  Author URI: http://shikarno.net
 */

define('CPP_EXCHANGE_RATE_OPTION', 'alg_wc_cpp_exchange_rate_1');
define('CPP_CBR_VALUTE_ID', 'R01239'); // EUR
define('CPP_DEFAULT_VAL', 'EUR');

function cppcbr_woocommerce_currency($woocommerce_currency) {
    if (!is_admin())
        return $woocommerce_currency;
    global $pagenow;
    if ($pagenow == 'post-new.php') {
        return CPP_DEFAULT_VAL;
    }
    return $woocommerce_currency;
}

add_filter('woocommerce_currency', 'cppcbr_woocommerce_currency');

function cppcbr_update_currency() {
    $doc = new \DOMDocument();
    $doc->load('http://www.cbr.ru/scripts/XML_daily.asp');
    $xpath = new \DOMXPath($doc);
    $curs = (float) str_replace(',', '.', $xpath->query('/ValCurs/Valute[@ID="' . CPP_CBR_VALUTE_ID . '"]/Value')->item(0)->textContent);
    if (!$curs)
        return false;
    $curs = 1 / $curs;
    return update_option(CPP_EXCHANGE_RATE_OPTION, $curs);
}

add_action('cppcbr_schedule', 'cppcbr_update_currency');


function cppcbr_activation() {
    if (!wp_next_scheduled('cppcbr_hourly_event')) {
        wp_schedule_event(time(), 'hourly', 'cppcbr_schedule');
    }
}

register_activation_hook(__FILE__, 'cppcbr_activation');

function cppcbr_deactivation() {
    wp_clear_scheduled_hook('cppcbr_schedule');
}

register_deactivation_hook(__FILE__, 'cppcbr_deactivation');