<div id="lojas" class="container">
	<div class="row">
		<div class="col-12">
			<h1 class="s-title">Nossas Lojas <hr></h1>
		</div>
	</div>

	
	<?php if( have_rows('unidades',get_option( 'page_on_front' )) ): ?>
		<div class="row">
			<?php 
				while ( have_rows('unidades',get_option( 'page_on_front' )) ) : the_row(); 
				$title = get_sub_field( 'title_loja' );
				$img = get_sub_field( 'img_loja' );
				$tel = get_sub_field( 'telefone_loja' );
			?>
				<div class="col-sm-4">
					<a href="<?php echo get_permalink(126); ?>" title="Saiba mais sobre: <?php the_title(); ?>">
						<div class="box-unidade row">
							<img src="<?php echo $img['sizes']['loja-thumb']; ?>" class="img-fluid" />

							<div class="mask">
								<p class="title"><?php the_sub_field( 'title_loja' ); ?></p>
								<p><strong>Fone:</strong> <?php echo mascara_string('(##) ####-####',$tel); ?></p>
								<p><?php echo get_sub_field('endereco_info');?></p>
							</div>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div>
