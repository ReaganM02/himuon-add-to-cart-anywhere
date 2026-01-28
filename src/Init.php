<?php

namespace Himuon\ATCA;

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

final class Init
{
    public static function load()
    {
        add_filter('us_config_shortcodes', [self::class, 'registerAddToCart']);
        add_filter('us_files_search_paths', [self::class, 'path']);
        add_filter('us_config_grid-settings', [self::class, 'extendGridSettings']);
    }

    public static function registerAddToCart($config)
    {
        if (empty($config['theme_elements']) || !is_array($config['theme_elements'])) {
            $config['theme_elements'] = [];
        }

        if (!in_array('himuon_add_to_cart', $config['theme_elements'], true)) {
            $config['theme_elements'][] = 'himuon_add_to_cart';
        }

        return $config;
    }

    public static function path($paths)
    {
        $paths[] = HIMUON_ATCA_PATH . 'us-addon/';
        return $paths;
    }

    public static function extendGridSettings($config)
    {
        if (!isset($config['elements']) || !is_array($config['elements'])) {
            $config['elements'] = [];
        }

        if (!in_array('himuon_add_to_cart', $config['elements'], true)) {
            $config['elements'][] = 'himuon_add_to_cart';
        }

        return $config;
    }
}
