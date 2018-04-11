<div id="produtos">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="s-title">Produtos <hr></h1>
			</div>

			<div class="col-12">
				<ul class="produtos">
					<?php
						$args = array(
							'post_type' => 'product',
							'posts_per_page' => -1
							);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) : $loop->the_post();

					?>
						<div>
							<article class="box-produto">
								<a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>">
									<?php the_post_thumbnail( 'produto-thumb', array( 'class' => 'img-fluid' ) ); ?>
								</a>
							</article>
						</div>
					<?php
							endwhile;
						} else {
							echo __( 'Nenhum produto encontrado.' );
						}
						wp_reset_postdata();
					?>
				</ul><!--/.products-->
			</div>



		</div>
	</div>
</div>