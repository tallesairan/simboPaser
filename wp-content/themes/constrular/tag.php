<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>

	<main id="content" role="main">
		<div class="container">
			<div class="row">

				<div class="col-md-8">
					<h1><?php printf( __( 'Tags: %s', 'bfriend' ), '' . single_tag_title( '', false ) . '' ); ?></h1>
					<?php if ( have_posts() ): while( have_posts() ): the_post(); ?>
						<article <?php post_class(); ?>>
							<?php the_title(); ?>
						</article>
					<?php endwhile; else: ?>
						<h2>Nenhum post encontrado.</h2>
					<?php endif; ?>
				</div>

				<?php get_sidebar(); ?>

			</div>
		</div>
	</main>

<?php get_footer(); ?>