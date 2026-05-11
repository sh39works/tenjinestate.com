<section class="search" data-type="<?php echo $type ?>">
	<h1>物件を探す</h1>

	<h2>地域で探す</h2>
	<ul class="area"></ul>

</section>

<script>
	$(document).ready(() => {
	    const areaData = [
			"福岡市博多区",
			"福岡市中央区",
			"福岡市城南区",
			"福岡市早良区",
			"福岡市東区",
			"福岡市南区",
			"福岡市西区",
			"福岡県全域（福岡市を除く）"
	    ]

	    // Array.prototype.forEachを使ってチェックボックスとラベルを生成
	    areaData.forEach((area, index) => {
	    	const list = $('<li>')

			const checkbox = $('<input>')
				.attr('type', 'checkbox')
				.attr('id', `area-${index}`)
				.attr('name', 'area')
				.val(area)

			const label = $('<label>')
				.attr('for', `area-${index}`)
				.text(area)

			list.append(checkbox,label)

	      // チェックボックスとラベルをコンテナに追加
	      $('section.search ul.area').append(list)
	    });
	});
</script>