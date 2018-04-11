<?php 
  /**
  * Registers a new post type
  * @uses $wp_post_types Inserts new post type object into the list
  *
  * @param string  Post type key, must not exceed 20 characters
  * @param array|string  See optional args description above.
  * @return object|WP_Error the registered post type object, or an error object
  */
  function cpt_empreendimentos() {
  
    $labels = array(
      'name'                => __( 'Empreendimentos', 'bfriend' ),
      'singular_name'       => __( 'Empreendimento', 'bfriend' ),
      'add_new'             => _x( 'Adicionar novo', 'bfriend', 'bfriend' ),
      'add_new_item'        => __( 'Adicionar novo empreendimento', 'bfriend' ),
      'edit_item'           => __( 'Editar empreendimento', 'bfriend' ),
      'new_item'            => __( 'Novo empreendimento', 'bfriend' ),
      'view_item'           => __( 'Ver empreendimento', 'bfriend' ),
      'search_items'        => __( 'Buscar empreendimentos', 'bfriend' ),
      'not_found'           => __( 'Nenhum empreendimento encontrato', 'bfriend' ),
      'not_found_in_trash'  => __( 'Nenhum empreendimentos encontrado na lixeira', 'bfriend' ),
      'parent_item_colon'   => __( 'Parent empreendimento:', 'bfriend' ),
      'menu_name'           => __( 'Empreendimentos', 'bfriend' ),
    );
  
    $args = array(
      'labels'              => $labels,
      'hierarchical'        => false,
      'description'         => 'description',
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 5,
      'menu_icon'           => 'dashicons-building',
      'show_in_nav_menus'   => true,
      'publicly_queryable'  => true,
      'exclude_from_search' => false,
      'taxonomies'          => array( 'cat_empreendimento' ),
      'has_archive'         => true,
      'query_var'           => true,
      'can_export'          => true,
      'rewrite'             => true,
      'capability_type'     => 'post',
      'supports'            => array(
        'title', 'editor', 'thumbnail',
        // 'excerpt','custom-fields', 'trackbacks', 'comments', 'author', 
        // 'revisions', 'page-attributes', 'post-formats'
        )
    );
  
    register_post_type( 'empreendimento', $args );

    $labels = array(
      'name'              => _x( 'Categorias', 'taxonomy general name' ),
      'singular_name'     => _x( 'Categoria', 'taxonomy singular name' ),
      'search_items'      => __( 'Buscar categoria' ),
      'all_items'         => __( 'Todas categorias' ),
      'parent_item'       => __( 'Parent categoria' ),
      'parent_item_colon' => __( 'Parent categoria:' ),
      'edit_item'         => __( 'Editar categoria' ),
      'update_item'       => __( 'Atualizar categoria' ),
      'add_new_item'      => __( 'Adicionar nova categoria' ),
      'new_item_name'     => __( 'Novo nome de categoria' ),
    );
    
    register_taxonomy('cat_servico',array('empreendimento'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'query_var' => true,
      // 'rewrite' => array( 'slug' => 'servico' ),
    ));
  }
  
  add_action( 'init', 'cpt_empreendimentos' );
    
?>