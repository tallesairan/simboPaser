<?php

/* WP-LOGIN */
/* ----------------------------------------- */
  // Call wp-login Styles
  add_action( 'login_head', 'wpmidia_custom_login' );
  // Change URL logotype
  add_filter('login_headerurl', 'wpmidia_custom_wp_login_url');
  // Change title logotype
  add_filter('login_headertitle', 'wpmidia_custom_wp_login_title');
  function wpmidia_custom_login() {
      echo '<link media="all" type="text/css" href="'.get_template_directory_uri().'/assets/css/_login-style.css" rel="stylesheet">';
      $logotipoID = get_post_meta(get_option( 'page_on_front' ), 'logotipo', 1);
      if ($logotipoID) {
      ?>
        <style type="text/css" media="screen">
          body.login h1 a {
            background-image: url(<?php echo wp_get_attachment_url($logotipoID); ?>);
            background-size: contain;
            background-position: center center;
          }
        </style>
      <?php
      }
  }
  function wpmidia_custom_wp_login_url() {
    return home_url();
  }
  function wpmidia_custom_wp_login_title() {
    return get_option('blogname');
  }
/* ----------------------------------------- WP-LOGIN */

/* Mudar Icone dos Menus do WP */
/* ----------------------------------------- */
  // Pegar o unicode na url -> http://fontawesome.bootstrapcheatsheets.com/
  // add_action('admin_head', 'fontawesome_icon_dashboard');
  function fontawesome_icon_dashboard() {
     echo "<style type='text/css' media='screen'>
        #adminmenu #menu-posts-produto div.wp-menu-image:before { font-family:'FontAwesome' !important; content:'\\f0a4'; }
     </style>";
  }

/* ----------------------------------------- Mudar Icone do CPT */


/* Desativa as Widgets padrões do Dashboard */
/* ----------------------------------------- */

  function disable_default_dashboard_widgets() {

    remove_meta_box('dashboard_browser_nag', 'dashboard', 'core');
    remove_meta_box('dashboard_right_now', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
    remove_meta_box('dashboard_plugins', 'dashboard', 'core');

    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
    remove_meta_box('dashboard_primary', 'dashboard', 'core');
    remove_meta_box('dashboard_secondary', 'dashboard', 'core');
  }
  add_action('admin_menu', 'disable_default_dashboard_widgets');


/* Carrega Arquivos CSS no Admin */
/* ----------------------------------------- */

  function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/_admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
  }
  add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );


/* Adiciona o ID do usuário no body-class */
/* ----------------------------------------- */
function id_usuario_body_class( $classes ) {
  global $current_user;
    $classes .= ' user-' . $current_user->ID;
  return trim( $classes );
}
add_filter( 'admin_body_class', 'id_usuario_body_class' );


/* Cria página "Opções" para o ACF */
/* ----------------------------------------- */
  $optionsPage = array(

    /* (string) The title displayed on the options page. Required. */
  'page_title' => 'Opções',

  /* (string) The title displayed in the wp-admin sidebar. Defaults to page_title */
  'menu_title' => '',

  /* (string) The slug name to refer to this menu by (should be unique for this menu).
  Defaults to a url friendly version of menu_slug */
  'menu_slug' => '',

  /* (string) The capability required for this menu to be displayed to the user. Defaults to edit_posts.
  Read more about capability here: http://codex.wordpress.org/Roles_and_Capabilities */
  'capability' => 'edit_posts',

  /* (int|string) The position in the menu order this menu should appear.
  WARNING: if two menu items use the same position attribute, one of the items may be overwritten so that only one item displays!
  Risk of conflict can be reduced by using decimal instead of integer values, e.g. '63.3' instead of 63 (must use quotes).
  Defaults to bottom of utility menu items */
  'position' => 9,

  /* (string) The slug of another WP admin page. if set, this will become a child page. */
  'parent_slug' => '',

  /* (string) The icon url for this menu. Defaults to default WordPress gear */
  'icon_url' => false,

  /* (boolean) If set to true, this options page will redirect to the first child page (if a child page exists).
  If set to false, this parent page will appear alongside any child pages. Defaults to true */
  'redirect' => true,

  /* (int|string) The '$post_id' to save/load data to/from. Can be set to a numeric post ID (123), or a string ('user_2').
  Defaults to 'options'. Added in v5.2.7 */
  'post_id' => 'options',

  /* (boolean)  Whether to load the option (values saved from this options page) when WordPress starts up.
  Defaults to false. Added in v5.2.8. */
  'autoload' => false,

  );


  if( function_exists('acf_add_options_page') ) {
    // descomentar para ativar página de opções
    // acf_add_options_page($optionsPage);
  }

/* ----------------------------------------- Cria página "Opções" para o ACF */