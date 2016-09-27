<?php
if(isset($_GET["url"])){
	$json = file_get_contents( $_GET["url"] );
	header( 'Content-Type: text/javascript; charset=utf-8' );
	echo $json;
}
