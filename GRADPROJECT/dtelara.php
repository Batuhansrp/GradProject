<?php

session_start();
ob_start();
require_once 'baglanti.php';



$temp1= $_SESSION['doktor_kullaniciadi'];
if(isset($_POST['dtelbtn'])){
$kaydet=$db->prepare("UPDATE DOKTOR set
	doktor_tel=:doktor_tel
	where doktor_tc=$temp1 ");
$_POST['doktor_tel'] = preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['doktor_tel']);
$duzenle=$kaydet->execute(array(
'doktor_tel' => $_POST['doktor_tel']
));




if ($duzenle) {
    	   $Message = urlencode("Telefonunuz Değiştirildi ");
		header ("Location: https://redayhost.com/tefo-batu/doktorhesapislem.php?Message=".$Message);
    	  ob_flush();
    	  exit;

}
else {
   $Message = urlencode("Telefonunuz Değiştirilemedi ");
		header ("Location: https://redayhost.com/tefo-batu/doktorhesapislem.php?Message=".$Message);
    	  ob_flush();
    	  exit;
}

}?>