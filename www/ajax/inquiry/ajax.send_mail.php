<?php
	require_once( "config.ajax.php" ) ;

	$d = $_POST ;
	$output = null ;

	$que[1] = "select * from `inquiry` "
			. "where `key` like \"{$d['key']}\" " ;
	$res[1] = $mysqli->query( $que[1] ) ;
	$row[1] = $res[1]->fetch_assoc() ;

	$data = json_decode( $row[1]['data'] );

    $mail->to( $row[1]['email'] ) ;
    $mail->subject( "【自動返信】お問い合わせいただきありがとうございました。" ) ;
    $mail->text( "天神エステートです。\nこの度はお問い合わせいただき、ありがとうございました。\n\n以下の内容でお問い合わせを受け付けましたのでご確認ください。\n\n■お名前\n　{$row[1]['name']}（{$row[1]['furigana']}）\n\n■性別\n　{$row[1]['sex']}\n\n■年代\n　{$row[1]['age']}\n\n■電話番号\n　{$row[1]['tel']}\n\n■メールアドレス\n　{$row[1]['email']}\n\n■ご希望の内容\n　{$data->customer->content}\n\n■ご希望の金額\n　{$data->customer->amount}\n\n■ご希望のエリア\n　{$data->customer->area}\n\n■その他追記事項\n　{$data->customer->message}\n\n内容を確認させていただいた上で担当者よりご連絡させていただきます。\n\n宜しくお願い致します。\n\n********************\n天神エステート\n〒810-0001\n福岡県福岡市中央区天神1-3-38 天神121ビル13F\nTEL：092-722-0559\nE-mail：stokuda@license.ac.jp" ) ;

    if( $mail->send() ) :
		echo json_encode([ "true" ]) ;
    else :
		echo json_encode([ "false", "msg" => "お問い合わせ受付完了のメールの送信に失敗しました。" ]) ;
    endif ;
?>