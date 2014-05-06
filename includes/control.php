<?php 

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