<?php
// declarando suporte
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
  add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}

// estilos personalizados
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
  unset( $enqueue_styles['woocommerce-general'] );  // Remove the gloss
  // unset( $enqueue_styles['woocommerce-layout'] );   // Remove the layout
  // unset( $enqueue_styles['woocommerce-smallscreen'] );  // Remove the smallscreen optimisation
  return $enqueue_styles;
}

function wp_enqueue_woocommerce_style(){
  wp_register_style( 'bfriend-woocommerce', get_template_directory_uri() . '/woocommerce/css/woocommerce.css' );
  // wp_register_style( 'bfriend-woocommerce', get_template_directory_uri() . '/woocommerce/css/woocommerce-layout.css' );
  
  if ( class_exists( 'woocommerce' ) ) {
    wp_enqueue_style( 'bfriend-woocommerce' );
  }
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );

// remove actions
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
function woo_hide_page_title() {
	return false;
}


// add subtitle on list products
remove_action( 'woocommerce_shop_loop_item_title', 'subtitle_product', 10);
add_action( 'woocommerce_shop_loop_item_title', 'subtitle_product', 10);

remove_action( 'woocommerce_single_product_summary', 'subtitle_product', 5);
add_action( 'woocommerce_single_product_summary', 'subtitle_product', 5);

if ( ! function_exists( 'subtitle_product' ) ) {
  function subtitle_product() {
    echo woocommerce_get_subtitle();
  } 
}
if ( ! function_exists( 'woocommerce_get_subtitle' ) ) {   
  function woocommerce_get_subtitle() {
    global $post, $woocommerce;

    $subtitle = get_field( 'sub_produto', $post->ID );
    $output = '<p class="subtitle">'.$subtitle.'</p>';

    return $output;
  }
}

// add permalink loop products
remove_action( 'woocommerce_after_shop_loop_item_title', 'view_more_product', 10);
add_action( 'woocommerce_after_shop_loop_item_title', 'view_more_product', 10);
if ( ! function_exists( 'view_more_product' ) ) {
  function view_more_product() {
    echo woocommerce_get_view_more();
  } 
}
if ( ! function_exists( 'woocommerce_get_view_more' ) ) {   
  function woocommerce_get_view_more() {
    global $post, $woocommerce;

    $output = '<a href="'.get_permalink($post->ID).'" class="more">Ver mais</a>';

    return $output;
  }
}

// change sale text
add_filter( 'woocommerce_sale_flash', 'wc_custom_replace_sale_text' );
function wc_custom_replace_sale_text( $html ) {
  return str_replace( __( 'Sale!', 'woocommerce' ), __( 'Ofertas', 'woocommerce' ), $html );
}

