<html>
	<head>
		
		<title>İletişim Formu - Şiket İsmi Burada Gelecek</title>
	
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<link href="css/iletisim-formu.css" rel="stylesheet" type="text/css" />

	</head>

	<body>
		<div id="genel">
		İletişim Formu - Burası Başlıktır
			<div id="bolum">
				<form method="POST" action="<?php echo $_SERVER['SCRIPT_FILENAME'] ?>">
					<table>
						<tr>
							<td></td>
							<td>
							<?php
							//POST ile gönderilern verileri çektik
								$ad=$_POST["ad"];
								$soyad=$_POST["soyad"];
								$email=$_POST["email"];
								$meslek=$_POST["meslek"];
								$telefon=$_POST["telefon"];
								$egitim=$_POST["egitim"];
								$onay=$_POST["onay"];
								$gmesaj=$_POST["mesaj"];
								
								
							if($_POST) {
							
								// Boş alanları belirledik hata bildirdik
								if(empty($ad)or empty($soyad) or empty($meslek) or empty($telefon) or empty($egitim) or empty($onay)or empty($gmesaj)) {echo "Boş alanları doldurunuz";}
								
								//email adresini kontrol ediyoruz
								
								else if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {echo "Geçerli bir e-mail adresi girin";}
								
								//telefon numarasını kontrol ediyoruz
								
								else if (!ctype_digit($telefon)) {echo "Geçerli bir telefon numarası girin";}
								
								//kendi adresimize mail gönderelim
								else {
										
										$konu = "İletişim Formundan Gönderilen Mesaj";           
										$mesaj = 'Yeni bir iletişim haberi geldi <br><br>
										
										<b>Ad</b> : '.$ad.'<br>
										<b>Soyad</b> : '.$soyad.'<br>
										<b>E-Mail</b> : <a href="mailto:'.$email.'">'.$email.'</a><br>
										<b>Meslek</b> : '.$meslek.'<br>
										<b>Telefon</b> : '.$telefon.'<br>
										<b>Eğitim</b> : '.$egitim.'<br>
										<b>Onay</b> : '.$onay.'<br>
										<b>Mesaj</b> : '.$gmesaj.'<br>
										';	
									
										// headerlar mailin düzgün ulaşması için gereklidir.
										$headers  = 'MIME-Version: 1.0' . "\r\n";
										$headers .= 'Content-type: text/html; charset=UTF-8"' . "\r\n";
										$headers .= 'To: Web Siteniz <sercan@bulsam.net>' . "\r\n";
										$headers .= 'From: '.$ad.' <'.$email.'>' . "\r\n";
									   
									 //mail bilgileri alındıktan sonra göndeririyoruz..
									if ( mail($to,$konu,$mesaj,$headers) ) {echo "İletişim bilgileriniz alındı"; }
									   
									else {echo "İletişim bilgileri gönderilemedi"; }

									
									}
								
								}
							?>
							</td>
						</tr>
						<tr>
							<td>Adınız :</td>
							<td><input type="text" class="box" name="ad"></td>
						</tr>
						<tr>
							<td>Soyadınız :</td>
							<td><input type="text" class="box" name="soyad"></td>
						</tr>
						<tr>
							<td>Email :</td>
							<td><input type="text" class="box" name="email"></td>
						</tr>
						<tr>
							<td>Mesleğniz :</td>
							<td><input type="text" class="box" name="meslek"></td>
						</tr>
						<tr>
							<td>Telefon :</td>
							<td><input type="text" class="box" name="telefon"></td>
						</tr>
						</tr>
						<tr>
							<td>Eğitim :</td>
							<td><input type="text" class="box" name="egitim"></td>
						</tr>
						<tr>
							<td>Onay :</td>
							<td><select class="box" name="onay"><option value="evet">Evet</option><option value="hayır">Hayır</option></select></td>
						<tr>
							<td>Mesaj :</td>
							<td><textarea class="text_area" name="mesaj"></textarea></td>
						</tr>	
						<tr>
							<td></td>
							<td><input type="submit" value="Gönder" class="btn"></td>
						</tr>	
					</table>
				</form>
			</div><!--#### Bolum Div Son-->
		</div><!--##### Genel Div Son-->
	</body>
	
</html>