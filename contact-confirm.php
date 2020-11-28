<!DOCTYPE html>

<html lang="ja">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0"> <!--レスポンシブ-->
		<link rel="stylesheet" href="../../reset.css">
		<link rel="stylesheet" href="../../index.css">
		<link rel="stylesheet" href="../contact.css">
		<link rel="stylesheet" href="contact-confirm.css">
		<link rel="stylesheet" href="result/mail-failure.css">
	</head>
	
	<body>
		<?php
		  mb_language("Japanese");  //日本語対応の対策、UTF-8
		  mb_internal_encoding("UTF-8");

//htmlからの取得項目 
			$name = htmlspecialchars($_POST['Name'] ,ENT_QUOTES ,"UTF-8" ); //htmlspecialchars()クロスサイト・スクリプティング（XSS）対策 
			$senderAddress = htmlspecialchars($_POST['SenderAddress'] ,ENT_QUOTES ,"UTF-8" );
			$tel = htmlspecialchars($_POST['Tel'] ,ENT_QUOTES ,"UTF-8" );
			$waysToContact = htmlspecialchars($_POST['WaysToContact'] ,ENT_QUOTES ,"UTF-8" );
			$message = htmlspecialchars($_POST['Message'] ,ENT_QUOTES ,"UTF-8" );

		  if(isset($name, $senderAddress, $tel, $waysToContact, $message)){
//正常に値が取得できた場合、確認画面を表示
			echo "
<!--ヘッダー-->
			 <header class=\"header\">
				<div class=\"header-img__link\">
					<a href=\"../../index.html\">
						<img src=\"../../img/griffin-banner.png\" alt=\"株式会社ケーワングリフィン\">
					</a>
				</div>
				<div class=\"header-side__position\">
					<div class=\"header-estimate\">
						<a class=\"header-estimate__decoration\" href=\"../../quote/quote.html\">お見積り</a>
					</div>
					<div class=\"header-contact\">
						<p class=\"header-contact__time\">受付時間：9:00~18:00</p>
						<p class=\"header-contact__tel\">TEL：<a href=\"tel:090-9841-5456\">090-9841-5456</a></p>
					</div>
				</div>
			</header>

<!--ナビゲーションメニュー-->
			<nav class=\"nav-menu\">	
				<ul class=\"nav-menu__list\">
					<li>
						<a href=\"../../service/service.html\">サービス内容</a>
					</li>
					<li>
						<a href=\"../../recruit/recruit.html\">採用情報</a>
					</li>
					<li>
						<a href=\"../../FAQ/FAQ.html\">よくある質問</a>
					</li>
					<li>
						<a href=\"../../contact/contact.html\">お問い合わせ</a>
					</li>
				</ul>	
			</nav>

<!--問い合わせイメージ-->		
		<div class=\"contact-image\">
			<img src=\"../../img/contact-image.png\" alt=\"お問い合わせ\">
			<h1 class=\"contact-image__title\">お問い合わせ</h1>
		</div>
	
<!--進行状況（ステップ）-->
		<section class=\"contact-stage\">
			
			<img class=\"pc-image\" src=\"../../img/arrows-glay.png\" alt=\"矢印\">
			<img class=\"mobile-image\" src=\"../../img/arrow-down__gray.png\" alt=\"矢印\">
			<div class=\"contact-stage__list\">
				<p>問い合わせ内容の入力</p>
			</div>
			
			<img class=\"pc-image\" src=\"../../img/arrows.jpg\" alt=\"矢印\">
			<img class=\"mobile-image\" src=\"../../img/arrow-down.png\" alt=\"矢印\">
			
			<div class=\"contact-stage__list contact-stage__now\">
				<p class=\"\">入力内容の確認</p>
			</div>
			
			<img class=\"mobile-image\" src=\"../../img/arrow-down__gray.png\" alt=\"矢印\">
			<img class=\"pc-image\" src=\"../../img/arrows-glay.png\" alt=\"矢印\">
			<div class=\"contact-stage__list\">
				<p class=\"font-potition\">送信完了</p>
			</div>
			
		</section>
		
<!--確認案内-->
		<section class=\"contact\">
			<p>※メッセージの送信はまだ完了しておりません。</p>
			<p>以下の内容でお間違いないか、ご確認ください。</p>
			
<!--フォーム-->
			<form action=\"result/contact-mail_result.php\" method=\"post\" name=\"form\">	
				<table class=\"contact-form\">

					<tr class=\"contact-form__row\">
						<th class=\"contact-form__head\">
							氏名（会社名）
						</th>
						<td class=\"contact-form__data\">
							$name
						</td>
					</tr>

					<tr class=\"contact-form__row\">
						<th class=\"contact-form__head\">
							メールアドレス
						</th>
						<td class=\"contact-form__data\">
							$senderAddress
						</td>
					</tr>

					<tr class=\"contact-form__row\">
						<th class=\"contact-form__head\">
							電話番号
						</th>
						<td class=\"contact-form__data\">
							$tel
						</td>
					</tr>
					
					<tr class=\"contact-form__row\">
						<th class=\"contact-form__head\">
							ご希望の連絡方法
						</th>
						<td class=\"contact-form__data\">
							$waysToContact
						</td>
					</tr>
					
					<tr class=\"contact-form__row\">
						<th class=\"contact-form__head\">
							お問い合わせ内容
						</th>
						<td class=\"contact-form__data english-escape\">
							$message
						</td>
					</tr>
				</table>
				
				<input type=\"hidden\" name=\"Name\" value=\"$name\">
				<input type=\"hidden\" name=\"SenderAddress\" value=\"$senderAddress\">
				<input type=\"hidden\" name=\"Tel\" value=\"$tel\">
				<input type=\"hidden\" name=\"WaysToContact\" value=\"$waysToContact\">
				<input type=\"hidden\" name=\"Message\" value=\"$message\">

				<div class=\"contact-form__return\">
					<a href=\"../contact.html\">入力画面へ戻る</a>
				</div>
				<div class=\"contact-form__submit\">
					<input type=\"submit\" value=\"送信\"/>
				</div>

			</form>
		</section>
		
		<footer class=\"footer\">
			<ul class=\"footer-category\">
				<li class=\"footer-category__item footer-category__bar\"><a class=\"\" href=\"../../index.html\">トップページ</a></li>
				<li class=\"footer-category__item footer-category__bar\"><a href=\"../../company/company.html\">会社情報</a></li>
				<li class=\"footer-category__item footer-category__bar\"><a href=\"../../recruit/recruit.html\">採用情報</a></li>
				<li class=\"footer-category__item\"><a href=\"../../contact/contact.html\">お問い合わせ</a></li>
			</ul>
		</footer>
	";
			 	
		  } else {
//正常に値が取得できなかった場合、やり直し画面を表示
			echo '
				<h1 class="mail-fail">メール送信に失敗しました</h1>

				<div class="mail-text">
					<p>お手数ですが、メインページへ戻り再度ご入力をお願い致します。<br><br></p>
					<p class="mail-supplement">
					※サーバーが混み合っている可能性があります。<br>
					時間を置いてからのご入力をお試しください。
					</p>
					<br>
					<a class="return" href="../contact.html">お問い合せ画面へ戻る</a>
				</div>
				<hr>';
		  };
		?>
	</body>
	
</html>