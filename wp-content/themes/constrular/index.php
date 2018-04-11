<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>

	<main id="content" class="blog" role="main">
		<header>
			<?php 
				if (is_home()) {
					$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'header-full');
					$image = $img[0];

					echo '<img src="'.$image.'" class="img-fluid" />';

					echo '<h1 class="s-title">Inspire-se<hr></h1>';
				}
			?>
			<div id="subtitle"><p class="text-center"><?php the_field( 'sub_produto', get_option('page_for_posts') ); ?></p></div>
		</header>

		<div class="container">
			<div class="row">

				<div class="col-sm-8">
					<div class="row">
						<?php
							$my_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 4 ) ); 
							if ( $my_query->have_posts() ) :
							while ( $my_query->have_posts() ) : $my_query->the_post();
						?>
							<div class="col-sm-6">
								<article class="box-post">
									<a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>">
										<?php the_post_thumbnail( 'post-thumb', array( 'class' => 'img-fluid' ) ); ?>
									</a>
									<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
									<p><?php echo excerpt(20); ?></p>
									<a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>" class="more">Leia mais</a>
								</article>
							</div>
						<?php 
							endwhile; 
							if (function_exists('wp_pagenavi')) { 
								echo '<div class="clearfix"></div><div class="col-12">';
									wp_pagenavi();
								echo '</div>';
							};
							endif;
							wp_reset_postdata();
						?>
					</div>
				</div>

				<?php get_sidebar(); ?>
			</div>
		</div>
	</main>

<?php
	get_footer();