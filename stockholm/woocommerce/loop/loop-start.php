<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
?>
<?php
    global $qode_options;
    $classes = '';
    if (isset($qode_options['woo_products_list_type']) && $qode_options['woo_products_list_type'] != "") {
        $classes .= $qode_options['woo_products_list_type'];

        if($qode_options['woo_products_list_type'] == 'standard') {
            do_action('qode_shop_standard_initial_setup');
        }

        if($qode_options['woo_products_list_type'] == 'simple') {
            do_action('qode_shop_simple_initial_setup');
        }
    }
?>
<ul class="products clearfix  <?php echo esc_attr($classes); ?>">