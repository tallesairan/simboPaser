<div id="page-lojas">
	<div class="container">
		<div class="row">

			<div class="col-md-8">
				<?php the_content(); ?>
			</div>

			<div class="col-md-4">
				<?php if( have_rows('unidades',get_option( 'page_on_front' )) ): ?>
					<ul class="thumbs">
						<?php 
							while ( have_rows('unidades',get_option( 'page_on_front' )) ) : the_row(); 
							$img = get_sub_field( 'img_loja' );
						?>
							<li>
								<a href="<?php echo $img['url']; ?>" title="Saiba mais sobre: <?php the_title(); ?>">
									<img src="<?php echo $img['sizes']['loja-thumb']; ?>" class="img-fluid" />
									<span class="mask"></span>
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
			
		</div>
	</div>
</div>