<?php
/*
 * selectors
 * product
 *      .evidence-item
 *          price .price-label
 */

ini_set('memory_limit','400000M');

include 'app.php';

$posts = get_posts([
    'post_type'=>'product',
    'posts_per_page'=>221231231313,
//    'product_cat'=>'smartphones',
//    'tax_query' => array(
//        'taxonomy' => 'product_cat',
//        'field'    => 'id',
//        'term'     =>  59
//    )
]);
foreach ($posts as $post) {
    $price = get_post_meta($post->ID,'_price');
//    $terms = get_the_terms($post->ID,'product_cat');
//    if($terms[0]->slug == 'apple'){
//        echo 'iphones continuando';
//       // continue;
//    }
//    if($terms[1]->slug == 'motorola'){
//        echo 'zenfone continuando';
//        continue;
//    }
//    if($terms[1]->slug == 'samsung'){
//        echo 'zenfone continuando';
//        continue;
//    }
//    if($terms[1]->slug == 'lg'){
//        echo 'zenfone continuando';
//        continue;
//    }
//    if($terms[1]->slug == 'sony'){
//        echo 'zenfone continuando';
//        continue;
//    }
//    if($terms[0]->slug == 'motorola'){
//        echo 'zenfone continuando';
//        continue;
//    }
//    if($terms[0]->slug == 'lg'){
//        echo 'zenfone continuando';
//        continue;
//    }
//    if($terms[0]->slug == 'sony'){
//        echo 'zenfone continuando';
//        continue;
//    }
//    if($terms[0]->slug == 'samsung'){
//        echo 'zenfone continuando';
//        continue;
//    }
//    if($terms[0]->slug == 'lenovo'){
//        echo 'zenfone continuando';
//        continue;
//    }
//    if($terms[1]->slug == 'lenovo'){
//        echo 'zenfone continuando';
//        continue;
//    }
//    if($terms[0]->slug == 'asus'){
//        echo 'zenfone continuando';
//        continue;
//    }
//    if($terms[1]->slug == 'asus'){
//        echo 'zenfone continuando';
//        continue;
//    }
    echo 'Produto atual: '.$post->post_title."\n";
    //echo 'Categoria Primária: '.$terms[0]->name."\n";
    //$dados = explode(' ',$post->post_title);
    echo 'Preco atual: '.$price[0]."\n";
    //print_r($terms);
    $newPrice = $price[0] + ($price[0] / 100) * 18;    
// $newPrice = ($price[0] * (30 / 100));
    //$modelo = $dados[0]." ".$dados[1];
    //createOrSetCategory($modelo,$post->ID);
   // update_post_meta($post->ID, '_price', $newPrice );
    ///echo 'Modelo: '.$modelo."\n";
    //echo 'Product Cat: '.$post->product_cat."\n";
    echo 'Novo preco: '.$newPrice."\n";
    echo 'Preco em post: '.$post->ID." atualizado com sucesso ! \n";
    echo '-------------------------------------'."\n";
}
