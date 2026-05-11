<?php
	require_once( "config.ajax.php" ) ;

	$d = $_POST ;
	$output = null ;

	$que[1] = "select * from `item` "
			. "where `type` like \"{$d['type']}\" "
			. "and `status` = 1 "
			. "and ( `publicdate` <= now() or `publicdate` is null ) "
			. "and ( `closedate` > now() or `closedate` is null ) "
			. "order by `insertdate` desc" ;
	$res[1] = $mysqli->query( $que[1] ) ;

	while( $row[1] = $res[1]->fetch_assoc() ) :
		$output[] = $row[1] ;
	endwhile ;

	echo json_encode( $output ) ;
?>