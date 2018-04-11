<?php
/*
 */
use Simbo\Paser;
ini_set('memory_limit','400000M');
include 'app.php';
$url = new Paser('http://xml.simbo.com.br/2196/b8d87201-b18a-4522-9886-8d004f941bf0.xml');
$products = array();
/*
 * Array
 */
foreach ($url->all() as $key => $product) {
    $fkj = array();
    $metas = array();


    $metas['field_5963d6a5c9e0d']=$product['Ref']; // referencia
    $fkj['post_content']=$product['Info'];
    $fkj['post_terms']['tipoimovel'][]=$product['Type']; //
    $fkj['post_terms']['tipoimovel'][]=$product['SubType']; //
    if(!empty($fkj['post_terms']['tipoimovel'][1])){$tpb = explode('/',$fkj['post_terms']['tipoimovel'][1]);if(count($tpb) > 1){$fkj['post_terms']['tipoimovel'][1] = $tpb[0];} else{$fkj['post_terms']['tipoimovel'][1] = $tpb[1];}}
    $fkj['post_terms']['cidadeimovel']=$product['Location']['City']; //
    $metas['field_59663f5002c77']=$product['Location']['Neighborhood']; // setor
    $metas['field_5963d42cc15cf']=$product['Location']['Address'].' - '.$product['Location']['Number'].' - '.$product['Location']['PostalCode']; // endereco imovel
    $metas['field_59e0d2b9b4396']=(isset($product['TotalArea'])) ? $product['TotalArea'] : '';
    $metas['field_5963d604c15d4']=$product['UtilArea'];
    $metas['field_5963d5d6c15d2']=(isset($product['Rooms'])) ? $product['Rooms'] : '';
    $metas['field_5963d5e7c15d3']=(isset($product['Parking'])) ? $product['Parking'] : '';
    $metas['field_5963dd0c1d369'] = array(
        'address' => $metas['field_5963d42cc15cf'].' - '.$metas['field_59663f5002c77'],
        'lat'=>$product['Location']['Latitude'],
        'lng'=>$product['Location']['Longitude']
    );
    foreach($product['Media']['MediaItem'] as $mediaK => $media){
        $fkj['images'][] = $media;
    }
    if($product['AvailableToRent']){
        $metas['field_5963d5bcc15d0'] = $product['RentPrice'];
        if(isset($product['CondominiumPrice'])){
            $metas['field_5963d5c8c15d1']=$product['CondominiumPrice'];
        }
        $fkj['post_category']='Aluguel';

    }
    else{
        $metas['field_5966205091aa4'] = $product['SellPrice'];
        $fkj['post_category']='Venda';


    }
    $fkj['post_title'] = $fkj['post_terms']['tipoimovel'][0].' - '.$metas['field_59663f5002c77'];

    $fkj['metas'] = $metas;

    $products[] = $fkj;
    unset($product);

}
/*
 *
 */
foreach ($products as $product) {
#$postExist = checkPostRef($product['metas']['field_5963d6a5c9e0d']);
$postExist = false;
if($postExist){
    /// atualiza post
}
else{
    // cria novo

    print_r($product);
}
}
die();
/*
foreach ($products as $product) {
    if(!wp_exist_post_by_title($product['post_title'])) {
        syslog(LOG_DEBUG,"Produto ".$product['post_title']." Nao existe \n");

        $productGrabbed = file_get_html($product['post_url']);
    $productHtml = $productGrabbed->outertext;
    $article = $product;
    $article['post_image'] = expstr($productHtml,'"imageUrl": "','"');

    $article['content'] = $productGrabbed->find('div.description__container-text',0)->innertext;
    $thumbsContainer = $productGrabbed->find('ul.showcase-product__container-thumbs',0);
    $thumbs = array();
        if (strpos($productHtml, 'não disponível') == false) {
try{
    foreach (@$thumbsContainer->find('li') as $thumbItem) {
        $thumbsarray(=str_replace('88x66','1299x1299',$thumbItem->find('img',0)->src);
    }
}
catch (Exception $exception){
    $thumbs = array();
}




    $article['thumbs']=array_filter($thumbs, function($value) { return $value !== ''; });
    unset($thumbs);
    sleep(4);
    insertProduct($article);

        }

        unset($article);

    }
}

?>

*/