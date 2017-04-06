<?php

/**
 * php-RSS_to_jsonp-module PHP Library v1.0
 * https://github.com/yama-dev/php-RSS_to_jsonp-module
 * Copyright yama-dev
 * Licensed under the MIT license.
 * Date: 2016-11-27
 *
 * jsonのクロスドメイン対策用スクリプト
 * @return $json|str
 */

if(isset($_GET["url"])){
	$json = file_get_contents( $_GET["url"] );
	header( 'Content-Type: text/javascript; charset=utf-8' );
	echo $json;
}
