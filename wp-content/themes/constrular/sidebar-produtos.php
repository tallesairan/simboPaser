<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */
if ( is_active_sidebar( 'sidebar-produtos' ) ) :

	echo '<aside id="sidebar" class="loja" class="col-sm-4">';
		dynamic_sidebar( 'sidebar-produtos' );
	echo '</aside><!-- #sidebar col-sm-4 -->';

endif;