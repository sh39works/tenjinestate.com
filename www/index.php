<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <title>天神エステート</title>
    <meta name="description" content="天神の中心にあり、居住用不動産の販売及び賃貸仲介等に携わり常に信用と堅実を社是として業績を上げ現在に至っております。さまざまなご相談にも対応し業務に取り組んでおりますので、是非ご利用ください。" />

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" rel="preload" />
    <link rel="stylesheet" href="/common/css/core.css" />

    <link rel="canonical" href="https://tenjinestate.com<?php echo $_SERVER['REQUEST_URI'] ?>" />

    <script src="//cdn.goukakukouza.com/js/jquery-3.5.1.min.js"></script>
    <script src="//yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8" async></script>
</head>

<body>
    <header>
        <a href="/" class="logo"><img src="/img/logo.svg" width="300" height="63" alt="天神エステート ロゴ" /></a>
        <p class="tel"><span>092-722-0559</span></p>
        <a href="/inquiry/" class="inquiry"><span>お問合せ</span></a>
    </header>

    <main>
    	<?php
    		$param = rewrite_exec() ;
    		switch( true ) :
    			case ( !empty( $param[0] ) && is_file( "./include/{$param[0]}/default.php" )) :
    				require_once( "/home/realestate/www/include/{$param[0]}/default.php" ) ;
    				break ;

    			default :
    				require_once( "/home/realestate/www/include/top/default.php" ) ;
    				break ;
    		endswitch ;
    		
    	?>
        <article id="information">
	    	<section class="information">
	    		<div>
		    		<h3>会社案内</h3>
		    		<ul>
						<li>会社名</li>
						<li>(株)九州不動産専門学院（キュウシュウフドウサンセンモンガクイン）</li>

						<li>屋号</li>
						<li>天神エステート</li>

						<li>免許番号</li>
						<li>福岡県知事免許(1)0020360</li>

						<li>代表者</li>
						<li>小菅 順子</li>

						<li>所在地</li>
						<li>〒810-0001<br />福岡県福岡市中央区天神1-3-38 天神121ビル13F<br />（地下鉄七隈線：天神南徒歩1分）</li>

						<li>TEL</li>
						<li>092-722-0559</li>

						<li>FAX</li>
						<li>092-731-5578</li>

						<li>営業時間</li>
						<li>8:30～19:00</li>

						<li>定休日</li>
						<li>特になし（年末年始のみ休み）</li>
		    		</ul>
		    	</div>
	    	</section>

	    	<section class="map">
	    		<div>
		    		<h3>マップ</h3>
					<iframe class="googlemap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d830.9031046662249!2d130.40203782921918!3d33.58941111596774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35419191b281be45%3A0xe791f148f1932a55!2z5Lmd5bee5LiN5YuV55Sj5bCC6ZaA5a2m6Zmi!5e0!3m2!1sja!2sus!4v1670828274589!5m2!1sja!2sus" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		    		<p>
		    			(株)九州不動産専門学院<br />
						TEL：092-722-0559<br />
						FAX 092-731-5578<br />
						営業時間 8:30～19:00<br />
						福岡県知事免許(1)0020360<br />
						福岡県福岡市中央区天神1-3-38 天神121ビル13F<br />
						E-mail：stokuda@license.ac.jp
					</p>

					<p>
						まずはお気軽に何でも
						ご相談ください！
					</p>
	    		</div>
	    	</section>
	    </article>
    </main>

    <footer>
    	<div>
    	</div>
        <ul>
            <li><a href="/inquiry/">お問い合わせ</a></li>
            <li><a href="/privacy/">プライバシーポリシー<br />（個人情報の取扱について）</a></li>
        </ul>

        <p class="copyright">(C)天神エステート</p>
    </footer>
</body>

</html>

<script>
const formType = ["text","tel","number","email","url","date","time","datetime-local"];
const pref = ["北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県","茨城県","栃木県","群馬県","埼玉県","千葉県","東京都","神奈川県","新潟県","富山県","石川県","福井県","山梨県","長野県","岐阜県","静岡県","愛知県","三重県","滋賀県","京都府","大阪府","兵庫県","奈良県","和歌山県","鳥取県","島根県","岡山県","広島県","山口県","徳島県","香川県","愛媛県","高知県","福岡県","佐賀県","長崎県","熊本県","大分県","宮崎県","鹿児島県","沖縄県"]

$(function(){

	$("input[type=tel]").on({
		"change":function(){
			let val = $(this).val();
			var str = val.replace(/[０-９]/g, function(s) {
				return String.fromCharCode(s.charCodeAt(0) - 65248);
			});
			str = str.replace(/-/g,"");

			$(this).val(str);

			if( $.isNumeric( str ) === false ){
				$(this).addClass("error").after('<span class="notice">半角数字で入力して下さい。</span>');
				$(this).val("");
			}
		},
	});

	$("input[type=number]").on({
		"focusout":function(){
			let val = $(this).val();
			var str = val.replace(/[０-９]/g, function(s) {
				return String.fromCharCode(s.charCodeAt(0) - 65248);
			});

			$(this).val(str);

			if( $.isNumeric( str ) === false ){
				if(!$(this).next("span").length) {
					$(this).addClass("error").after('<span class="notice">半角数字で入力して下さい。</span>');
					$(this).val("");
				}
			}
		},
	});

	$("select,:text,input[type=tel],input[type=number]").on({
		"focus":function(){
			$(this).removeClass("error").next('span').remove();
		},
	});

});

function wareki(y){
    let yy ;
    if( y > 2018 ) {
        yy = y - 2018 ;
        if( yy === 1 ){
            return "令和元年" ;
        } else {
            return "令和"+yy+"年" ;
        }
    } else if( y > 1988 ){
        yy = y - 1988 ;
        if( yy === 1 ){
            return "平成元年" ;
        } else {
            return "平成"+yy+"年" ;
        }
    } else if( y > 1925 ){
        yy = y - 1925 ;
        if( yy === 1 ){
            return "昭和元年" ;
        } else {
            return "昭和"+yy+"年" ;
        }
    } else {
        yy = y - 1911 ;
        if( yy === 1 ){
            return "大正元年" ;
        } else {
            return "大正"+yy+"年" ;
        }
    }
}

function postAjaxForm(url,d){
    let df = new $.Deferred();

    $.ajax({
        url:url,
        type:"post",
        dataType:"json",
        data:d,
        processData: false,
        contentType: false,
        async: false,
    }).done(function(d){
        df.resolve(d);
    });

    return df.promise();
}
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16720714125">
</script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'AW-16720714125');
</script>

<?php
    function rewrite_exec() {
        $request = substr( urldecode( $_SERVER['REQUEST_URI'] ), 1, -1 ) ;
        $param = explode( "/", $request ) ;
        
        return $param ;
    }
?>