<?php
openlog("bot", LOG_PID | LOG_PERROR, LOG_LOCAL0);
ini_set('default_socket_timeout',400000);
ini_set('max_execution_time',400000);

set_time_limit(0);
setlocale(LC_ALL, 'pt_BR.UTF8');
ini_set('display_errors',1);
ini_set('log_erros',true);
ini_set('error_log','bot.log');
include 'vendor/autoload.php';
include 'Paser.php';
include 'simpleHtmlPaser.php';
define('WP_USE_THEMES', false);
use Cocur\Slugify\Slugify;

function url_slug($string) {
    $slugify = new Slugify();
    $slugify->addRule('ç', 'c');
    return $slugify->slugify($string);
}

#require( 'wp-blog-header.php' );

function simpleCachedCurl($url, $expires, $debug = false) {
    if ($debug) {
        echo "simpleCachedCurl debug:<br>";
    }
    $hash = md5($url);
    $filename = dirname(__FILE__) . '/cache/' . $hash . '.cache';
    $changed = file_exists($filename) ? filemtime($filename) : 0;
    $now = time();
    $diff = $now - $changed;
    if (!$changed || ($diff > $expires)) {
        if ($debug) {
            echo "no cache or expired --> make new request<br>";
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        #curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_ENCODING, "utf-8" );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Connection: Keep-Alive',
            'Keep-Alive: 300'
        ));
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5000000000 );
        curl_setopt( $ch, CURLOPT_TIMEOUT, 5000000 );
        curl_setopt( $ch, CURLOPT_MAXREDIRS, 1000 );
        $rawData = curl_exec($ch);
        curl_close($ch);
        if (!$rawData) {
            if ($debug) {
                echo "cURL request failed<br>";
            }
            if ($changed) {
                if ($debug) {
                    echo "at least we have an expired cache --> better than nothing --> read it<br>";
                }
                $cache = unserialize(file_get_contents($filename));
                return $cache;
            } else {
                if ($debug) {
                    echo "request failed and we have no cache at all --> FAIL<br>";
                }
                return false;
            }
        }
        if ($debug) {
            echo "we got a return --> save it to cache<br>";
        }
        $cache = fopen($filename, 'wb');
        $write = fwrite($cache, serialize($rawData));
        if ($debug && !$write) {
            echo "writing to $filename failed. Make the folder '" . dirname(__FILE__) . '/cache/' . "' is writeable (chmod 777)<br>";
        }
        fclose($cache);
        return $rawData;
    }
    if ($debug) {
        echo "yay we hit the cache --> read it<br>";
    }
    $cache = unserialize(file_get_contents($filename));
    return $cache;
}

function expstr($content, $start, $end) {
    if ($content && $start && $end) {
        $r = explode($start, $content);
        if (isset($r[1])) {
            $r = explode($end, $r[1]);
            return $r[0];
        }

        return '';
    }
}

function wp_exist_post_by_title( $title ) {
    global $wpdb;
    $return = $wpdb->get_row( "SELECT id  FROM `$wpdb->posts` WHERE `post_title` LIKE '%".$title."%'", 'ARRAY_N' );
    if( empty( $return ) ) {
        return false;
    } else {
        return true;
    }
}


/**
 * @param $ref
 * @return int
 */
function checkPostRef($ref) {
    global $wpdb;
    $query = "SELECT ID FROM $wpdb->posts WHERE meta_key = 'referencia'";
    $args = array();
    $query .= ' AND meta_value = %s';
    $args[] = $ref;
    if ( !empty ( $args ) )
        return (int) $wpdb->get_var( $wpdb->prepare($query, $args) );

    return 0;
}
function post_exists($title, $content = '', $date = '') {
    global $wpdb;

    $post_title = wp_unslash( sanitize_post_field( 'post_title', $title, 0, 'db' ) );
    $post_content = wp_unslash( sanitize_post_field( 'post_content', $content, 0, 'db' ) );
    $post_date = wp_unslash( sanitize_post_field( 'post_date', $date, 0, 'db' ) );

    $query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
    $args = array();

    if ( !empty ( $date ) ) {
        $query .= ' AND post_date = %s';
        $args[] = $post_date;
    }

    if ( !empty ( $title ) ) {
        $query .= ' AND post_title = %s';
        $args[] = $post_title;
    }

    if ( !empty ( $content ) ) {
        $query .= ' AND post_content = %s';
        $args[] = $post_content;
    }

    if ( !empty ( $args ) )
        return (int) $wpdb->get_var( $wpdb->prepare($query, $args) );

    return 0;
}


function CustomProxy($retorno = '') {

    $items = array(
        '185.101.68.161:8085',
        '46.161.60.138:8085',
        '91.198.127.15:8085',
        '178.57.65.24:8085',
        '5.8.37.108:8085',
        '95.181.183.178:8085',
        '146.185.201.202:8085',
        '178.57.65.32:8085',
        '146.185.200.211:8085',
        '91.198.127.11:8085',
        '46.161.60.199:8085',
        '188.68.1.171:8085',
        '178.57.65.42:8085',
        '178.57.65.58:8085',
        '46.161.59.223:8085',
        '46.161.60.223:8085',
        '185.101.71.160:8085',
        '146.185.200.155:8085',
        '46.161.60.150:8085',
        '5.62.155.215:8085',
        '146.185.201.165:8085',
        '185.101.71.192:8085',
        '37.9.47.236:8085',
        '5.62.157.231:8085',
        '46.161.60.170:8085',
        '185.13.32.203:8085',
        '46.161.60.193:8085',
        '46.161.60.147:8085',
        '95.181.183.189:8085',
        '146.185.200.134:8085',
        '178.57.68.12:8085',
        '5.8.37.104:8085',
        '79.133.107.26:8085',
        '146.185.202.236:8085',
        '178.57.68.28:8085',
        '146.185.200.180:8085',
        '91.198.127.48:8085',
        '178.57.68.71:8085',
        '146.185.202.147:8085',
        '5.62.154.207:8085',
        '146.185.203.159:8085',
        '37.9.40.211:8085',
        '185.101.69.237:8085',
        '146.185.201.214:8085',
        '146.185.202.165:8085',
        '146.185.202.183:8085',
        '91.204.15.215:8085',
        '37.9.41.232:8085',
        '146.185.201.173:8085',
        '95.181.183.150:8085',
        '146.185.200.247:8085',
        '146.185.202.161:8085',
        '46.161.59.178:8085',
        '185.13.32.200:8085',
        '146.185.200.217:8085',
        '79.133.107.57:8085',
        '146.185.202.200:8085',
        '185.13.32.193:8085',
        '185.13.32.213:8085',
        '185.89.101.211:8085',
        '178.57.65.46:8085',
        '146.185.200.160:8085',
        '146.185.202.237:8085',
        '79.133.106.187:8085',
        '185.14.194.213:8085',
        '79.133.107.68:8085',
        '79.133.107.18:8085',
        '93.179.91.214:8085',
        '188.68.1.140:8085',
        '146.185.201.245:8085'

    );
    if ($items[array_rand($items)] == $retorno) {
        shuffle($items);
        return $items[array_rand($items)];
    } else {
        return $items[array_rand($items)];
    }
}


function file_get_contents_retry($url, $attemptsRemaining=106) {


    // $proxy = CustomProxy();
    $agent = 'Mozilla/5.0 (Linux; U; Android 4.0; en-us; GT-I9300 Build/IMM76D)';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    // curl_setopt($ch, CURLOPT_PROXY, $proxy);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $content = curl_exec($ch);
    curl_close($ch);
    $attemptsRemaining--;
    if( empty($content) && $attemptsRemaining > 0 ) {
        return file_get_contents_retry($url, $attemptsRemaining);
    }
    if($attemptsRemaining === 0 and empty($content)) {
        return 0;
    }

    return $content;

}

function get_http_response_code($theURL) {
    $headers = get_headers($theURL);
    return substr($headers[0], 9, 3);
}

function filterTitle($title){
    $find = [];
    $replace = [];
    return html_entity_decode(str_replace($find,$replace,$title), ENT_QUOTES, 'UTF-8');
}
function raw_json_encode($input, $flags = 0) {
    $fails = implode('|', array_filter(array(
        '\\\\',
        $flags & JSON_HEX_TAG ? 'u003[CE]' : '',
        $flags & JSON_HEX_AMP ? 'u0026' : '',
        $flags & JSON_HEX_APOS ? 'u0027' : '',
        $flags & JSON_HEX_QUOT ? 'u0022' : '',
    )));
    $pattern = "/\\\\(?:(?:$fails)(*SKIP)(*FAIL)|u([0-9a-fA-F]{4}))/";
    $callback = function ($m) {
        return html_entity_decode("&#x$m[1];", ENT_QUOTES, 'UTF-8');
    };
    return preg_replace_callback($pattern, $callback, $input);
}

// @param array[] $attributes - This needs to be an array containing ALL your attributes so it can insert them in one go
function wcproduct_set_attributes($post_id, $attributes) {
    $i = 0;
    // Loop through the attributes array
    foreach ($attributes as $name => $value) {
        $product_attributes[$i] = array (
            'name' => htmlspecialchars( stripslashes( $name ) ), // set attribute name
            'value' => $value, // set attribute value
            'position' => 1,
            'is_visible' => 1,
            'is_variation' => 1,
            'is_taxonomy' => 0
        );

        $i++;
    }

    // Now update the post with its new attributes
    return ['status'=>update_post_meta($post_id, '_product_attributes', $product_attributes),'data'=>$product_attributes];
}
function insertImage($image_url,$post_id){

    $upload_dir = wp_upload_dir();
    $userAgent = array('http' => array('user_agent' => 'Mozilla/5.0 (Linux; U; Android 4.0; en-us; GT-I9300 Build/IMM76D)'));
    @$image_data = file_get_contents($image_url, false, stream_context_create($userAgent));
    if($image_data){
        syslog(LOG_DEBUG,"Imagem baixada");
    }
    $filename = basename(md5($image_url).'.jpg');

    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
    if (file_exists($file)) { unlink ($file);  syslog(LOG_DEBUG,"Imagem anterior Deletada \n");
    }
    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    wp_update_attachment_metadata( $attach_id, $attach_data );

    return $attach_id;
     }

function setDefaultImage($image_url,$post_id){

                $upload_dir = wp_upload_dir();
                $userAgent = array('http' => array('user_agent' => 'Mozilla/5.0 (Linux; U; Android 4.0; en-us; GT-I9300 Build/IMM76D)'));
                @$image_data = file_get_contents($image_url, false, stream_context_create($userAgent));
                if($image_data){
                    syslog(LOG_DEBUG,"Imagem baixada");
                }
                $filename = basename(md5($image_url).'.jpg');

                if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
                else                                    $file = $upload_dir['basedir'] . '/' . $filename;
                if (file_exists($file)) { unlink ($file);  syslog(LOG_DEBUG,"Imagem anterior Deletada \n");
                }
                file_put_contents($file, $image_data);

                $wp_filetype = wp_check_filetype($filename, null );
                $attachment = array(
                    'post_mime_type' => $wp_filetype['type'],
                    'post_title' => sanitize_file_name($filename),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

                if(set_post_thumbnail( $post_id, $attach_id ) and wp_update_attachment_metadata( $attach_id, $attach_data )){
                    syslog(LOG_DEBUG,"Imagem destacada em Imovel id: ".$post_id." setada \n");
                }

}

function insertImages($images,$post_id){
    $ids = array();
    foreach ($images as $image) {
        $ids[]=  insertImage($image,$post_id);
    }
    return $ids;
    #return implode(',',$ids);
}
function insertTerms($meta,$post_id){
    $tms = [];
    foreach ($meta as $metak => $mt){
        $tms[] = createOrSetCategory($mt,$post_id,$metak);
    }
    return $tms;
}
function createOrSetCategory($category,$post_id,$tax='post_category'){
    //get the category to check if exists
    $cat  = get_term_by('name', $category , $tax);
    //check existence
    if($cat == false){
        //cateogry not exist create it
        $cat = wp_insert_term($category, $tax);
        //category id of inserted cat
        $cat_id = $cat['term_id'] ;
    }else{
        //category already exists let's get it's id
        $cat_id = $cat->term_id ;
    }
        //setting post category
        return wp_set_post_terms($post_id,array($cat_id),$tax ,1);
}
function insertMetas($metas,$post_id){
    $tmp = array();
    foreach ($metas as $mk => $meta) {
        $tmp[$mk] = update_field( $mk, $meta, $post_id );
    }
    return $tmp;
}
/*
 *          [metas] => Array
        (
            [field_5963d6a5c9e0d] => 784417
            [field_59663f5002c77] => Setor Nova Suiça
            [field_5963d42cc15cf] => Avenida C 255 - 400 - 74280010
            [field_59e0d2b9b4396] => 33.82
            [field_5963d604c15d4] => 33.82
            [field_5963d5d6c15d2] =>
            [field_5963d5e7c15d3] => 1
            [field_5963dd0c1d369] => Array
                (
                    [address] => Avenida C 255 - 400 - 74280010 - Setor Nova Suiça
                    [lat] => -16.716707
                    [lng] => -49.274519
                )

            [images] => Array
                (
                    [0] => http://p9sp.pics.simbo.com.br/2196/59/059/493059/600-07c66c62-5153-4240-a19f-66564bd2d42a.jpg

                )

            [field_5963d5bcc15d0] =>
            [field_5963d5c8c15d1] => 280
        )

    [post_content] => Array
    [ctimovel] => Aluguel
    [post_title] => Comercial - Setor Nova Suiça
    [post_terms] => Array(
            [tipoimovel] => Array ([0] => Comercial)
            [cidadeimovel] => Goiânia
        )


)


 */
/**
 * @param $item
 */
function insertImovel($item){
        syslog(LOG_DEBUG,"Iniciando em ".$item['post_title']." Nao existe \n");
        remove_filter('content_save_pre', 'wp_filter_post_kses');
        remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');
        $post_id = wp_insert_post( array(
            'post_author' => 1,
            'post_title' => $item['post_title'],
            'post_content' => $item['post_content'],

            'post_status' => 'publish',
            'post_type' => "imovel",
        ) );
        add_filter('content_save_pre', 'wp_filter_post_kses');
        add_filter('content_filtered_save_pre', 'wp_filter_post_kses');

        if(createOrSetCategory($item['post_category'],$post_id,'ctimovel')){
            syslog(LOG_DEBUG,"Categoria ".$item['post_brand']." setada");

        }
        $firstImage = @array_pop(array_reverse($product['metas']['images']));

    setDefaultImage(str_replace('{w}x{h}','700x700',$item['post_image']),$post_id);

        wp_set_object_terms( $post_id, 'simple', 'product_type' );
        update_post_meta( $post_id, '_visibility', 'visible' );
        update_post_meta( $post_id, '_wc_rating_count', '5' );
        update_post_meta( $post_id, '_stock_status', 'instock');
        update_post_meta( $post_id, 'total_sales', '0' );
        update_post_meta( $post_id, '_downloadable', 'no' );
        update_post_meta( $post_id, '_virtual', 'no' );
        update_post_meta( $post_id, '_regular_price', '' );
        update_post_meta( $post_id, '_sale_price', '' );
        update_post_meta( $post_id, '_purchase_note', 'Pagamento via Deposito / Transferencia 10% de desconto' );
        update_post_meta( $post_id, '_featured', 'no' );
        update_post_meta( $post_id, '_weight',  1.9 );
        update_post_meta( $post_id, '_length', '' );
        update_post_meta( $post_id, '_width','' );
        update_post_meta( $post_id, '_height', '' );
        update_post_meta( $post_id, '_sku', uniqid() );
        update_post_meta( $post_id, '_product_attributes', array() );
        update_post_meta( $post_id, '_product_image_gallery', insertImages($item['thumbs'],$post_id));
        update_post_meta( $post_id, '_sale_price_dates_from', '' );
        update_post_meta( $post_id, '_sale_price_dates_to', '' );
        update_post_meta( $post_id, '_price', $item['post_price'] );
        update_post_meta( $post_id, '_sold_individually', '' );
        update_post_meta( $post_id, '_manage_stock', 'no' );
        update_post_meta( $post_id, '_backorders', 'no' );
        update_post_meta( $post_id, '_stock', '' );
        unset($item);
}
?>