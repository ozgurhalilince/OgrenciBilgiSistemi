<html>
<body>

<meta charset="utf-8">
<?php include 'includes/menu.php' ?>
<CENTER>
<form action="#" method="POST" name="testform">
<input type="hidden" name="count" value="3"></input>
Öğrenci Ad:
	<input type="text" name="ad"></input><br><br>
Öğrenci Soyadı:
	<input type="text" name="soyad"></input><br><br>
Öğrenci Numarası:
	<input type="text" name="numara"></input><br><br>
Öğrenci Sınıfı:
	<input type="radio" name="sinif" value="1.sinif">1. Sinif</input>
	<input type="radio" name="sinif" value="2.sinif">2. Sinif</input>
	<input type="radio" name="sinif" value="3.sinif">3. Sinif</input>
	<input type="radio" name="sinif" value="4.sinif">4. Sinif</input><br><br>
Aldığı Not:
	<input type="text" name="not"></input><br><br>
	<input type="submit" value="Tamam"></input>
	<input type="reset" value="Temizle"></input>

	</center>

<?php 
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

	else
		echo " <h4> Lutfen geçerli değerler giriniz. </h4>";
	


	function kelimeControl($gelenKelime){
		$flag = true; 	// flag == kullanabilirlik kontrolu
		$gelenKelime = trim($gelenKelime);
   	  	$gelenKelime = stripslashes($gelenKelime); 

   	  	if ($gelenKelime == "") 
   	  		$flag = false;	//Eğer gelen kelime boş ise kullanılamaz.
   	  	
   	  	return $flag;
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
 ?>

</center>

 ?>
</body>
</html>