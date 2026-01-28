<?php defined('ABSPATH') OR die('This script cannot be accessed directly.');

$misc = us_config('elements_misc');
$conditionalParams = us_config('elements_conditional_options');
$designOptionsParams = us_config('elements_design_options');
$effectOptionsParams = us_config('elements_effect_options');
$hoverOptionsParams = us_config('elements_hover_options');

return [
    'title' => 'Himuon - ' . __('Add To Cart Anywhere', ' himuon-atca'),
    'icon' => 'fas fa-hand-pointer',
    'category' => __('Basic', 'us'),
    'place_if' => class_exists('woocommerce'),
    'params' => us_set_params_weight(
        [
            'product_id' => [
                'title' => __('Product ID', 'himuon-atca'),
                'type' => 'text'
            ],
            'label' => [
                'title' => __('Button Label', 'himuon-atca'),
                'type' => 'text',
                'std' => __('Add To Cart', 'himuon-atca'),
            ],
            'btn_size' => [
                'title' => __('Button Size', 'us'),
                'description' => $misc['desc_font_size'],
                'type' => 'text',
                'std' => '',
                'usb_preview' => [
                    'css' => '--btn-size',
                ],
            ],
            'btn_fullwidth' => [
                'type' => 'switch',
                'switch_text' => __('Stretch to the full width', 'us'),
                'std' => 0,
                'usb_preview' => [
                    'toggle_class' => 'btn_fullwidth',
                ],
            ],
            'qty_btn_style' => [
                'title' => __('Quantity Buttons Style', 'us'),
                'type' => 'select',
                'options' => [
                    '0' => us_translate('Default'),
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ],
                'std' => '0',
                'usb_preview' => [
                    'mod' => 'qty-btn-style',
                ],
            ],
            'qty_btn_size' => [
                'title' => __('Quantity Buttons Size', 'us'),
                'description' => $misc['desc_font_size'],
                'type' => 'text',
                'std' => '1rem',
                'usb_preview' => [
                    'css' => '--qty-btn-size',
                ],
            ],
        ],
        $effectOptionsParams,
        $conditionalParams,
        $designOptionsParams,
        $hoverOptionsParams
    )
];
