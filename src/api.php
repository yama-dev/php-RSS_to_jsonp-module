<?php

/* http_response_code(200); */

$siteUrl = null;

if (isset($_GET['url'])) {
    $siteUrl = $_GET['url'] . '?' . $_SERVER['REQUEST_TIME'];
} else {
    exit('error');
}

/* Get RSS */
$rss_url   = $siteUrl;
$rss_data  = file_get_contents( $rss_url );
$rss_data  = preg_replace( "/<([^>]+?):(.+?)>/", "<$1_$2>", $rss_data );
$rss_data  = simplexml_load_string( $rss_data, 'SimpleXMLElement', LIBXML_NOCDATA );
$rss_array = array();
foreach ( $rss_data->channel->item as $item ) {
    $rss_array[] = $item;
}

/* OUTPUT */
header('Access-Control-Allow-Origin: *');

/* For JSON */
/*header("Content-Type: application/json; charset=UTF-8");*/

/* For JSONP */
header("Content-Type: application/javascript; charset=UTF-8"); 

/* For IE */
header("X-Content-Type-Options: nosniff");

echo isset($_GET['callback']) ? $_GET["callback"] . "(" . json_encode($rss_data) . ")" : json_encode($rss_data); 
