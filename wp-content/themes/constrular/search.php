<?php
/**
 * The template for displaying Search Results pages.
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
					<article <?php post_class('page category'); ?>>
						<header class="title-page">
							<h1><?php echo $current_category = single_cat_title("", false); ?></h1>
						</header>
						<header class="title-produto">
							<h2><?php the_title(); ?></h2>
						</header>
						<?php if (have_posts()): while (have_posts()) : the_post(); ?>

						<?php endwhile;  else: ?>
							<article><h3><?php _e( 'Desculpe, nenhum post encontrado.', 'bfriend' ); ?></h3></article>
						<?php endif; ?>
					</article>
				</div>

				<?php get_sidebar() ?>

			</div>
		</div>
	</main>

<?php
	get_footer();