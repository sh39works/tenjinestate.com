<?php
	switch( $param[2] ) :
		case "rent" :
			$type = "賃貸" ;
			break ;

		case "buy" :
			$type = "分譲" ;
			break ;
	endswitch ;
?>
<section class="list" data-type="<?php echo $type ?>">
	<h1><?php echo $type?>物件一覧</h1>
	<ul></ul>
</section>

<script>
	$(function(){
		const type = $("section.list").data("type")

		let data = new FormData
		data.append( "type", type )

		postAjaxForm( "/ajax/item/ajax.get_list.php", data )
		.then((d) => {
			let html
			$.each( d, (i,v) => {
				html = $("<li/>",{"data-id":v.id,"data-key":v.key})

				html.append(
					$("<p/>").text(v.name),
					$("<img/>",{src:"/img/item/"+v.key+"/1.jpg"}),
					$("<a/>").text("詳細を見る")
				)

				$("section.list").find("ul").append(html)
			})
		})

		$(document).on( "click", "section.list ul a", function(){
			const key = $(this).parents("li").data("key")
			window.open( "/img/item/"+key+"/1.jpg" );
		})
	})
</script>