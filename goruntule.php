<html>
<body>
<meta charset="utf8">
<?php include 'includes/menu.php' ?>


<?php

$baglanti = mysqli_connect("localhost","root","","OgrenciBilgiSistemi");		//MySQL'e bağlanır.

//Baglantiyi Kontrol Et
if (mysqli_connect_errno($baglanti)){
echo "MySQLe baglanamadi: " . mysqli_connect_error();	// MySQL'e bağlanıp bağlanmadığını kontrol ederiz
}

$sonuclar = mysqli_query($baglanti,"SELECT * FROM ogrenciler ORDER BY `not` DESC");	// ORDER BY `not` DESC komutu notları büyükten küçüğe sıralar

?>
<center>
<table> <td> 
	<?php  	
while ($row = mysqli_fetch_array($sonuclar)) {		// Sonucları tek tek ekrana yazdırırız.
	echo "<tr>";
	echo "Adı: " . $row['ad'] . "<br>";
	echo "Soyadı: " . $row['soyad'] . "<br>";
	echo "Numarası: " . $row['numara'] . "<br>";
	echo "Sinifi: " . $row['sinif'] . "<br>";
	echo "Notu: " . $row['not'] . "<br>";
	echo "</tr>";
	echo "<br><br>	";
}
?>
</td>
</table>
</center>
<?php  
mysqli_close($baglanti);		// Bağlantıyı sonlandırırız.
?>
 
</body>
</html>