<div class="col-sm-3">
  <div class="widget-lojas">
    <h3 class="title">Nossas Lojas</h3>
    <?php
      if( have_rows('empresas', get_option('page_on_front')) ):
      $i=0; while ( have_rows('empresas', get_option('page_on_front')) ) : the_row(); $i++;
      $empresa = ($i == 1) ? 'Ita Malhas' : 'Ita Distribuidora';
      $chegar = ($i == 1) ? 'https://goo.gl/maps/GxN3Wz6ZW6p' : 'https://goo.gl/maps/GxN3Wz6ZW6p';
    ?>
      <div class="filial">
        <p>
          <strong><?php echo $empresa; ?></strong><br/>
          <?php the_sub_field('endereco_info'); ?><br/>
          <span class="mask-phone"><?php the_sub_field('telefone_info'); ?></span><br/>
          <?php the_sub_field('email_info'); ?>
        </p>
        <a href="<?php echo $chegar; ?>" class="btn-chegar" target="_blank">Como chegar</a>
      </div>
    <?php
      endwhile; else :
      endif;
    ?>
  </div>
</div>