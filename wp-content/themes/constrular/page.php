<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>
	<main id="content" role="main">
		<section>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article <?php post_class('page' ); ?>>

					<header>
						<?php 
							the_post_thumbnail( 'header-full', array( 'class' => 'img-fluid' ) ); 

							if (!is_page(42)) {
								the_title( '<h1 class="s-title">', '<hr></h1>' );
							}
						?>
					</header>

					<div class="page-content">
						
						<?php 
							if (is_page(2)): 

								get_template_part('contents/p-grupo');

							elseif (is_page(126)):

								get_template_part('contents/p-lojas');

							elseif (is_page(131)):
								
								get_template_part('contents/p-premiacoes');

							elseif (is_page(141)):
								
								get_template_part('contents/p-construtora');

							elseif (is_page(42)):
								
								get_template_part('contents/p-categorias');

							elseif (is_page(6)):
								
								get_template_part('contents/p-servicos');

							elseif (is_page(46)):
								
								get_template_part('contents/p-clube');

							elseif (is_page(7)):
								
								get_template_part('contents/p-contatos');

							else:

							echo '<div class="container"><div class="row"><div class="col-sm-12">';
								the_content();
							echo '</div></div></div>';

							endif;
						?>
							
					</div>

				</article>
			<?php endwhile; ?>
		</section>
	</main>

<?php
	get_footer();