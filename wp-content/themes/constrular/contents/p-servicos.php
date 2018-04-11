<div id="page-servicos" class="container">
	<div class="row">
		<div class="col-sm-10 mx-auto">
			<?php the_content(); ?>
		</div>

		<div class="col-sm-12">
			<?php 
				if ( have_rows( 'servicos' ) ) :
				$i=1; while ( have_rows( 'servicos' ) ) : the_row(); 
				$class = !($i % 2) ? "flex-row-reverse" : "flex-row";

				$image = get_sub_field( 'img_servico' );
			?>
				<div class="row <?php echo $class; ?> box-servico">
					<div class="col-sm-4">
						<img src="<?php echo $image['sizes']['servico-thumb']; ?>" class="img-fluid" />
					</div>
					<div class="col-sm-8">
						<div class="content">
							<p><strong><?php the_sub_field( 'title_servico' ); ?></strong></p>
							<p><?php the_sub_field( 'desc_servico' ); ?></p>
						</div>
					</div>
				</div>
			<?php 
				$i++; endwhile;
				endif; 
			?>
		</div>
	</div>

</div>