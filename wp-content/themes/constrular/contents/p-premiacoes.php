<div id="page-premiacoes">
	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<?php the_content(); ?>
			</div>

			<?php 
				if ( have_rows( 'premiacoes' ) ) :
				while ( have_rows( 'premiacoes' ) ) : the_row(); 
					$img = get_sub_field( 'img_prem' );
			?>

				<div class="col-sm-4 mb-5">
					<img src="<?php echo $img['sizes']['produto-destaque']; ?>" class="img-fluid" />
					<p class="text-center mt-4"><?php the_sub_field( 'nome_prem' ); ?></p>
				</div>

			<?php
				endwhile;
				endif; 
			?>
		</div>
	</div>
</div>