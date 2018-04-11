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
		<article <?php post_class('page bg-full' ); ?>>
			<header>
				<?php 
					global $wp_query;
					$cat = $wp_query->get_queried_object();
					$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_image_src( $thumbnail_id, 'header-full' )[0];

					echo '<img src="'.$image.'" class="img-fluid h-cat" />';


					if (!is_page(42) && !is_product_category()) {
						the_title( '<h1 class="s-title">', '<hr></h1>' );
					} if (is_product_category()) {
						echo '<h1 class="s-title">'.$current_category = single_cat_title("", false).'<hr></h1>';
						echo '<div class="container"><div class="row"><div class="col-sm-12"><div class="term-description text-center">' . apply_filters( 'the_content', term_description()) . '</div></div></div></div>';
					}
				?>
			</header>

			<div class="container">
				<div class="row">

					<?php
						if (is_product_category()) {
							get_sidebar('produtos');
						}
						
						$class = (is_product_category()) ? "8" : "12";
					?>

					<div class="col-md-<?php echo $class; ?>">
						<div class="woocommerce">
							<?php woocommerce_content(); ?>
						</div>
					</div>


				</div>
			</div>
		</article>
	</main>

<?php
	get_footer();