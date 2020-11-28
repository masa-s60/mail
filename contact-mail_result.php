<!DOCTYPE html>

<html lang="ja">
  <head>
	 <meta charset="utf-8" />
	 <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0"> <!--レスポンシブ-->
	 <link rel="stylesheet" href="../../../reset.css">
	 <link rel="stylesheet" href="../../../index.css">
	 <link rel="stylesheet" href="mail-success.css">
	 <link rel="stylesheet" href="mail-failure.css">
  </head>
	
  <body>
    <?php
      mb_language("Japanese");  //日本語対応の対策、UTF-8
      mb_internal_encoding("UTF-8");
	  
	//htmlからの取得項目 
	  $name = htmlspecialchars($_POST['Name'] ,ENT_QUOTES ,"UTF-8" ); //htmlspecialchars()クロスサイト・スクリプティング（XSS）対策 
	  $senderAddress = htmlspecialchars($_POST['SenderAddress'] ,ENT_QUOTES ,"UTF-8" );  
	  $tel = htmlspecialchars($_POST['Tel'] ,ENT_QUOTES ,"UTF-8" );
	  $postalCode1 = htmlspecialchars($_POST['PostalCode1'] ,ENT_QUOTES ,"UTF-8" );
	  $postalCode2 = htmlspecialchars($_POST['PostalCode2'] ,ENT_QUOTES ,"UTF-8" );
	  $prefectures = htmlspecialchars($_POST['Prefectures'] ,ENT_QUOTES ,"UTF-8" );
	  $municipalities = htmlspecialchars($_POST['Municipalities'] ,ENT_QUOTES ,"UTF-8" );
	  $address = htmlspecialchars($_POST['Address'] ,ENT_QUOTES ,"UTF-8" );
	  $waysToContact = htmlspecialchars($_POST['WaysToContact'] ,ENT_QUOTES ,"UTF-8" );
	  $message = htmlspecialchars($_POST['Message'] ,ENT_QUOTES ,"UTF-8" ); 
	//入力項目チェックここまで  
	  
	//メール本文内に表示する情報の文章形式設定
	  $text_name = "[氏名(社名)] " ."\n" .$name;
	  $text_senderAddress = "[メールアドレス] " ."\n" .$senderAddress;
	  $text_tel = "[電話番号] " ."\n" .$tel;
	  $text_postalCode = "[住所]" ."\n" ."〒　" .$postalCode1 ."-" .$postalCode2;
	  $text_streetAddress = $prefectures .$municipalities .$address;
	  $text_waysToContact = "[連絡方法]" ."\n" .$waysToContact;
	  $text_message = "[問い合わせ内容]" ."\n" .$message;
	  
	//表示させたくない文字列の排除
	  if(1 <= strlen($postalCode1)){
		  
	  } else {
		  unset($text_postalCode);
	  };
	 
	//メール送信関数の引数設定
	  $to = "osouji@kone-griffin.com";
	  $title = "ホームページからのお問合せ"; 
	  $text = $text_name ."\n\n" .$text_senderAddress ."\n\n" .$text_tel ."\n\n" .$text_postalCode ."\n" .$text_streetAddress ."\n\n" .$text_waysToContact ."\n\n\n" .$text_message; 
	  $from = "From: $senderAddress";
	  
      if(mb_send_mail($to, $title, $text, $from)){
		 echo "
		  	<header class=\"header\">
				<div class=\"header-img__link\">
					<a href=\"../../../index.html\">
						<img src=\"../../../img/griffin-banner.png\" alt=\"株式会社ケーワングリフィン\">
					</a>
				</div>
			</header>
			
			<main>
				<h1 class=\"mail-done\">メール送信が完了しました</h1>

				<div class=\"mail-text\">
					<p>お問い合わせありがとうございます。<br><br>
						内容を確認の上、<br>改めてご連絡させていただきますので、少々お待ちください。
					</p>
					<br>
					<p>【株式会社ケーワングリフィン】</p>
					<p class=\"mail-supplement\">
						※1週間ほど経過後も返信がない場合、メールが受信されていない可能性がございますので、<br>お手数をお掛けしますが、もう一度「問い合わせフォーム」のご入力をお願い致します。
					</p>
					<br>
					<a class=\"return\" href=\"../../../index.html\">メインページへ戻る</a>
				</div>
			</main>
			<hr>"; 
	  } else {
        echo "
			<header class=\"header\">
				<div class=\"header-img__link\">
					<a href=\"../../../index.html\">
						<img src=\"../../../img/griffin-banner.png\" alt=\"株式会社Griffin\">
					</a>
				</div>
			</header>

			<main>
				<h1 class=\"mail-fail\">メール送信に失敗しました</h1>

				<div class=\"mail-text\">
					<p>
						お手数ですが<br>フォーム画面戻り、再度ご入力をお願い致します。<br>
					</p>
					<br>
					<p>【株式会社ケーワングリフィン】</p>
					<p class=\"mail-supplement\">
						※サーバーが混み合っている可能性があります。
						時間を置いてからのご入力をお試しください。
					</p>
					<br>
					<a class=\"return\" href=\"../../../contact/contact.html\">入力フォーム画面へ戻る</a>
				</div>
			</main>
			<hr>";
	  	};
	 ?>
  </body>
	
</html>