<html>
<body>
<meta charset="utf8">
<center>
	<?php include 'includes/menu.php'; ?>
<form action ="#" method="POST" name="guncelleFormu">
	<br><br>
	<h4>Guncellenecek kişinin numarasını giriniz:</h4>
	<input type="text" name="girilenNumara"></input><br>

	<h4>Guncellenecek alanı seçiniz:</h4>
	<input type="radio" name="guncellenecekAlan" value="ad">Ad</input>
	<input type="radio" name="guncellenecekAlan" value="soyad">Soyad</input>
	<input type="radio" name="guncellenecekAlan" value="sinif">Sınıf</input>
	<input type="radio" name="guncellenecekAlan" value="numara">Numara</input>
	<input type="radio" name="guncellenecekAlan" value="not">Not</input><br><br>

	<h4>Yeni değeri giriniz: </h4>
	<input type="text" name="yeniDeger"></input>
	<input type="submit" value="Tamam"></input>
</form>
<?php  

	$girilenNumara = $_POST['girilenNumara'];
	$guncellenecekAlan = $_POST['guncellenecekAlan'];
	$yeniDeger = $_POST['yeniDeger'];		//En yakın zamanda yeniDeger kontrolü yapılıp buraya eklenecektir.
											//Kullanıcı eğer sayı değiştirmek isterse, sayı kontrolü de yapılacaktır.

	if($guncellenecekAlan == 'ad' || $guncellenecekAlan == 'soyad' || $guncellenecekAlan=='sinif'){
		if (kelimeControl($yeniDeger)) {
			$baglanti = mysqli_connect("localhost","root","","OgrenciBilgiSistemi");		//MySQL'e bağlanır.
			$sonuclar = mysqli_query($baglanti,"SELECT * FROM ogrenciler ORDER BY `not` DESC");		

			while ($row = mysqli_fetch_array($sonuclar)) {		// Sonuclar arasında tek tek karşılaştırma yaparız.
					if ($row['numara'] == $girilenNumara) {
						$flag1 = true;
						mysqli_query($baglanti,"UPDATE ogrenciler SET `$guncellenecekAlan`= '$yeniDeger' WHERE `numara`= $girilenNumara");
						echo "<h3>Öğrencini bilgileri güncellendi.</h3> <br>";
						echo "<h3> Eski Bilgiler </h3>";
						echo "<h4>Adı: " . $row['ad'] . "<br>";
						echo "Soyadı: " . $row['soyad'] . "<br>";
						echo "Numarası: " . $row['numara'] . "<br>";
						echo "Sinifi: " . $row['sinif'] . "<br>";
						echo "Notu: " . $row['not'] . "<br></h4>";
					}
				}
		
				if (!$flag1) {
					echo "<h1> Sistemde numarası $silinecekNumara olan öğrenci kaydı bulunmamaktadır. "
			. "<br>Lutfen tekrar deneyiniz. </h1>";
				}
		}
	}

		if ($guncellenecekAlan == 'numara' || $guncellenecekAlan == 'not') {	
			if (sayiControl($yeniDeger)) {
				if ($guncellenecekAlan == 'not' && $yeniDeger < 100 && $yeniDeger > 0) {		//Not 0-100 aralığında olmalıdır.
					$baglanti = mysqli_connect("localhost","root","","OgrenciBilgiSistemi");		//MySQL'e bağlanır.
					$sonuclar = mysqli_query($baglanti,"SELECT * FROM ogrenciler ORDER BY `not` DESC");		

					while ($row = mysqli_fetch_array($sonuclar)) {		// Sonuclar arasında tek tek karşılaştırma yaparız.
						if ($row['numara'] == $girilenNumara) {
							$flag2 = true;
							mysqli_query($baglanti,"UPDATE ogrenciler SET `$guncellenecekAlan`= '$yeniDeger' WHERE `numara`= $girilenNumara");
							echo "<h3>Öğrencini bilgileri güncellendi.</h3> <br>";
							echo "<h3> Eski Bilgiler </h3>";
							echo "<h4>Adı: " . $row['ad'] . "<br>";
							echo "Soyadı: " . $row['soyad'] . "<br>";
							echo "Numarası: " . $row['numara'] . "<br>";
							echo "Sinifi: " . $row['sinif'] . "<br>";
							echo "Notu: " . $row['not'] . "<br></h4>";
						}
					}
				}
				else{
					$baglanti = mysqli_connect("localhost","root","","OgrenciBilgiSistemi");		//MySQL'e bağlanır.
					$sonuclar = mysqli_query($baglanti,"SELECT * FROM ogrenciler ORDER BY `not` DESC");		

					while ($row = mysqli_fetch_array($sonuclar)) {		// Sonuclar arasında tek tek karşılaştırma yaparız.
						if ($row['numara'] == $girilenNumara) {
							$flag2 = true;
							mysqli_query($baglanti,"UPDATE ogrenciler SET `$guncellenecekAlan`= '$yeniDeger' WHERE `numara`= $girilenNumara");
							echo "<h3>Öğrencini bilgileri güncellendi.</h3> <br>";
							echo "<h3> Eski Bilgiler </h3>";
							echo "<h4>Adı: " . $row['ad'] . "<br>";
							echo "Soyadı: " . $row['soyad'] . "<br>";
							echo "Numarası: " . $row['numara'] . "<br>";
							echo "Sinifi: " . $row['sinif'] . "<br>";
							echo "Notu: " . $row['not'] . "<br></h4>";
						}
					}
				}
				
				if (!$flag2) {
					echo "<h1> Sistemde numarası $silinecekNumara olan öğrenci kaydı bulunmamaktadır. "
			. "<br>Lutfen tekrar deneyiniz. </h1>";
				}		
			}
		}
	function sayiControl($gelenSayi){
		$flag = true;	// flag == kullanabilirlik kontrolu
		$gelenSayi = trim($gelenSayi);
   	  	$gelenSayi = stripslashes($gelenSayi);

   	  	if($gelenSayi == "") 	//Eğer gelen sayi boş ise kullanılamaz.
   	  		$flag = false;
   	  	else if (!is_numeric($gelenSayi))	//Gelen sayi harf içeriyorsa kullanılamaz.
   	  		$flag = false;

   	  	return $flag;
	}

	function kelimeControl($gelenKelime){
		$flag = true; 	// flag == kullanabilirlik kontrolu
		$gelenKelime = trim($gelenKelime);
   	  	$gelenKelime = stripslashes($gelenKelime); 

   	  	if ($gelenKelime == "") 
   	  		$flag = false;	//Eğer gelen kelime boş ise kullanılamaz.
   	  	
   	  	return $flag;
	}

?>
</center>
</body>
</html>