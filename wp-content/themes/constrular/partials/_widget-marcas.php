<div class="col-sm-3">
  <div class="widget-marcas">
    <ul id="marcas" data-children=".marcas">
      <h3><strong>Marcas</strong></h3>
      <?php
        $taxonomy = 'category';
        $terms = get_terms($taxonomy);
        if ( $terms && !is_wp_error( $terms ) ) :
        $i=0;
        foreach ( $terms as $term ) {
          $open = ($i == 0) ? 'true' : 'false';
          $id = $term->term_id;
      ?>

        <li class="marcas">
          <a data-toggle="collapse" data-parent="#marcas" href="#marca<?php echo $id; ?>" aria-expanded="true" aria-controls="marca<?php echo $id; ?>" class="collapsed"><i class="fa fa-chevron-down" aria-hidden="true"></i> <?php echo $term->name; ?></a>
          <div id="marca<?php echo $id; ?>" class="collapse" role="tabpanel">
            <ul id="produtos" data-children=".produtos">
              <?php
                $produtos = new WP_Query( array( 'post_type' => 'post', 'category_name' => $term->name, 'posts_per_page' => -1 ) );
                while ( $produtos->have_posts() ) : $produtos->the_post();
                $count = uniqid();
                $pesado = get_field('composicao_pesado');

                // não tiver leve ou pesado
                if ($pesado == '') {
              ?>

                <li class="produtos">
                  <a data-toggle="collapse" data-parent="#produtos" href="#marca<?php echo $id; ?>-produto<?php echo $count; ?>" aria-expanded="true" aria-controls="marca<?php echo $id; ?>-produto<?php echo $count; ?>" class="collapsed"><i class="fa fa-angle-double-down" aria-hidden="true"></i> <?php the_title() ?></a>
                  <div id="marca<?php echo $id; ?>-produto<?php echo $count; ?>" class="collapse" role="tabpanel">
                    <ul id="cores" data-children=".cores">
                      <?php
                        if( have_rows('variacoes_cor') ):
                        while( have_rows('variacoes_cor') ): the_row();
                        $cor = get_sub_field('cor');
                        $codigo = strtolower(get_sub_field('codigo_nome'));
                        $link = get_the_permalink() . '?cor='.$codigo;
                      ?>

                        <li class="cores">
                          <a href="<?php echo $link; ?>"><?php echo $codigo; ?></a>
                        </li>

                      <?php endwhile; endif; ?>
                    </ul>
                  </div>
                </li>

              <?php }
                // tem leve e psado
                else {
              ?>

                <li class="produtos">
                  <a data-toggle="collapse" data-parent="#produtos" href="#marca<?php echo $id; ?>-produto<?php echo $count; ?>" aria-expanded="true" aria-controls="marca<?php echo $id; ?>-produto<?php echo $count; ?>" class="collapsed"><i class="fa fa-angle-double-down" aria-hidden="true"></i> <?php the_title() ?></a>
                  <div id="marca<?php echo $id; ?>-produto<?php echo $count; ?>" class="collapse" role="tabpanel">
                    <ul id="composicao" data-children=".composicao">

                      <li class="composicao">
                        <a data-toggle="collapse" data-parent="#composicao" href="#leve" aria-expanded="true" aria-controls="leve" class="collapsed"><i class="fa fa-caret-down" aria-hidden="true"></i> Leve</a>
                        <div id="leve" class="collapse" role="tabpanel">
                          <ul id="cores" data-children=".cores">
                            <?php
                              if( have_rows('variacoes_cor') ):
                              while( have_rows('variacoes_cor') ): the_row();
                              $cor = get_sub_field('cor');
                              $codigo = strtolower(get_sub_field('codigo_nome'));
                              $link = get_the_permalink() . '?tipo=leve&cor='.$codigo;
                            ?>

                              <li class="cores">
                                <a href="<?php echo $link; ?>"><?php echo $codigo; ?></a>
                              </li>

                            <?php endwhile; endif; ?>
                          </ul>
                        </div>
                      </li>

                      <li class="composicao">
                        <a data-toggle="collapse" data-parent="#composicao" href="#pesado" aria-expanded="false" aria-controls="pesado" class="collapsed"><i class="fa fa-caret-down" aria-hidden="true"></i> Pesado</a>
                        <div id="pesado" class="collapse" role="tabpanel">
                          <ul id="cores" data-children=".cores">
                            <?php
                              if( have_rows('variacoes_cor') ):
                              while( have_rows('variacoes_cor') ): the_row();
                              $cor = get_sub_field('cor');
                              $codigo = strtolower(get_sub_field('codigo_nome'));
                              $link = get_the_permalink() . '?tipo=pesado&cor='.$codigo;
                            ?>

                              <li class="cores">
                                <a href="<?php echo $link; ?>"><?php echo $codigo; ?></a>
                              </li>

                            <?php endwhile; endif; ?>
                          </ul>
                        </div>
                      </li>

                    </ul>
                  </div>
                </li>

              <?php } endwhile; wp_reset_postdata(); ?>
            </ul>
          </div>
        </li>

      <?php $i++; } endif; ?>
    </ul>
  </div>
</div>