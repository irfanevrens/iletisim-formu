<?php 

// form doldurulup gönderildi mi?
if(isset($_POST['submit'])) {
	
	// evet, o halde form bilgilerini işlemeye başla
	
	// POST ile gönderilern verileri aldık
	$ad 		= trim($_POST["ad"]);
	$soyad		= trim($_POST["soyad"]);
	$email		= trim($_POST["email"]);
	$meslek		= trim($_POST["meslek"]);
	$telefon	= trim($_POST["telefon"]);
	$egitim		= trim($_POST["egitim"]);
	$gmesaj		= trim($_POST["gmesaj"]);
	
	// hata kontrollerine başladık
	try {
		
		// Boş alanların kontrolü yapılıyor
		if (empty($ad)) throw new Exception('Adı alanı boş geçilemez.');
		if (empty($soyad)) throw new Exception('Soyadı alanı boş geçilemez.');
		if (empty($email)) throw new Exception('Mail alanı boş geçilemez.');
		if (empty($gmesaj)) throw new Exception('Mesaj alanı boş geçilemez.');
		
		// mail gönderme işlemini başlatabiliriz.
		$to = 'bilgi@buraya.com';
		$konu = "İletişim Formundan Gönderilen Mesaj";           
		$mesaj = 'Yeni bir iletişim haberi geldi <br />
		<br />
		<b>Ad</b> : '.$ad.'<br />
		<b>Soyad</b> : '.$soyad.'<br />
		<b>E-Mail</b> : <a href="mailto:'.$email.'">'.$email.'</a><br />
		<b>Meslek</b> : '.$meslek.'<br>
		<b>Telefon</b> : '.$telefon.'<br />
		<b>Eğitim</b> : '.$egitim.'<br />
		<b>Mesaj</b> : '.$gmesaj.'
		';	
	
		// headerlar mailin düzgün ulaşması için gereklidir.
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8"' . "\r\n";
		$headers .= 'To: Web Siteniz <sercan@bulsam.net>' . "\r\n";
		$headers .= 'From: '.$ad.' <'.$email.'>' . "\r\n";
		
		// mail gönder
		if (mail($to,$konu,$mesaj,$headers)) {
			
			$tamam = 'Mesajınız alındı, en kısa zamanda incelenecektir.';
		} else {
			
			throw new Exception('Mesaj gönderilirken hata meydana geldi. Lütfen daha sonra yeniden deneyiniz.');
		}
	} catch (Exception $ex) {
		
		$hata = $ex->getMessage();
	}
} else {
	
	// hayır
}

?>

<html>
	<head>
		
		<title>İletişim Formu - Şiket İsmi Burada Gelecek</title>
	
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<link href="css/iletisim-formu.css" rel="stylesheet" type="text/css" />
		<link href="css/eburhan.css" rel="stylesheet" type="text/css" />

	</head>

	<body>
		<div id="genel">
		İletişim Formu - Burası Başlıktır
			<div id="bolum">
				<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
					<table width="100%">
						<tr>
							<td colspan="2">
							<?php

							if(isset($_POST['submit'])) {
								
								if (!empty($tamam)) { 
									
									echo '<div class="tamam">' . $tamam . '</div>';
								} else {
									
									if (!empty($hata)) echo '<div class="hata">' . $hata . '</div>';
								}
							} else {
								
								$ad 		= '';
								$soyad		= '';
								$email		= '';
								$meslek		= '';
								$telefon	= '';
								$egitim		= '';
								$gmesaj		= '';
							}
			
							?>
							</td>
						</tr>
						<tr>
							<td>* Ad :</td>
							<td><input type="text" class="box" name="ad" value="<?=$ad?>"></td>
						</tr>
						<tr>
							<td>* Soyad :</td>
							<td><input type="text" class="box" name="soyad" value="<?=$soyad?>"></td>
						</tr>
						<tr>
							<td>* Mail Adresi :</td>
							<td><input type="text" class="box" name="email" value="<?=$email?>"></td>
						</tr>
						<tr>
							<td>Meslek :</td>
							<td><input type="text" class="box" name="meslek" value="<?=$meslek?>"></td>
						</tr>
						<tr>
							<td>Telefon :</td>
							<td><input type="text" class="box" name="telefon" value="<?=$telefon?>"></td>
						</tr>
						<tr>
							<td>Eğitim :</td>
							<td><input type="text" class="box" name="egitim" value="<?=$egitim?>"></td>
						</tr>
						<tr>
							<td>* Mesaj :</td>
							<td><textarea class="text_area" name="gmesaj"><?=$gmesaj?></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Gönder" class="btn"></td>
						</tr>	
					</table>
				</form>
			</div><!--#### Bolum Div Son-->
		</div><!--##### Genel Div Son-->
	</body>
	
</html>