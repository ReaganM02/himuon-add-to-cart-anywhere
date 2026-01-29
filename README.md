# Himuon – Add to Cart Anywhere (Impreza Extension)

[![Video walkthrough](https://img.youtube.com/vi/WAlNuwV6fF0/0.jpg)](https://www.youtube.com/watch?v=WAlNuwV6fF0)

## Overview
Himuon – Add to Cart Anywhere is a WordPress plugin that adds a custom Impreza/US Builder element for embedding a WooCommerce add-to-cart form anywhere on a page by specifying a product ID. It wires into Impreza’s element registry and template search paths, then renders WooCommerce’s native add-to-cart template with optional quantity button styling and button labeling controls. 【F:himuon-add-to-cart-anywhere.php†L1-L26】【F:src/Init.php†L11-L49】【F:us-addon/config/elements/himuon_add_to_cart.php†L1-L66】【F:us-addon/templates/elements/himuon_add_to_cart.php†L1-L117】

## Features
- Adds a **Himuon - Add To Cart Anywhere** element to the Impreza/US Builder “Basic” category. 【F:us-addon/config/elements/himuon_add_to_cart.php†L10-L14】
- Renders WooCommerce’s add-to-cart form for a specific product ID, including pricing output. 【F:us-addon/templates/elements/himuon_add_to_cart.php†L12-L83】【F:us-addon/templates/elements/himuon_add_to_cart.php†L90-L117】
- Provides optional label overrides for add-to-cart buttons. 【F:us-addon/templates/elements/himuon_add_to_cart.php†L71-L109】
- Supports quantity button styling controls (style and size), plus optional full-width button and size settings. 【F:us-addon/config/elements/himuon_add_to_cart.php†L24-L66】【F:us-addon/templates/elements/himuon_add_to_cart.php†L15-L62】

## Requirements
- WordPress 6.9+
- PHP 7.4+
- Impreza/US Builder core (`us-core`)
- WooCommerce

These requirements match the plugin headers and element registration logic. 【F:himuon-add-to-cart-anywhere.php†L6-L19】【F:us-addon/config/elements/himuon_add_to_cart.php†L14-L16】

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

These settings map to the element configuration and template rendering. 【F:us-addon/config/elements/himuon_add_to_cart.php†L12-L66】【F:us-addon/templates/elements/himuon_add_to_cart.php†L12-L62】

## Behavior Notes
- If a product ID is missing or invalid, the element shows a preview placeholder in template preview mode and an “Invalid Product” message on the front end. 【F:us-addon/templates/elements/himuon_add_to_cart.php†L26-L42】
- The element uses WooCommerce’s `woocommerce_template_single_add_to_cart()` to ensure compatibility with product types and stock rules. 【F:us-addon/templates/elements/himuon_add_to_cart.php†L104-L105】

## Development Notes
- The plugin registers its element by extending Impreza’s shortcode configuration and grid settings, and adds the `us-addon/` directory to the theme’s template search paths. 【F:src/Init.php†L13-L49】
- Element configuration lives at `us-addon/config/elements/himuon_add_to_cart.php` and the render template lives at `us-addon/templates/elements/himuon_add_to_cart.php`. 【F:us-addon/config/elements/himuon_add_to_cart.php†L1-L66】【F:us-addon/templates/elements/himuon_add_to_cart.php†L1-L117】
