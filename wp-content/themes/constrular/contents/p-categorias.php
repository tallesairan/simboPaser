<div id="page-categorias" class="container">
	<div class="row">
			<?php

			  $taxonomy     = 'product_cat';
			  $orderby      = 'name';  
			  $show_count   = 0;
			  $pad_counts   = 0;
			  $hierarchical = 1;
			  $title        = '';  
			  $empty        = 0;

			  $args = array(
	        'taxonomy'     => $taxonomy,
	        'orderby'      => $orderby,
	        'show_count'   => $show_count,
	        'pad_counts'   => $pad_counts,
	        'hierarchical' => $hierarchical,
	        'title_li'     => $title,
	        'hide_empty'   => $empty
			  );

				 $all_categories = get_categories( $args );
				 $i=0; foreach ($all_categories as $cat) { $i++;
				 		
				 		$thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
				 		$image = wp_get_attachment_image_src( $thumbnail_id, 'categoria-thumb' )[0];

				    if($cat->category_parent == 0) {
				        $category_id = $cat->term_id;       
				        echo '<div class="col-sm-4"><div class="box-cat box-'.$i.'">';

				        	echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'"><img src="'.$image.'" class="img-fluid" /><span class="mask">'. $cat->name .'</span></a>';

				        echo '</div></div>';
				    }       
				}
			?>
	</div>

</div>