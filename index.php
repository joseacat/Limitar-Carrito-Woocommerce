<?php
/**
 * Plugin Name: Limitar carrito
 * Plugin URI: https://www.bisiesto.es
 * Description: Limita el precio mínimo del carrito a 10€
 * Version: 1.0
 * Author: Jose A. Catalán
 * Author URI: https://www.bisiesto.es
 */



 /**
 * Set a minimum order amount for checkout
 */
add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
add_action( 'woocommerce_before_cart' , 'wc_minimum_order_amount' );

function wc_minimum_order_amount() {
	// Set this variable to specify a minimum order value
	$minimum = 10;

	if ( WC()->cart->total < $minimum ) {

		if( is_cart() ) {

			wc_print_notice(
				sprintf( 'Para poder procesar el pedido debe alcanzar los %s' ,
					wc_price( $minimum )
				), 'error'
			);

		} else {

			wc_add_notice(
				sprintf( 'Para poder procesar el pedido debe alcanzar los %s' ,
					wc_price( $minimum )
				), 'error'
			);

		}
	}
}