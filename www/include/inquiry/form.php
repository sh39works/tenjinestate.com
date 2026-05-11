<section class="form">
	<h1>お問い合わせ</h1>
	<p class="lead">下記へご入力後、送信ボタンをクリックしてください。ご対応させていただきます。</p>
	<ul></ul>
</section>

<script>
	$(function(){
		const data = [
			{field:"お名前",name:"name",type:"text",required:true,autocomplete:"name"},
			{field:"ふりがな",name:"furigana",type:"text",required:true},
			{field:"性別",name:"sex",type:"radio",required:true,option:["男性","女性"]},
			{field:"年代",name:"age",tag:"select",option:["10代","20代","30代","40代","50代","60代以上"]},
			{field:"電話番号",name:"tel",type:"tel",autocomplete:"tel"},
			{field:"メールアドレス",name:"email",type:"email",required:true,autocomplete:"email"},
			{field:"ご希望の内容",name:"content",type:"radio",option:["借りたい","買いたい","売りたい"]},
			{field:"ご希望の金額",name:"amount",type:"tel",placeholder:"ご希望の金額（おおまかで結構です）"},
			{field:"ご希望のエリア",name:"area",type:"text"},
			{field:"その他追記事項",name:"message",tag:"textarea"},
		]

		$.each( data, (i,v) => {
			$("section.form").find("ul").append(
				$("<li/>",{class:( v.required === true ) ? "header required" : "header"}).append($("<span/>").text(v.field)),
				$("<li/>",{class:"content"}).append(function(){
					let element = []

					if( v.tag === undefined ) {
						if( v.type === "radio" && v.option !== undefined ){
							$.each( v.option, (i2,v2) => {
								element.push(
									$("<label/>",{class:v.name}).append(
										$("<input/>",{class:v.name,name:v.name,type:v.type,value:v2}),
										$("<span/>",{class:v.name+(i2+1)}).text(v2)
									)
								)
							})
						} else {
							element.push(
								$("<input/>",{
									type:v.type,
									class:v.name,
									placeholder:( v.type.match(/text|tel|email/g) ) ? (( v.placeholder !== undefined ) ? v.placeholder : v.field ) : null,
									reqired:( v.required === true ) ? "required" : null,
									autocomplete:( v.autocomplete !== undefined ) ? v.autocomplete : null,
								})
							)
						}
					} else {
						element.push(
							$("<"+v.tag+"/>",{name:v.name,class:v.name}).append(function(){
								let element = []

								if( v.tag.match(/select/g)){
									element.push(
										$("<option/>",{hidden:"hidden",selected:"selected"}).text("▼選択してください")
									)

									$.each( v.option, (i2,v2) => {
										element.push(
											$("<option/>",{value:v2}).text(v2)
										)
									})
								}

								return element
							})
						)
					}

					return element
				}),
			)
		})

		postAjaxForm( "/ajax/inquiry/ajax.get_key.php" )
		.then((d) => {
			$("section.form").find("ul").append(
				$("<li/>",{class:"submit"}).append(
					$("<input/>",{type:"button",value:"お問い合わせ内容を送信する",class:"wait"}),
					$("<input/>",{type:"hidden",name:"key",value:d.key,class:"key"}),
				)
			)
		})

		$(document).on( "change", "li.content input.error", function(){
			$(this).removeClass("error")
		})

		$(document).on( "click", "li.submit input.wait", function(){
			let data = new FormData
			let msg = ""

			const name = $("li.content").find("input.name").val()
			const furigana = $("li.content").find("input.furigana").val()
			const sex = $("li.content").find("input.sex:checked").val()
			let age = $("li.content").find("select.age").val()
			const tel = $("li.content").find("input.tel").val()
			const email = $("li.content").find("input.email").val()
			const key = $("li.submit").find("input.key").val()

			if( name === "" ){
				msg += "名前を入力してください\n"
				$("li.content").find("input.name").addClass("error")
			}

			if( furigana === "" ){
				msg += "ふりがなを入力してください\n"
				$("li.content").find("input.furigana").addClass("error")
			}

			if( sex === undefined ){
				msg += "性別を入力してください\n"
			}

			if( age.match(/▼選択してください/) ){
				age = null
			}

			if( email === "" ){
				msg += "メールアドレスを入力してください\n"
				$("li.content").find("input.email").addClass("error")
			}

			if( msg !== "" ){
				alert( msg )
				return
			}

			if( confirm("この内容で送信しますか") ){
				data.append( "name", name )
				data.append( "furigana" , furigana )
				data.append( "sex" , sex )
				data.append( "age" , age )
				data.append( "tel" , tel )
				data.append( "email" , email )
				data.append( "key" , key )

				// その他、追加フィールドがあれば下記に追記する（240919）
				data.append( "data[content]" , $("li.content").find("input.content").val() )
				data.append( "data[amount]" , $("li.content").find("input.amount").val() )
				data.append( "data[area]" , $("li.content").find("input.area").val() )
				data.append( "data[message]" , $("li.content").find("textarea.message").val() )

				$(this).addClass("send").removeClass("wait").val("お問い合わせ内容を送信中...")
				$(this).parents("ul").find("li.content").find("input,select").prop("disabled",true)

				postAjaxForm( "/ajax/inquiry/ajax.post_form.php", data )
				.then((d) => {
					if( d[0] === "false" ){
						alert( d.msg )
						window.location.reload()
					} else {
						data.delete( "name" )
						data.delete( "furigana" )
						data.delete( "sex" )
						data.delete( "age" )
						data.delete( "tel" )
						data.delete( "email" )
						data.delete( "data[content]" )
						data.delete( "data[amount]" )
						data.delete( "data[area]" )
						data.delete( "data[message]" )

						return postAjaxForm( "/ajax/inquiry/ajax.send_mail.php", data )
					}
				})
				.then((d) => {
					if( d[0] === "false" ){
						alert( d.msg )
						window.location.reload()
					} else {
						setTimeout(() => {
							$("section.form").find("ul").find("li").remove()
							$("section.form").find("ul").append(
								$("<li/>",{class:"complete"}).append(
									$("<p/>").text("お問い合わせを受け付けました。ありがとうございました。")
								),
							)
							gtag('event', 'conversion', { 'send_to': 'AW-16720714125/vrhwCJPn_dcZEI2zh6U-', 'value': 0, 'currency': 'JPY' });
						},1500)
					}
				})
			}
		})
	})
</script>
