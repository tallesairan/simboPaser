<?php if( have_rows('unidades',get_option( 'page_on_front' )) ): ?>
	<ul class="phones">
		<?php 
			while ( have_rows('unidades',get_option( 'page_on_front' )) ) : the_row(); 
			$title = get_sub_field( 'title_loja' );

			if ($title == 'Centro de Distribuição') { $title = 'CD'; }
		?>
			<li>
				<a class="telefone_info"  title="Ligue para nós!" href="tel:<?php $televendas = get_sub_field('telefone_loja',get_option( 'page_on_front' )); echo $televendas; ?>">
					<span><?php echo $title; ?>:</span> <?php echo mascara_string('(##) ####-####',$televendas); ?>
				</a>
			</li>
		<?php endwhile; ?>
	</ul>
<?php endif; ?>