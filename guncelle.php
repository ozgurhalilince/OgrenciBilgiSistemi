
<?php  
	include 'includes/control.php'; 
	include 'includes/db.php';  
	include 'includes/guncelle.html';

	$girilenNumara = $_POST['girilenNumara'];
	$guncellenecekAlan = $_POST['guncellenecekAlan'];
	$yeniDeger = $_POST['yeniDeger'];		//En yakın zamanda yeniDeger kontrolü yapılıp buraya eklenecektir.
											//Kullanıcı eğer sayı değiştirmek isterse, sayı kontrolü de yapılacaktır.

	if($guncellenecekAlan == 'ad' || $guncellenecekAlan == 'soyad' || $guncellenecekAlan=='sinif'){
		if (kelimeControl($yeniDeger)) {
			$baglanti = baglan();		//MySQL'e bağlanır.
			$sonuclar = mysqli_query($baglanti,"SELECT * FROM ogrenciler ORDER BY `not` DESC");		

			while ($row = mysqli_fetch_array($sonuclar)) {		// Sonuclar arasında tek tek karşılaştırma yaparız.
					if ($row['numara'] == $girilenNumara) {
						$flag1 = true;
						mysqli_query($baglanti,"UPDATE ogrenciler SET `$guncellenecekAlan`= '$yeniDeger' WHERE `numara`= $girilenNumara");
						echo "<center><h3>Öğrencini bilgileri güncellendi.</h3> <br>";
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

?>