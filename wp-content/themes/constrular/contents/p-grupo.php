<div id="page-grupo">
	<div class="container">
		<div class="row">

			<div class="col-md-6">
				<?php the_content(); ?>
			</div>

			<div class="col-md-6">
				<?php
					$images = get_field( 'galeria_grupo' );
					if ( $images ) : ?>
				  <div class="galeria">
				    <?php foreach ( $images as $image ) : ?>
				      <div>
				        <a href="<?php echo $image['url']; ?>">
				          <img src="<?php echo $image['sizes']['post-full']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid" />
				        </a>
				      </div>
				    <?php endforeach; ?>
				  </div>
				<?php endif; ?>
			</div>
			
		</div>
	</div>

	<?php if ( have_rows( 'mvv' ) ) : ?>
		<div id="mvv">
			<div class="container">
				<div class="row">
					<?php 
						$i=1; while ( have_rows( 'mvv' ) ) : the_row(); 
						$class =  ($i <= 2) ? "6" : "12 full";
					?>
						<div class="col-sm-<?php echo $class; ?>">
							<div class="box-mvv">
								<figure><img src="<?php the_sub_field( 'ico_mvv' ); ?>" alt="" /></figure>

								<div class="content">
									<p class="title"><?php the_sub_field( 'title_mvv' ); ?></p>
									<div class="entry">
										<?php the_sub_field( 'desc_mvv' ); ?>
									</div>
								</div>
							</div>
						</div>
					<?php $i++; endwhile; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>