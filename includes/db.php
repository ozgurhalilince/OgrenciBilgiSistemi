<?php 
	
	function baglan(){
	
	$baglanti = mysqli_connect("localhost","root","3103709","OgrenciBilgiSistemi");

	if (mysqli_connect_errno($baglanti)){	//Bağlanmazsa error verdirilir.
		echo "MySQLe baglanamadi: " . mysqli_connect_error();
		}
		return $baglanti;
	}
 ?>