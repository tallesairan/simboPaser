<div id="parceiros">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="s-title">Marcas parceiras <hr></h1>
			</div>

			<div class="col-12">
				<?php
				$images = get_field( 'parceiros', get_option('page_on_front') );
				if ( $images ) : ?>
				  <div class="parceiros">
				    <?php foreach ( $images as $image ) : ?>
				      <div>
				        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid" />
				      </div>
				    <?php endforeach; ?>
				  </div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>