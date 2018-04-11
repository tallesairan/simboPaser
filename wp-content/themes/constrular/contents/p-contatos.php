<div id="subtitle" class="contato">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 mx-auto text-center">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<h2 class="s-title">Visite uma de nossas lojas!</h2>
			<?php if( have_rows('unidades',get_option( 'page_on_front' )) ): ?>
					<?php 
						while ( have_rows('unidades',get_option( 'page_on_front' )) ) : the_row(); 
						$title = get_sub_field( 'title_loja' );
						$img = get_sub_field( 'img_loja' );
						$tel = get_sub_field( 'telefone_loja' );
					?>
						<div class="media lojas">
							<img src="<?php echo $img['sizes']['post-thumb']; ?>" class="img-fluid" />

							<div class="media-body">
								<p class="title"><?php the_sub_field( 'title_loja' ); ?></p>
								<p><strong>Fone:</strong> <?php echo mascara_string('(##) ####-####',$tel); ?></p>
								<p><?php echo get_sub_field('endereco_info');?></p>
							</div>
						</div>
					<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<div class="col-sm-5 ml-auto">
			<div class="content-form">
				<h2 class="s-title">Fale Conosco</h2>
				<?php echo do_shortcode('[contact-form-7 id="8" title="Contato"]'); ?>
			</div>
		</div>
	</div>

</div>