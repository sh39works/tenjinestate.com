<article id="top">
    <section class="main">
        <picture>
            <source srcset="//cdn.tenjinestate.com/img/separate1@w480.webp" media="(max-width: 480px)" type="image/webp" />
            <source srcset="//cdn.tenjinestate.com/img/separate1@w480.jpg" media="(max-width: 480px)" type="image/jpeg" />
            <source srcset="//cdn.tenjinestate.com/img/separate1@w800.webp" media="(max-width: 800px)" type="image/webp" />
            <source srcset="//cdn.tenjinestate.com/img/separate1@w800.jpg" media="(max-width: 800px)" type="image/jpeg" />
            <source srcset="//cdn.tenjinestate.com/img/separate1@w1000.webp" type="image/webp" />
            <img src="//cdn.tenjinestate.com/img/separate1@w1000.jpg" width="1000" height="667" alt="天神エステート" />
        </picture>
        <!--
        <p class="text text-1">福岡の不動産は</p>
        <p class="text text-2"><span>私たちに</span></p>
        <p class="text text-3">お任せください</p>
        -->
        <p class="text2"><span class="t1">福岡の不動産は</span><span class="t2">私たちに</span><span class="t3">お任せください</span></p>

        <div class="list">
            <!--
            <ul class="rent">
                <li><a href="//rabbynet.zennichi.or.jp/agency/15505419/rent/home">借りる</a></li>
                <li>賃貸マンション</li>
                <li>アパート</li>
                <li>一戸建て</li>
                <li>貸土地</li>
            </ul>
            -->

            <p data-url="//rabbynet.zennichi.or.jp/agency/15505419/rent/home">
                <span>借りる</span>
                <span>マンション・アパート</span>
                <span>戸建て・土地</span>
            </p>

            <!--
            <ul class="buy">
                <li><a href="/item/list/buy">買う</a></li>
                <li>売マンション</li>
                <li>売土地</li>
                <li>売一戸建て</li>
            </ul>
            -->

            <p data-url="/item/list/buy/">
                <span>買う</span>
                <span>マンション・戸建て</span>
                <span>土地</span>
            </p>
        </div>

        <p class="campaign" data-label="キャンペーン情報">
            <span>ご契約いただいたお客様には、弊社資格講座の優待割引券を進呈中！ぜひ御利用ください。</span>
        </p>
    </section>

    <section class="catch">
        <picture>
            <source srcset="//cdn.tenjinestate.com/img/separate2@w480.webp" media="(max-width: 480px)" type="image/webp" />
            <source srcset="//cdn.tenjinestate.com/img/separate2@w480.jpg" media="(max-width: 480px)" type="image/jpeg" />
            <source srcset="//cdn.tenjinestate.com/img/separate2@w800.webp" media="(max-width: 800px)" type="image/webp" />
            <source srcset="//cdn.tenjinestate.com/img/separate2@w800.jpg" media="(max-width: 800px)" type="image/jpeg" />
            <source srcset="//cdn.tenjinestate.com/img/separate2@w1000.webp" type="image/webp" />
            <img src="//cdn.tenjinestate.com/img/separate2@w1000.jpg" loading="lazy" decoding="async" width="1000" height="667" alt="天神エステート 特徴" />
        </picture>
        <div>
            <p class="maintext blue">抜群の合格率を誇る宅建の資格学校が運営する</p>
            <p class="maintext red">信用第一の不動産会社です</p>
            <p class="subtext">弊社は天神の中心にあり、不動産の販売及び賃貸仲介等に携わり常に信用と堅実を社是として業績を上げ現在に至っております。さまざまなご相談にも対応し業務に取り組んでおりますので、是非ご利用ください。</p>
        </div>
    </section>

    <section class="features">
        <div>
            <h3>弊社の特徴</h3>
            <ul>
                <li>豊富な情報からお好みの物件を提供できます</li>
                <li>ご要望に応じて、引越し業者を紹介できます</li>
                <li>地下鉄天神南駅5番出口上がってすぐ（徒歩1分）です</li>
                <li>E-Mailで簡単に連絡のやり取りができます</li>
            </ul>
            <picture>
                <source srcset="/img/building.webp" type="image/webp" />
                <img src="/img/building.jpg" loading="lazy" decoding="async" width="153" height="217" alt="天神エステート" />
            </picture>
        </div>
    </section>
</article>

<script>
document.querySelectorAll("div.list p").forEach(function(el) {
    el.addEventListener("click", function() {
        const url = this.dataset.url; // data-url属性を取得
        if (url) {
            window.open(url, "_blank"); // 別タブで開く
        }
    });
});
</script>
