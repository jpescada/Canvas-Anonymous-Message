<?php

if ( isset($GLOBALS["HTTP_RAW_POST_DATA"]) )
{
	// disable compression for IE
	if ( ini_get("zlib.output_compression") ) ini_set("zlib.output_compression", "Off");
	
	$data = $GLOBALS["HTTP_RAW_POST_DATA"];
	$uri = substr( $data, strpos($data,",")+1 );
	$file = base64_decode( $uri );
	
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private", false);
	header("Content-Type: image/png");
	header("Content-Disposition: attachment; filename=\"image.png\";");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ". filesize($file) );
	readfile( $file );
	exit();
}

?>