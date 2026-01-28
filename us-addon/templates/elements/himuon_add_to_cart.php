<?php
defined('ABSPATH') || die('This script cannot be accessed directly.');

if (!class_exists('WooCommerce')) {
    return;
}

$atts = $atts ?? [];
$classes = $classes ?? '';
$elId = $el_id ?? '';

$productId = isset($atts['product_id']) ? absint(trim($atts['product_id'])) : 0;
$label = isset($atts['label']) ? trim($atts['label']) : '';
$btnFullwidth = !empty($atts['btn_fullwidth']);
$btnSize = isset($atts['btn_size']) ? trim($atts['btn_size']) : '';
$qtyBtnStyle = isset($atts['qty_btn_style']) ? $atts['qty_btn_style'] : '0';
$qtyBtnSize = isset($atts['qty_btn_size']) ? trim($atts['qty_btn_size']) : '';
$showPriceRange = isset($atts['show_range_price']) ? 1 : 0;


global $product;
if ($productId) {
    $product = wc_get_product($productId);
}

if (!$product) {
    if (usb_is_template_preview()) {
        echo '<div class="cart">';
        echo '<div class="quantity">';
        echo '<input type="button" value="-" class="minus" disabled>';
        echo '<input type="number" value="1" class="input-text qty text">';
        echo '<input type="button" value="+" class="plus">';
        echo '</div>';
        $previewLabel = $label !== '' ? $label : us_translate('Add to cart', 'woocommerce');
        echo '<div class="single_add_to_cart_button button alt">' . esc_html($previewLabel) . '</div>';
        echo '</div>';
    } else {
        echo '<div>' . esc_html__('Invalid Product. Please check product ID', 'himuon-atca') . '</div>';
    }
    return;
}

$qtyBtnMinus = '<input type="button" value="-" class="minus" disabled>';
$qtyBtnPlus = '<input type="button" value="+" class="plus">';

$wrapperAtts = [
    'class' => 'w-post-elm add_to_cart',
];

$wrapperAtts['class'] .= ' himuon-add-to-cart-anywhere qty-btn-style_' . $qtyBtnStyle;
$wrapperAtts['class'] .= $classes;

if (!empty($elId)) {
    $wrapperAtts['id'] = $elId;
}

if (usb_is_template_preview()) {
    $wrapperAtts['class'] .= ' woocommerce';
}

$wrapperAtts['style'] = '';
if ($btnFullwidth) {
    $wrapperAtts['class'] .= ' btn_fullwidth himuon-atca-fullwidth';
}
if ($btnSize) {
    $wrapperAtts['style'] .= sprintf('--btn-size:%s;', $btnSize);
}
if ($qtyBtnSize) {
    $wrapperAtts['style'] .= sprintf('--qty-btn-size:%s;', $qtyBtnSize);
}

$GLOBALS['product'] = $product;



echo '<div' . us_implode_atts($wrapperAtts) . '>';
echo '<style>.himuon-add-to-cart-anywhere td, .himuon-add-to-cart-anywhere th {border-color: transparent;}</style>';
echo '<div class="himuon-atca-price">' . wp_kses_post($product->get_price_html()) . '</div>';

// Add control buttons to quantity
$beforeQtyFilter = null;
$afterQtyFilter = null;
if (!$product->is_sold_individually()) {
    $beforeQtyFilter = function () use ($qtyBtnMinus) {
        echo $qtyBtnMinus;
    };
    $afterQtyFilter = function () use ($qtyBtnPlus) {
        echo $qtyBtnPlus;
    };
    add_action('woocommerce_before_quantity_input_field', $beforeQtyFilter);
    add_action('woocommerce_after_quantity_input_field', $afterQtyFilter);
}

if ($label !== '') {
    $singleLabelFilter = function () use ($label) {
        return $label;
    };
    $archiveLabelFilter = function () use ($label) {
        return $label;
    };
    add_filter('woocommerce_product_single_add_to_cart_text', $singleLabelFilter, 99);
    add_filter('woocommerce_product_add_to_cart_text', $archiveLabelFilter, 99);
}

woocommerce_template_single_add_to_cart();

if ($label !== '') {
    remove_filter('woocommerce_product_single_add_to_cart_text', $singleLabelFilter, 99);
    remove_filter('woocommerce_product_add_to_cart_text', $archiveLabelFilter, 99);
}

if ($beforeQtyFilter) {
    remove_action('woocommerce_before_quantity_input_field', $beforeQtyFilter);
}
if ($afterQtyFilter) {
    remove_action('woocommerce_after_quantity_input_field', $afterQtyFilter);
}

echo '</div>';
