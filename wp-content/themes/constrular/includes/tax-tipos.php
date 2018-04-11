<?php

	/* Taxonmia Tipos */
	/* ----------------------------------------- */
		add_action( 'init', 'register_taxonomy_tipos_de_ambiente' );

		function register_taxonomy_tipos_de_ambiente() {

		    $labels = array(
		        'name' => _x( 'Tipos', 'tipos-de-ambiente' ),
		        'singular_name' => _x( 'Tipo', 'tipos-de-ambiente' ),
		        'search_items' => _x( 'Pesquisar Tipos', 'tipos-de-ambiente' ),
		        'popular_items' => _x( 'Tipos populares', 'tipos-de-ambiente' ),
		        'all_items' => _x( 'Todos os tipos', 'tipos-de-ambiente' ),
		        'parent_item' => _x( 'Parent Tipo', 'tipos-de-ambiente' ),
		        'parent_item_colon' => _x( 'Parent Tipo:', 'tipos-de-ambiente' ),
		        'edit_item' => _x( 'Editar Tipo', 'tipos-de-ambiente' ),
		        'update_item' => _x( 'Atualizar Tipo', 'tipos-de-ambiente' ),
		        'add_new_item' => _x( 'Adicionar novo tipo', 'tipos-de-ambiente' ),
		        'new_item_name' => _x( 'Novo Tipo', 'tipos-de-ambiente' ),
		        'separate_items_with_commas' => _x( 'Separate tipos with commas', 'tipos-de-ambiente' ),
		        'add_or_remove_items' => _x( 'Add or remove tipos', 'tipos-de-ambiente' ),
		        'choose_from_most_used' => _x( 'Choose from the most used tipos', 'tipos-de-ambiente' ),
		        'menu_name' => _x( 'Tipos', 'tipos-de-ambiente' ),
		    );

		    $args = array(
		        'labels' => $labels,
		        'public' => true,
		        'show_in_nav_menus' => true,
		        'show_ui' => true,
		        'show_tagcloud' => true,
		        'show_admin_column' => false,
		        'hierarchical' => true,

		        'rewrite' => true,
		        'query_var' => true
		    );

		    register_taxonomy( 'tipos_de_ambiente', array('ambientes'), $args );
		}
	/* ----------------------------------------- Taxonmia Tipos */
?>