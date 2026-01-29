# Himuon – Add to Cart Anywhere (Impreza Extension)

[![Video walkthrough](http://reagandev.com/wp-content/uploads/2026/01/add-to-cart-anywhere-impreza-theme-extension.jpg)](https://www.youtube.com/watch?v=WAlNuwV6fF0)

## Overview
Himuon – Add to Cart Anywhere is a WordPress plugin that adds a custom Impreza/US Builder element for embedding a WooCommerce add-to-cart form anywhere on a page by specifying a product ID. It wires into Impreza’s element registry and template search paths, then renders WooCommerce’s native add-to-cart template with optional quantity button styling and button labeling controls.

## Features
- Adds a **Himuon - Add To Cart Anywhere** element to the Impreza/US Builder “Basic” category.
- Renders WooCommerce’s add-to-cart form for a specific product ID, including pricing output.
- Provides optional label overrides for add-to-cart buttons.
- Supports quantity button styling controls (style and size), plus optional full-width button and size settings

## Requirements
- WordPress 6.9+
- PHP 7.4+
- Impreza/US Builder core (`us-core`)
- WooCommerce

These requirements match the plugin headers and element registration logic.

## Installation
1. Upload the plugin folder to your WordPress `wp-content/plugins/` directory.
2. Ensure **Impreza/US Builder core** and **WooCommerce** are installed and active.
3. Activate **Himuon – Add to Cart Anywhere (Impreza Extension)** from the Plugins page.

## Usage
1. Open the Impreza/US Builder editor.
2. Insert the **Himuon - Add To Cart Anywhere** element.
3. Configure the element settings:
   - **Product ID**: Required. The WooCommerce product ID to display.
   - **Button Label**: Optional override for the add-to-cart button text.
   - **Button Size**: Optional CSS size value for the button.
   - **Stretch to the full width**: Toggle to make the button full width.
   - **Quantity Buttons Style**: Select a style variant (0–3).
   - **Quantity Buttons Size**: Optional CSS size value for quantity buttons.

These settings map to the element configuration and template rendering. 

## Behavior Notes
- If a product ID is missing or invalid, the element shows a preview placeholder in template preview mode and an “Invalid Product” message on the front end. 
- The element uses WooCommerce’s `woocommerce_template_single_add_to_cart()` to ensure compatibility with product types and stock rules. 

## Development Notes
- The plugin registers its element by extending Impreza’s shortcode configuration and grid settings, and adds the `us-addon/` directory to the theme’s template search paths.
- Element configuration lives at `us-addon/config/elements/himuon_add_to_cart.php` and the render template lives at `us-addon/templates/elements/himuon_add_to_cart.php`.
