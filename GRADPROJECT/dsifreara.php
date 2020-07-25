<?php

session_start();
ob_start();
require_once 'baglanti.php';



$temp1= $_SESSION['doktor_kullaniciadi'];
if(isset($_POST['dsifrebtn'])){
$kaydet=$db->prepare("UPDATE DOKTOR set
	doktor_sifre=:doktor_sifre
	where doktor_tc=$temp1 ");
$duzenle=$kaydet->execute(array(
'doktor_sifre' => $_POST['doktor_sifre']
));




if ($duzenle) {
    	  $Message = urlencode("Şifreniz Değiştirildi ");
		header ("Location: https://redayhost.com/tefo-batu/doktorhesapislem.php?Message=".$Message);
    	  ob_flush();
    	  exit;

}
else {
   	  $Message = urlencode("Şifreniz Değiştirilemedi ");
		header ("Location: https://redayhost.com/tefo-batu/doktorhesapislem.php?Message=".$Message);
		exit;
}

}?>