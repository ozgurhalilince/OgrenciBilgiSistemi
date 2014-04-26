<html>
<body>
<meta charset="utf8">
<?php include 'includes/menu.php' ?>

<center>
<form action="#" method="POST" name="silmeFormu">
<input type="hidden" name="count" value="3"></input>

<h1>Silinecek öğrencinin numarasini giriniz: </h1><br>
<input type="text" name="silinecekNumara"> </input>
<input type="submit" value="Gönder"></input>
</form>
<?php 
	
	$silinecekNumara = $_POST['silinecekNumara'];

	if (isset($silinecekNumara) && $silinecekNumara != "") {	// Eğer adam input girdiyse ve bu input boş değilse 
																// işlemleri gerçekleştirmek için bu if'e girer.
		
		if (is_numeric($silinecekNumara)) {
			
			$baglanti = mysqli_connect("localhost","root","","OgrenciBilgiSistemi");	//Bağlantıyı kurarız
			$sonuclar = mysqli_query($baglanti,"SELECT * FROM ogrenciler ORDER BY `not` DESC");		//Girilen numaranın olup olmadığını kontrol etmek için
				while ($row = mysqli_fetch_array($sonuclar)) {		// Sonuclar arasında tek tek karşılaştırma yaparız.
					if ($row['numara'] == $silinecekNumara) {		// Eğer girilen numara databasete mevcutsa silinir.
						$flag = true; 
						echo "<h4> Silinen Öğrencinin Bilgileri <br>";	
						echo "Adı: " . $row['ad'] . "<br>";
						echo "Soyadı: " . $row['soyad'] . "<br>";
						echo "Numarası: " . $row['numara'] . "<br>";
						echo "Sinifi: " . $row['sinif'] . "<br>";
						echo "Notu: " . $row['not'] . "<br></h4> ";
						mysqli_query($baglanti,"DELETE FROM ogrenciler WHERE `numara`='$silinecekNumara'");
						echo "<h1> $silinecekNumara numaralı öğrenci sistemden başarıyla silinmiştir. </h1>";
					}			
				}
			if(!$flag){
			echo "<h1> Sistemde numarası $silinecekNumara olan öğrenci kaydı bulunmamaktadır. "
			. "<br>Lutfen tekrar deneyiniz. </h1>";
			}
			mysqli_close($baglanti);		//Bağlantıyı sonlandırırız.
		}

		else
			echo "<h1> Lutfen öğrenci numarasını sayı olarak giriniz. </h1>";		
	}

	else
		echo "<h1> Lutfen boş bir giriş yapmayınız. </h1>";
	
 ?>

</center>
</body>
</html>