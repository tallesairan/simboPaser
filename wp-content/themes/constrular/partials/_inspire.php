<div id="inspire-se">
	<div class="container">
		<div class="row">
			<div class="col-6 ml-auto">
				<h1 class="s-title">Inspire-se <hr><span>Blog</span></h1>
			</div>

			<?php
				$my_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => -1 ) ); 
				if ( $my_query->have_posts() ) :

				echo '<div class="col-12"><div class="inspire">';

				$i=0; while ( $my_query->have_posts() ) : $my_query->the_post();
			?>
				<div>
					<article class="box-inspire row">
						<div class="col-6">
							<?php the_post_thumbnail( 'post-medium', array( 'class' => 'img-fluid' ) ); ?>
						</div>
						<div class="col-6">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>" class="more">Leia mais</a>
						</div>
					</article>
				</div>
			<?php 
				$i++; endwhile; 
				
				echo '</div></div>';

				endif;
				wp_reset_postdata();
			?>


		</div>
	</div>
</div>