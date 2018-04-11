<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */
?>

	<footer id="footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<h3>Formas de Pagamento</h3>
					<img src="<?php images_url('formas-pagamento.png') ?>" class="img-fluid" />
				</div>

				<div class="col-sm-6 col-md-3">
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11&appId=838759882886952';
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>

					<div class="fb-page" data-href="https://www.facebook.com/lojasconstrular" data-width="255" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/lojasconstrular" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/lojasconstrular">Constrular Materiais Para Construção</a></blockquote></div>
				</div>

				<div class="col-sm-6 col-md-3">
					<h3>Instagram</h3>
					
				</div>

				<div class="col-sm-6 col-md-3">
					<h3>Horário de funcionamento</h3>
					<p class="funcionamento"><?php the_field( 'funcionamento_info', get_option('page_on_front') ); ?></p>
				</div>
			</div>
		</div>

		<div id="copy">
			<div class="container">
				<div class="row">
					<div class="col-8 ml-auto">
						<p>© Copyright <?php echo date('Y') ?> - <?php bloginfo('name'); ?> <?php bloginfo('description'); ?> - Todos direitos reservados</p>
					</div>

					<div class="col-2">
						<a href="http://www.casainterativa.net" target="_blank"><span>Desenvolvido:</span> <img src="<?php images_url('casa-interativa.png'); ?>" alt="Casa Interativa - Gestão Digital" /></a>
					</div>
				</div>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>
</body>
</html>