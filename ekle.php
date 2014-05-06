<?php 
	include 'includes/control.php';

	$ad = $_POST['ad'];
	$soyad = $_POST['soyad'];
	$numara = $_POST['numara'];
	$sinif = $_POST['sinif'];
	$not = $_POST['not'];

	if (kelimeControl($ad) && kelimeControl($soyad) && sayiControl($numara) && kelimeControl($sinif) && sayiControl($not)) {
		//Eğer girilen inputların hiçbiri boş girilmemişse ve numaralarda harf içermiyorsa ekleme işlemi yapılabilir.

		if ($not > 0 && $not < 100) {
			$baglanti = mysqli_connect("localhost","root","","OgrenciBilgiSistemi");	//MySQL ile Bağlantı kurulur
			
			if (mysqli_connect_errno($baglanti)){	//Bağlanmazsa error verdirilir.
					echo "MySQLe baglanamadi: " . mysqli_connect_error();
			}

			mysqli_query($baglanti,"INSERT INTO ogrenciler(numara, ad, soyad, sinif, `not`) VALUES ($numara, '$ad', '$soyad', '$sinif', $not);")or die("Hata: kayıt işlemi gerçekleşemedi.");

			echo " <center><h3> $ad $soyad sisteme başarıyla eklenmiştir. <br><br> Öğrenci Bilgileri: </h3>";

			echo "<h4>Adı: $ad <br>";
			echo "Soyadı: $soyad <br>";
			echo "Numarası: $numara <br>";
			echo "Sinifi: $sinif <br>";
			echo "Notu: $not <br> </h4>";
		}

		else
			echo " <h4> Lutfen notu 0 - 100 arasında bir değer giriniz. </h4>";
	}

	else{
		if(isset($ad) && isset($soyad) && isset($numara) && isset($sinif) && isset($not))
			echo " <h4> Lutfen geçerli değerler giriniz. </h4>";
	}
	

	include 'includes/ekle.html';	

 ?>