<?php
/**
 * Created by PhpStorm.
 * User: Glum
 * Date: 15.12.2018
 * Time: 11:07
 *
 */
function child_theme_setup(){
    load_child_theme_textdomain('tt_localization', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'child_theme_setup');

function tt_scripts(){
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'tt_scripts');

function add_currency_default( $settings ) {
    $updated_setting = array();
    foreach($settings as $setting){
        if(isset( $setting['id'] ) && 'pricing_options' == $setting['id'] &&
            isset( $setting['type'] ) && 'sectionend' == $setting['type']){
            $updated_setting[] = array(
                'title'     => __('The cost of 1 euro in UAH', 'tt_localization'),
                'desc'      => __('Exchange rate 1 euro to UAH', 'tt_localization'),
                'type'      => 'text',
                'id'        => 'wc_price_front',
                'css'       => 'width:50px',
                'desc_tip'  => true,
            );
        }
        $updated_setting[] = $setting;
    }
    return $updated_setting;
}
add_filter( 'woocommerce_general_settings', 'add_currency_default', 20 );

function filter_function_name_6860( $currency_symbol, $currency ){
    $currency_symbol = '&euro;';
    return $currency_symbol;
}
if ( !is_admin() ) {
    add_filter('woocommerce_currency_symbol', 'filter_function_name_6860', 10, 2);
}
function filter_function_name_3941( $number_format, $price, $args_decimals, $args_decimal_separator, $args_thousand_separator ){
    $price /= get_option('wc_price_front', 1);
    $new_format = number_format( $price, $args_decimals, $args_decimal_separator, $args_thousand_separator );
    return $new_format;
}
if ( !is_admin() ) {
    add_filter('formatted_woocommerce_price', 'filter_function_name_3941', 10, 5);
}