<!-- banner -->
<?php if( have_rows('slider_principal',get_option( 'page_on_front' )) ): ?>
  <article id="slideshow" role="banner">
    <div class="banner">
      <?php
        while ( have_rows('slider_principal',get_option( 'page_on_front' )) ) : the_row();
        $image = get_sub_field('imagem_slider');
        $url = $image['url'];
        $size = 'slider-destaque';
        $thumb = $image['sizes'][ $size ];
      ?>
        <div>
          <div class="banner-mask">
            <?php
              if( get_sub_field('titulo_slider') ):
                echo '<h4>' . the_sub_field('titulo_slider') . '</h4>';
              endif;
              if( get_sub_field('descricao_slider') ):
                echo '<p>' . the_sub_field('descricao_slider') . '</p>';
              endif;
              if( get_sub_field('link_slider') ):
                echo '<a href="' . the_sub_field('link_slider') . '">Leia mais...</a>';
              endif;
            ?>
          </div>
          <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="img-fluid" />
        </div>
      <?php endwhile; ?>
    </div>
  </article>
<?php endif; ?>
<!-- banner end -->