<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>

	<main id="content" class="blog" role="main">
		<header>
			<?php 
				if (is_home() || is_single()) {
					$image = get_field( 'img_single' );;

					echo '<img src="'.$image['sizes']['header-full'].'" class="img-fluid" />';

					echo '<h1 class="s-title">Inspire-se<hr></h1>';
				}
			?>
			<div id="subtitle"><p class="text-center"><?php the_field( 'sub_produto', get_option('page_for_posts') ); ?></p></div>
		</header>

		<div class="container">
			<div class="row">

				<div class="col-md-8">
					<?php if (have_posts()): while (have_posts()) : the_post(); ?>
						<article <?php post_class('single'); ?>>
							<header class="title-page">
								<?php the_post_thumbnail( 'post-destaque', array( 'class' => 'img-fluid' ) ); ?>
								<?php the_title( '<h1>', '</h1>' ); ?>
							</header>

							<div class="content">
								<?php the_content(); ?>
							</div>

							<footer>
								<div id="fb-root"></div>
								<script>(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) return;
								  js = d.createElement(s); js.id = id;
								  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11&appId=838759882886952';
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));</script>
								<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="730" data-numposts="5"></div>
							</footer>
						</article>

					<?php endwhile;  else: ?>
						<article><h3><?php _e( 'Desculpe, nenhum post encontrado.', 'angolanos' ); ?></h3></article>
					<?php endif; ?>
				</div>

				<?php get_sidebar() ?>

			</div>
		</div>
	</main>

<?php
	get_footer();