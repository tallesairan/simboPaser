<div id="page-construtora" class="container">
	<div class="row">

		<div class="col-md-6">
			<?php the_content(); ?>
		</div>

		<div class="col-md-6">
			<?php
				$images = get_field( 'galeria_construtora' );
				if ( $images ) : 
			?>
			  <div class="galeria">
			    <?php foreach ( $images as $image ) : ?>
			      <div>
			        <a href="<?php echo $image['url']; ?>">
			          <img src="<?php echo $image['sizes']['post-full']; ?>" alt="<?php echo $image['alt']; ?>" />
			        </a>
			      </div>
			    <?php endforeach; ?>
			  </div>
			<?php endif; ?>
		</div>

	</div>

	
	<?php if ( have_rows( 'empreendimentos' ) ) : ?>
		<div class="row">
			<div class="col-12"><h2>Nossos empreendimentos</h2></div>

			<?php 
				while ( have_rows( 'empreendimentos' ) ) : the_row(); 
				$img = get_sub_field( 'img_emp' );
			?>
				<div class="col-sm-4">
					<a href="<?php echo $img['url']; ?>">
						<div class="box-emp">
							<img src="<?php echo $img['sizes']['produto-destaque']; ?>" class="img-fluid" />
							<p><?php the_sub_field( 'title_emp' ); ?></p>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

	<div class="row">
		<div class="col-sm-5 bd-r">
			<?php 
				while ( have_rows('unidades',get_option( 'page_on_front' )) ) : the_row(); 
				$title = get_sub_field( 'title_loja' );
				$tel = get_sub_field( 'telefone_loja' );
			?>
				<div class="box-infos">
					<p class="title"><strong><?php the_sub_field( 'title_loja' ); ?></strong></p>
					<p><strong>End.:</strong> <?php the_sub_field( 'endereco_info' ); ?></p>
					<p><strong>Fone:</strong> <?php echo mascara_string('(##) ####-####',$tel); ?></p>
				</div>
			<?php endwhile; ?>
			<a class="email_info" href="mailto:<?php $email=get_field('email_info',get_option( 'page_on_front' )); echo $email; ?>?subject=Fale Conosco" title="<?php echo __('Fale Conosco', 'angolanos'); ?>"><strong>E-mail:</strong> <?php echo $email; ?></a>
		</div>
		<div class="col-sm-6 ml-auto">
			<?php echo do_shortcode('[contact-form-7 id="8" title="Contato"]'); ?>
		</div>
	</div>
</div>