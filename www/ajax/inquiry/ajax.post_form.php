<?php
	require_once( "config.ajax.php" ) ;

	$d = $_POST ;
	$output = null ;

	if( !empty( $d['data'] )) :
		foreach( $d['data'] as $key => $value ) :
			$data['customer'][$key] = $value ;
		endforeach ;
	endif ;

	$que[1] = "insert into `inquiry` set "
			. "`name` = \"{$d['name']}\", "
			. "`furigana` = \"{$d['furigana']}\", "
			. "`sex` = \"{$d['sex']}\", "
			. "`tel` = \"{$d['tel']}\", "
			. "`email` = \"{$d['email']}\", "
			. "`key` = \"{$d['key']}\" " ;
	$que[1] .= ( $d['age'] != "null" ) ? ", `age` = \"{$d['age']}\" " : null ;
	$que[1] .= ( !empty( $data )) ? ", `data` = '".json_encode( $data, JSON_UNESCAPED_UNICODE|JSON_HEX_QUOT|JSON_HEX_APOS|JSON_HEX_TAG )."' " : null ;
	$res[1] = $mysqli->query( $que[1] ) ;

	if( $res[1] ) :
		echo json_encode([ "true" ]) ;
	else :
		switch( $mysqli->errno ) :
			case 1062 :
				$msg = "このお問い合わせ内容はすでに送信完了しています。" ;
				break ;

			default :
				$msg = "不明なエラーが発生したためお問い合わせの送信が正常に完了しませんでした。お手数ですがもう一度ご入力をお願い致します。" ;
				break ;
		endswitch ;

		echo json_encode([ "false", "msg" => $msg ]) ;
	endif ;
?>