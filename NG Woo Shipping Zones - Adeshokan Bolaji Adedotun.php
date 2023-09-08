<?php
/**
 * Plugin Name: NG Woo Shipping Zones - Adeshokan Bolaji Adedotun
 * Plugin URI: https://dotun.com.ng/
 * Author: Adeshokan Bolaji Adedotun
 * Author URI: https://dotun.com.ng/
 * Description: NG Woo Shipping Zones
 * Version: 0.1.0
 * License: GPL2 or Later.
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: prefix-plugin-name
*/

// Add Basic Plugin Security
defined('ABSPATH') or die;

add_filter('woocommerce_states', 'dotun_custom_state_list');

function dotun_custom_state_list($states) {
    // Define an array with Nigerian cities and their divisions
    $nigerian_cities = array(
        'NG101' => array(
            'city'     => 'Lagos',
            'division' => 'Lagos Mainland'
        ),
        'NG102' => array(
            'city'     => 'Lagos',
            'division' => 'Lagos Island'
        ),
        'NG103' => array(
            'city'     => 'Outside Lagos',
            'division' => 'Other States'
        ),
        'NGABU' => array(
            'city'     => 'Abuja',
            'division' => 'Federal Capital Territory'
        ),
        'NGABU1' => array(
            'city'     => 'Abuja',
            'division' => 'Wuse'
        ),
        'NGABU2' => array(
            'city'     => 'Abuja',
            'division' => 'Lifecamp'
        ),
        'NGABU3' => array(
            'city'     => 'Abuja',
            'division' => 'Maitama'
        ),
        'NGABU4' => array(
            'city'     => 'Abuja',
            'division' => 'Garki'
        ),
        'NGABU5' => array(
            'city'     => 'Abuja',
            'division' => 'Kubwa'
        ),
        'NGABU6' => array(
            'city'     => 'Abuja',
            'division' => 'Gwarinpa'
        ),
        'NGABU7' => array(
            'city'     => 'Abuja',
            'division' => 'Dawaki'
        ),
        'NGABU8' => array(
            'city'     => 'Abuja',
            'division' => 'Karsana'
        ),
        'NGABU9' => array(
            'city'     => 'Abuja',
            'division' => 'Katampe Extension'
        ),
        'NGABU10' => array(
            'city'     => 'Abuja',
            'division' => 'Bwari'
        ),
        'NGABU11' => array(
            'city'     => 'Abuja',
            'division' => 'Ushafa'
        ),
        'NGABU12' => array(
            'city'     => 'Abuja',
            'division' => 'Idu'
        ),
        'NGABU13' => array(
            'city'     => 'Abuja',
            'division' => 'Apo'
        ),
        'NGABU14' => array(
            'city'     => 'Abuja',
            'division' => 'Asokoro'
        ),
        'NGABU15' => array(
            'city'     => 'Abuja',
            'division' => 'Guzape'
        ),
        'NGABU16' => array(
            'city'     => 'Abuja',
            'division' => 'Jabi'
        ),
        'NGABU17' => array(
            'city'     => 'Abuja',
            'division' => 'Utako'
        ),
        'NGABU18' => array(
            'city'     => 'Abuja',
            'division' => 'Mabushi'
        ),
        'NGABU19' => array(
            'city'     => 'Abuja',
            'division' => 'Wuye'
        ),
        'NGABU20' => array(
            'city'     => 'Abuja',
            'division' => 'Jahi'
        ),
        'NGABU21' => array(
            'city'     => 'Abuja',
            'division' => 'Karu'
        ),
        'NGABU22' => array(
            'city'     => 'Abuja',
            'division' => 'Mararaba'
        ),
        'NGABU23' => array(
            'city'     => 'Abuja',
            'division' => 'Nyanya'
        ),
        'NGABU24' => array(
            'city'     => 'Abuja',
            'division' => 'Airport'
        ),
        'NGABU25' => array(
            'city'     => 'Abuja',
            'division' => 'Kuje'
        ),
        'NGABU26' => array(
            'city'     => 'Abuja',
            'division' => 'Lugbe'
        ),
        'NGABU27' => array(
            'city'     => 'Abuja',
            'division' => 'Kurudu'
        ),
        'NGABU28' => array(
            'city'     => 'Abuja',
            'division' => 'Jikwoyi'
        ),
        'NGABU29' => array(
            'city'     => 'Abuja',
            'division' => 'Orozo'
        ),
        'NGABU30' => array(
            'city'     => 'Abuja',
            'division' => 'Citec'
        ),
        'NGABU31' => array(
            'city'     => 'Abuja',
            'division' => 'Baze'
        ),
        'NGABU32' => array(
            'city'     => 'Abuja',
            'division' => 'Nile'
        ),
        'NGABU33' => array(
            'city'     => 'Abuja',
            'division' => 'Central Area'
        ),
    );

    // Sort the cities and divisions alphabetically
    uasort($nigerian_cities, function($a, $b) {
        $cityComparison = strcmp($a['city'], $b['city']);
        if ($cityComparison !== 0) {
            return $cityComparison;
        }
        return strcmp($a['division'], $b['division']);
    });

    // Initialize the sorted states array
    $sorted_states = array();

    // Loop through the sorted Nigerian cities and add them to the WooCommerce states array
    foreach ($nigerian_cities as $city_code => $city_info) {
        $city_name = $city_info['city'];
        $division_name = $city_info['division'];

        // Create a label with the city and division
        $label = $city_name . ', ' . $division_name;

        // Add the city as a standalone option to the sorted array
        $sorted_states['NG'][$city_code] = $label;
    }

    // Return the sorted states array
    return $sorted_states;
}