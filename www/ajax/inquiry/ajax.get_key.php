<?php
	require_once( "config.ajax.php" ) ;

	$d = $_POST ;
	$output = null ;

	$duplication = false ;

	while( !$duplication ) :
		$key = random_str(32) ;

		$que[1] = "select `inquiry_id` as `id` from `inquiry` "
				. "where `key` like \"{$key}\" " ;
		$res[1] = $mysqli->query( $que[1] ) ;
		$row[1] = $res[1]->fetch_assoc() ;

		if( empty( $row[1]['id'] )) $duplication = true ;
	endwhile ;

	echo json_encode([ "key" => $key ]) ;
?>