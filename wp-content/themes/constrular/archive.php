<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
					<article <?php post_class('page archive'); ?> >
						<h1>
							<?php if ( is_day() ) : ?>
								<?php printf( __( 'Arquivos do dia: %s', 'twentyten' ), get_the_date() ); ?>
							<?php elseif ( is_month() ) : ?>
								<?php printf( __( 'Arquivos do mês: %s', 'twentyten' ), get_the_date('F Y') ); ?>
							<?php elseif ( is_year() ) : ?>
								<?php printf( __( 'Arquivos do ano: %s', 'twentyten' ), get_the_date('Y') ); ?>
							<?php else : ?>
								<?php _e( 'Arquivos', 'twentyten' ); ?>
							<?php endif; ?>
						</h1>

						<?php if ( have_posts() ): while( have_posts() ): the_post(); ?>
							<article <?php post_class(); ?>>
								<?php the_title(); ?>
							</article>
						<?php endwhile; else: ?>
							<h2>Nenhum post encontrado.</h2>
						<?php endif; ?>
					</article>
				</div>

				<?php get_sidebar(); ?>

			</div>
		</div>
	</main>

<?php get_footer(); ?>