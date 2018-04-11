<?php
/**
 * Template Name: Home
 *
 * A custom page template homepage.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header();
get_template_part('partials/_slideshow'); ?>

	<main id="content" role="main">
		<?php
			get_template_part('partials/_inspire'); 
			get_template_part('partials/_produtos'); 
			get_template_part('partials/_parceiros'); 
			get_template_part('partials/_lojas'); 
		?>
	</main>

<?php
	get_footer();